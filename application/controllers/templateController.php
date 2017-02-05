<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class TemplateController extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->helper('url');
            $this->load->model('templatetbackend_model');
        }

	public function index()
	{
        $usuario = $this->templatetbackend_model->getUsuarioById(1);
        $data['usuario'] = $this->session->set_userdata('user',$usuario);
        $this->load->view('backend/template',$data);

	}
}
?>