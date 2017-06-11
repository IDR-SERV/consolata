<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Defaultbackend_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function insert(){
            $registro = array(
                'email' => $this->input->post('email_usuario'),
                'nick' => $this->input->post('nick_usuario'),
                'nivel_id' => $this->input->post('nivel_usuario'),
                'created' => date('Y-m-d H:i:s')
            );

            $this->db->insert('usuario', $registro);
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }

        public function edicion(){
            $id = $this->input->get('id');
            $this->db->where('id', $id);
            $query = $this->db->get('usuario');
            if($query->num_rows() > 0){
                return $query->row();
            }else{
                return false;
            }
        }
        
        public function update(){
            $id = $this->input->post('id_usuario');
             $registro = array(
                'email' => $this->input->post('email_usuario'),
                'nick' => $this->input->post('nick_usuario'),
                'nivel_id' => $this->input->post('nivel_usuario'),
                'updated' => date('Y-m-d H:i:s')
            );
             $this->db->where('id',$id);
             $this->db->update('usuario', $registro);
             if($this->db->affected_rows() > 0){
                return true;
             }else{
                return false;
             }
        }

        function deleteUsuario(){
            $id = $this->input->get('id');
            $this->db->where('id', $id);
            $this->db->delete('usuario');
            if($this->db->affected_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
		
		public function updateByEmail($registro, $email){
        $this->db->set($registro);
        $this->db->where('email',$email);
        $this->db->update('usuario');
        }
        /*
        function cargaMenu(){
            $this->db->select('m.glosa_menu');
            $this->db->from('tb_menu m');
            $this->db->order_by('m.glosa_menu');
            $consulta = $this->db->get();
            $resultado = $consulta->result();
            return $resultado;
        }
        
        function cargaItemMenu($id){
            $this->db->select('mi.glosa_menu_item');
            $this->db->from('tb_menu m');
            $this->db->join('tb_relacion_menu trm','m.id = trm.id_menu');
            $this->db->join('tb_menu_item mi', 'trm.id_menu_item = mi.id');
            $this->db->where('mi.id',$id);
            $this->db->order_by('m.glosa_menu');
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        }
        */
        function getUsuarios(){
            $this->db->select('id, email, nick, pass, nivel_id');
            $this->db->from('usuario');
            $this->db->where('activado',1);
            return $this->db->get()->result();
        }

        function cargaMensajeBienvenida(){
            $this->db->select('imagen,mensaje');
            $this->db->from('mensajes_bienvenida');
            $this->db->order_by('mensaje','RANDOM');
            $this->db->limit(1);
            $consulta = $this->db->get();
            $resultado = $consulta->result();
            return $resultado;
        }

        function find($id){
            $this->db->where('id',$id);
            return $this->db->get('usuario')->row();
        }

        function getUsuarioById($id){
            $this->db->where('id', $id);
            return $this->db->get('tb_perfil')->row();
        }
		
		function getUsuarioIndividual($id){
            $this->db->select('usuario.id, usuario.email, usuario.nivel_id, nivel.nombre');
			$this->db->from('usuario');
			$this->db->join('nivel','nivel.id = usuario.nivel_id');
			$this->db->where('usuario.id', $id);
            return $this->db->get()->row();
        }

        function getUsuarioByEmail($email){
            $this->db->where('email',$email);
            return $this->db->get('usuario')->row();
        }

        function getLogin($user, $pass){
            $this->db->where('nick',$user);
            $this->db->where('pass',$pass);
            return $this->db->get('usuario');
        }

		
		function getNiveles(){
			$this->db->select("*");
			$this->db->from("nivel");	
			return $this->db->get()->result();
			
		}

        function tabla_usuarios(){
            $this->db->select('usuario.id, 
                                usuario.nick, 
                                usuario.email, 
                                IF(usuario.activado = 1, "Activado", "No Activado") activ, 
                                nivel.nombre nivel');
            $this->db->from('usuario');
            $this->db->join('nivel', 'nivel.id = usuario.nivel_id');
            $consulta = $this->db->get();
            $resultado = $consulta->result();

            return $resultado;
        }
    }
?>