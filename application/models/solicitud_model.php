<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Solicitud_Model extends CI_Model{
		function __construct(){
			parent::__construct();
		}//fin del construct

		public function all(){
			$query = $this->db->get('solicitud');
			return $query->result();
		}

		public function find($id){
			$this->db->where('id', $id);
			return $this->db->get('solicitud')->row();
		}

		public function insert($registro){
			$this->db->set($registro);
			$this->db->insert('solicitud');
		}

		public function update($registro, $id){
			$this->db->set($registro);
			$this->db->where('id',$id);
			$this->db->update('solicitud');
		}

		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('solicitud');
		}
	}//fin de la clase

?>