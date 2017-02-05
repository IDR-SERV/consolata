<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Templatebackend_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        function getUsuarioById($id){
            $this->db->select('nombre, apellido, nick, email');
            $this->db->from('usuario usr');
            $this->db->where('usr.id', $id);
            $consulta = $this->db->get();
            $resultado = $consulta->row();
            return $resultado;
        }

         function cargaSideBar(){
            $this->db->select('m.glosa_menu');
            $this->db->from('tb_menu m');
            $this->db->order_by('m.glosa_menu');
            $consulta = $this->db->get();
            $resultado = $consulta->result();
            return $resultado;
        }
        
        function cargaSideBarById($id){
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

    }
?>