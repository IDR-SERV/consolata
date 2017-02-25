<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class PerfilController extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper(array('form', 'url'));
			$this->load->model('perfil_model');
        	$this->load->model('defaultbackend_model');
        	$this->load->library('UsuarioLib');

		}

		public function index(){
			$id = $this->session->userdata('usrId');
        	$campos = $this->defaultbackend_model->getUsuarioById($id);

        	$data['partentMenu'] = $this->menu_model->partentMenu();
			$data['contenido'] = 'backend/perfil/ficha';
			$data['titulo'] = 'Ficha de Perfil';
			$data['seccion'] = $data['titulo'];
			$data['descripcion_seccion'] = 'Configuración de perfil';
			$data['css'] = $this->inicializar->addCss();
	        $data['js'] = $this->inicializar->addJs();
	        $data['img'] = $this->inicializar->addImg();
	        $data['pic'] = $this->inicializar->addPic();
	        $data['plg'] = $this->inicializar->addPlg();
	        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
	        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
	        $data['foto'] = $campos!=null?$campos->foto_perfil:base_url() . 'avatar5.png';
	        $data['fecnac'] = $campos!=null?$campos->fecha_nacimiento:'Configure su perfil';
	        $data['bio']= $campos!=null?$campos->detalle_biografia:'Configure su perfil';
	        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

	        if($this->session->userdata('activo') == 1)
	        	$this->load->view('backend/template',$data);
	        else
                redirect('activacion-cuenta');
			
		}//fin Index

		public function updatePerfil(){
			$id = $this->session->userdata('usrId');
        	$campos = $this->defaultbackend_model->getUsuarioById($id);

        	$data['partentMenu'] = $this->menu_model->partentMenu();
			$data['contenido'] = 'backend/perfil/ficha';
			$data['titulo'] = 'Ficha de Perfil';
			$data['css'] = $this->inicializar->addCss();
	        $data['js'] = $this->inicializar->addJs();
	        $data['img'] = $this->inicializar->addImg();
	        $data['pic'] = $this->inicializar->addPic();
	        $data['plg'] = $this->inicializar->addPlg();
	        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
	        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
	        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
	        $data['fecnac'] = $campos!=null?$campos->fecha_nacimiento:'Configure su perfil';
	        $data['bio']= $campos!=null?$campos->detalle_biografia:'Configure su perfil';
	        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

			if($this->session->userdata('activo') == 1)
	        	$this->load->view('backend/template',$data);
	        else
                redirect('activacion-cuenta');
		}

		public function editarPerfil(){
        	//se validan los datos del formulario
        	$this->form_validation->set_rules('email','Email','required|callback_editarOk');

        	if($this->form_validation->run() == FALSE){
        		$this->updatePerfil();
        	}else{
        		redirect('escritorio');
        	}
        	//Se ejecuta el cambio
		}//fin editarPerfil

		public function editarOk(){
			$id = $this->session->userdata('usrId');
        	$campos = $this->defaultbackend_model->getUsuarioById($id);

			//Se recuperan los datos del formulario
        	$nombre = $this->input->post('nombre');
        	$apellido = $this->input->post('apellido');
        	$fecnac = date("Y-m-d",strtotime($this->input->post('fechanac')));
        	$bio = $this->input->post('bio');
        	$email = $this->input->post('email');


        	$uid = $this->input->post('uid');

        	return $this->usuariolib->actualizarPerfil($nombre, $apellido, $fecnac, $bio, $uid);
		}

		public function activarCuenta(){
			//Se validan los campos del formulario
			$this->form_validation->set_rules('email', 'Email', 'required|callback_activarCuentaPost');
			$this->form_validation->set_rules('pass', 'Password', 'required|matches[passRep]');
			$this->form_validation->set_rules('passRep', 'Password', 'required');

			if($this->form_validation->run() == FALSE){
				redirect(base_url());
			}else{
				redirect('perfil');
			}
		}//fin de activarCuenta

		public function activarCuentaPost(){
			//Se recuperan los datos ingresados en el formulario
			$email = $this->input->post('email');
			$pass = $this->input->post('pass');
			$passRep = $this->input->post('passRep');

			//se llama a la funcion que activa la cuenta
			return $this->usuariolib->activarCuentaUsuario($email, md5($pass), md5($passRep));

		}//fin de activarCuentaPost

		/*public function cargarFotoFTP(){
			//Se carga la libreria ftp
			$this->load->library('ftp');
			//Se configura la conexion al server
			$config['hostname'] = 'localhost';
			$config['username'] = 'consolata';
			$config['password'] = 'jd1123581321';
			$config['port'] = 21;
			$config['debug'] = TRUE;
			//Se establece la conexion
			$this->ftp->connect($config);
			//La carga se establece a traves de la funcion upload de la clase ftp
			//$this->ftp->upload('ruta/local/del/archivo','/directorio/remoto','ascii',0775)
			//donde ascii es el modo de carga y 0775 son los permisos otorgados a esa carpeta
			$this->ftp->upload('foto','/','ascii',0775);
			return $this->usuariolib->actualizarFoto($uid, '$foto');
			redirect('perfil');
			$this->ftp->close();
		}//fin de cargar foto*/

		public function cargarFoto(){
			$config['upload_path']          =  './assets/pictures/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 200000;
            $config['max_width']            = 2780;
            $config['max_height']           = 1024;
            $config['overwrite']			= TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto'))
            {
            	$error = array('error' => $this->upload->display_errors());
            	redirect('escritorio');  
            }
            else
            {
            	$uid = $this->input->post('uid');
	        	$foto = $this->upload->data('file_name');
    			return $this->usuariolib->actualizarFoto($uid, $foto);
				redirect('perfil');  
            }
		}//fin de cargar foto


	}//fin de la clase
?>