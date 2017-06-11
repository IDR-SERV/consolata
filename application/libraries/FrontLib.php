<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class FrontLib
{
    function __construct()
    {
        $this->CI = &get_instance();
        $this->CI->load->model('noticias_model');
    }//fin de la funcion construct

}
?>