<?php
defined('BASEPATH') OR exit('No direct script access allowed');
//A.M.D.G.
class Welcome extends CI_Controller {

	function __construct(){
        parent::__construct();
        $this->load->model('noticias_model');
        $this->load->library('NoticiasLib');
    }

	public function index()
	{
            $this->load->helper('url');

            $data['titulo'] = $this->inicializar->titulo();
            $data['css'] = $this->inicializar->addFrontCss();
            $data['js'] = $this->inicializar->addFrontJs();
            $data['img'] = $this->inicializar->addFrontimg();
            $data['images'] = $this->inicializar->addImg();
            $data['pic'] = $this->inicializar->addPic();
            $data['noticias'] = $this->noticiaslib->getAllNoticias();
            $this->load->view('frontend/index',$data);
	}

    public function cargaNoticias(){
        
    }//fin de cargaNoticias
}
