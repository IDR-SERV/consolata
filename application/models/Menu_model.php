<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');
	//A.M.D.G.
	class Menu_model extends CI_model{
		
		public function partentMenu(){
			$this->db->where('parentId');
			$this->db->order_by('order_menu');
			return $this->db->get('menus')->result();
		}

		public function childMenu($id){
			$this->load->library('usuarioLib');
			$nivel = $this->usuariolib->get_id_nivel_usuario($this->session->userdata('usrId'));

			$this->db->where('parentId', $id);
			$this->db->where('id_nivel', $nivel);
			$this->db->join('nivel_menu', 'nivel_menu.id_menu = menus.id');
			return $this->db->get('menus')->result();
		}

	}//fin de la clase Menu_model	
?>