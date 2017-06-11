<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class Noticias_model extends CI_Model{
		function __construct(){
			parent::__construct();
		}//fin del construct

		public function all(){
			$query = $this->db->get('noticias');
			return $query->result();
		}

		public function find($id){
			$this->db->where('id', $id);
			return $this->db->get('noticias')->row();
		}

		public function insert($registro){
			$this->db->set($registro);
			$this->db->insert('noticias');
		}

		public function update($registro, $id){
			$this->db->set($registro);
			//$this->db->where('id_usuario',$registro['id_usuario']);
			$this->db->where('id',$id);
			$this->db->update('noticias');
		}

		public function delete($id){
			$this->db->where('id',$id);
			$this->db->delete('noticias');
		}

		public function tablaNoticias(){
			$id_usuario = $this->session->userdata('usrId');
			$this->db->select('noticias.id, noticias.titulo, usuario.email, noticias.contenido, noticias.fecha_creacion');
			$this->db->from('noticias');
			$this->db->join('usuario', 'usuario.id = noticias.id_usuario');
			$this->db->where('noticias.id_usuario', $id_usuario);
			$consulta = $this->db->get();
			$resultado = $consulta->result();
			return $resultado;
		}

		

	}//fin de la clase
?>