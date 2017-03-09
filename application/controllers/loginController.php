<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class LoginController extends CI_Controller {
    
        function __construct(){
            parent::__construct();
        }

	function index()
	{
			$data['css1'] = $this->inicializar->addCss();
        	$data['js'] = $this->inicializar->addJs();
			$data['css'] = $this->inicializar->formCss();
	        $data['fonts'] = $this->inicializar->formFonts();
	        $data['img'] = $this->inicializar->formImg();
	        $data['fnt'] = $this->inicializar->addFrontFonts();
            $this->load->view('backend/login',$data);
	}
}
?>

