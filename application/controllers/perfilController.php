<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	class PerfilController extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('perfil_model');
        	$this->load->model('defaultbackend_model');
        	$this->load->library('UsuarioLib');

		}

		public function index(){
			$id = $this->session->userdata('usrId');
        	$campos = $this->defaultbackend_model->getUsuarioById($id);

			$data['contenido'] = 'backend/perfil/ficha';
			$data['titulo'] = 'Ficha de Perfil';
			$data['css'] = $this->inicializar->addCss();
	        $data['js'] = $this->inicializar->addJs();
	        $data['img'] = $this->inicializar->addImg();
	        $data['pic'] = $this->inicializar->addPic();
	        $data['plg'] = $this->inicializar->addPlg();
	        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
	        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
	        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
	        $data['fecnac'] = $campos!=null?$campos->fecha_nacimiento:'Configure su perfil';
	        $data['bio']= $campos!=null?$campos->detalle_biografia:'Configure su perfil';
	        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

	        if($this->session->userdata('activo') == 1)
	        	$this->load->view('backend/template',$data);
	        else
                redirect('activacion-cuenta');
			
		}//fin Index

		public function updatePerfil(){
			$id = $this->session->userdata('usrId');
        	$campos = $this->defaultbackend_model->getUsuarioById($id);

			$data['contenido'] = 'backend/perfil/ficha';
			$data['titulo'] = 'Ficha de Perfil';
			$data['css'] = $this->inicializar->addCss();
	        $data['js'] = $this->inicializar->addJs();
	        $data['img'] = $this->inicializar->addImg();
	        $data['pic'] = $this->inicializar->addPic();
	        $data['plg'] = $this->inicializar->addPlg();
	        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
	        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
	        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
	        $data['fecnac'] = $campos!=null?$campos->fecha_nacimiento:'Configure su perfil';
	        $data['bio']= $campos!=null?$campos->detalle_biografia:'Configure su perfil';
	        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

			if($this->session->userdata('activo') == 1)
	        	$this->load->view('backend/template',$data);
	        else
                redirect('activacion-cuenta');
		}

		public function editarPerfil(){
        	//se validan los datos del formulario
        	$this->form_validation->set_rules('email','Email','required|callback_editarOk');

        	if($this->form_validation->run() == FALSE){
        		$this->updatePerfil();
        	}else{
        		redirect('escritorio');
        	}
        	//Se ejecuta el cambio
		}//fin editarPerfil

		public function editarOk(){
			//Se recuperan los datos del formulario
        	$nombre = $this->input->post('nombre');
        	$apellido = $this->input->post('apellido');
        	$fecnac = date("Y-m-d",strtotime($this->input->post('fechanac')));
        	$bio = $this->input->post('bio');
        	$email = $this->input->post('email');
        	$foto = $this->input->post('foto');
        	$uid = $this->input->post('uid');

        	return $this->usuariolib->actualizarPerfil($nombre, $apellido, $fecnac, $bio, $uid, $foto);
		}


	}//fin de la clase
?>