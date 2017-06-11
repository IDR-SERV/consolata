<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class SolicitudLib {
    function __construct(){
        $this->CI =& get_instance();
        //se llama al modelo de las solicitudes
        $this->CI->load->model('solicitud_model', 'sm');
    }

    function tabla_index(){
        //esta funcion llena la tabla en el index de las solicitudes
        $this->CI->db->select('inquilino.nombre, solicitud.parroquia, solicitud.fecha_inicio, solicitud.fecha_fin');
        $this->CI->db->from('solicitud');
        $this->CI->db->join('inquilino', 'inquilino.id = solicitud.id_usuario_solicitante');
        $query = $this->db->get();
        $res = $query->result();//Result se utiliza para multiples filas en una consulta
        //Campos de la consulta
        $datos = array(
            nom=>$res->nombre,
            parr=>$res->parroquia,
            f_ini=>$res->fecha_inicio,
            f_fin=>$res->fecha_fin
        );
        return $datos;
    }


}
?>