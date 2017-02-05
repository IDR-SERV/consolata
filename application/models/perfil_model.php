<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Perfil_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}//fin del construct

		public function all(){
			$query = $this->db->get('tb_perfil');
			return $query->result();
		}

		public function find($id){
			$this->db->where('id', $id);
			return $this->db->get('tb_perfil')->row();
		}

		public function insert($registro){
			$this->db->set($registro);
			$this->db->insert('tb_perfil');
		}

		public function update($registro){
			$this->db->set($registro);
			$this->db->where('usuario_id',$registro['usuario_id']);
			$this->db->update('tb_perfil');
		}

		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('tb_perfil');
		}

		

	}//fin de la clase
?>