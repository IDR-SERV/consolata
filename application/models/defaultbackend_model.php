<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
    class Defaultbackend_model extends CI_Model {
        function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function insert($registro){
            $this->db->set($registro);
            $this->db->insert('usuario');
        }
        
        public function update($registro){
        $this->db->set($registro);
        $this->db->where('email',$registro['email']);
        $this->db->update('usuario');
        }
        
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

        function getUsuarioByEmail($email){
            $this->db->where('email',$email);
            return $this->db->get('usuario')->row();
        }

        function getLogin($user, $pass){
            $this->db->where('nick',$user);
            $this->db->where('pass',$pass);
            return $this->db->get('usuario');
        }
    }
?>