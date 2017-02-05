<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();  
    }

	public function index()
	{
            $this->load->helper('url');
            $data['css'] = $this->inicializar->addFrontCss();
            $data['js'] = $this->inicializar->addFrontJs();
            $data['img'] = $this->inicializar->addFrontimg();
            $this->load->view('frontend/index',$data);
	}
}
