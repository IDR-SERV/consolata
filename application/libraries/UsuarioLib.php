<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class UsuarioLib{
		function __construct(){
			$this->CI = & get_instance();
			//Instanciamos el modelo que queremos consultar
			$this->CI->load->model('defaultbackend_model','def');
			$this->CI->load->model('perfil_model','perfil');
		}

		public function login($user, $pass){
			$query = $this->CI->def->getlogin($user, $pass);
			
			if($query->num_rows() > 0){
				$usuario = $query->row();
				$query1 = $this->CI->def->find($usuario->id);
				if($query1 !=  NULL){
					$datoSesion = array(
								'usrId' => $query1->id,
								'user' => $query1->nick,
                                'email' => $query1->email,
                                'activo' => $query1->activado);
            		$this->CI->session->set_userdata($datoSesion);
				}else{
					$datoSesion = array('user' => $usuario->nick, 'email' => $usuario->email);
				    $this->CI->session->set_userdata($datoSesion);
				}
				return TRUE;
			}else{
				$this->CI->session->sess_destroy();
				return FALSE;
			}
			
		}//fin de login

		public function get_nivel_usuario($id){
			$this->CI->db->select('nombre nivel');
			$this->CI->db->from('nivel');
			$this->CI->db->join('usuario', 'usuario.nivel_id = nivel.id');
			$this->CI->db->where('usuario.id',$id);
			$consulta = $this->CI->db->get();
			$resultado = $consulta->row();
			$rs = $resultado->nivel;
			return $rs;
		}//fin getNivelUsuario

		public function get_id_nivel_usuario($id){
			$this->CI->db->select('nivel.id');
			$this->CI->db->from('nivel');
			$this->CI->db->join('usuario', 'usuario.nivel_id = nivel.id');
			$this->CI->db->where('usuario.id',$id);
			$consulta = $this->CI->db->get();
			$resultado = $consulta->row();
			$rs = $resultado->id;
			return $rs;
		}//fin getNivelUsuario

		public function actualizarPerfil($name, $lastName, $bDate, $bio, $uid, $foto){
			//Se verifica primeramente que el usuario este logueado
			if($this->CI->session->userdata('usrId') == null){
				return false;
			}
			//Se llaman los metodos de los modelos
			$id = $this->CI->session->userdata('usrId');
			$usuario = $this->CI->def->getUsuarioById($id);
			$perfil = $this->CI->perfil->find($id);
			//verificamos la existencia de este usuario en la tabla perfil
			$data = array(
				'nombre' => $name,
				'apellido' => $lastName,
				'fecha_nacimiento' => $bDate,
				'detalle_biografia' => $bio,
				'usuario_id' => $uid
			);
			if(!$perfil){
				$this->CI->perfil->insert($data);
			}else{
				$this->CI->perfil->update($data);
			}
			redirect('perfil');
		}//fin de actualizar perfil

		public function actualizarFoto($uid, $foto){
			//Se verifica primeramente que el usuario este logueado
			if($this->CI->session->userdata('usrId') == null){
				return false;
			}
			//Se llaman los metodos de los modelos
			$id = $this->CI->session->userdata('usrId');
			$usuario = $this->CI->def->getUsuarioById($id);
			$perfil = $this->CI->perfil->find($id);
			//verificamos la existencia de este usuario en la tabla perfil
			$data = array(
				'foto_perfil' => $foto,
				'usuario_id' => $id
			);
			if(!$perfil){
				$this->CI->perfil->insert($data);
			}else{
				$this->CI->perfil->update($data);
			}
			redirect('perfil');
		}//fin de actualizar foto

		public function activarCuentaUsuario($email, $pass, $passRep){
			//se verifica la existencia del email en la base de datos
			$mail = $this->CI->def->getUsuarioByEmail($email);
			//se crea el array con los datos que se modificarán
			$data = array(
				'email' => $email,
				'pass' => $passRep,
				'activado' => '1'
			);
			if(!$mail){
				redirect(base_url());
			}else{
				$this->CI->def->update($data);
				redirect('login');
			}
		}
	}

?>