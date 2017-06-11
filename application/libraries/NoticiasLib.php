<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class NoticiasLib{
		function __construct(){
			$this->CI = & get_instance();
			//Instanciamos el modelo que queremos consultar
			$this->CI->load->model('noticias_model');
		}

        function getAllNoticias(){
            $this->CI->db->select('noticias.titulo, noticias.contenido, imagen_noticia.imagen, usuario.email');
            $this->CI->db->from('noticias');
            $this->CI->db->join('imagen_noticia', 'imagen_noticia.id_noticia = noticias.id','left');
            $this->CI->db->join('usuario','usuario.id = noticias.id_usuario', 'left');
            $query = $this->CI->db->get();
            $rs = $query->result();
            return $rs;
        }//fin de getNoticias

		public function get_noticias_by_id($id){
			$this->CI->db->select('noticias.id, noticias.titulo, noticias.contenido, imagen_noticia.imagen, usuario.email');
			$this->CI->db->from('noticias');
			$this->CI->db->join('imagen_noticia','imagen_noticia.id_noticia = noticias.id','left');
			$this->CI->db->join('usuario','usuario.id = noticias.id_usuario');
			$this->CI->db->where('noticias.id',$id);
			$query = $this->CI->db->get();
			$rs = $query->row();
			return $rs;
		}//fin de la funcion

	}//fin de la clase
?>