<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
        function __construct(){
            parent::__construct();
            $this->load->model('defaultbackend_model');
        }

	function index()
	{
			$data['css1'] = $this->inicializar->addCss();
        	$data['js'] = $this->inicializar->addJs();
			$data['css'] = $this->inicializar->formCss();
	        $data['fonts'] = $this->inicializar->formFonts();
	        $data['img'] = $this->inicializar->formImg();
	        $data['fnt'] = $this->inicializar->addFrontFonts();

	        //consiltamos la cantidad de usuarios registrados
	        $data['usuarios'] = $this->defaultbackend_model->getUsuarios();

            $this->load->view('backend/login',$data);
            $this->load->view('backend/footer');
	}

	function restaurarClave(){
        //se recuperan los daros del formulario
        $usuario = $this->input->post('nick-usuario');
        $clave = $this->input->post('clave-nueva');
        $clave_rep = $this->input->post('rep-clave-nueva');
        if($clave == $clave_rep){
        	$datos = array(
        		'email' => $usuario,
        		'pass' => md5($clave));
        	$this->defaultbackend_model->update($datos);
        	redirect('login');
        }else{
        	redirect(base_url());
        }
	}
}
?>

