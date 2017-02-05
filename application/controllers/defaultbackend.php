<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');

class Defaultbackend extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('defaultbackend_model');
        $this->load->library('UsuarioLib');

        /*MENSAJES PERSONALIZADOS PARA EL ERROR EN EL LOGIN*/
        $this->form_validation->set_message('required','Debe llenar el campo %s');
        $this->form_validation->set_message('loginok','Usuario o password incorrectos');

       
    }

	public function index()
	{

        $id = $this->session->userdata('usrId');
        $campos = $this->defaultbackend_model->getUsuarioById($id);

        $data['contenido'] = 'backend/default';//carpeta/vista
        $data['titulo'] = 'Escritorio';
        $data['menu'] = $this->defaultbackend_model->cargaMenu();
        $data['bienvenida'] = $this->defaultbackend_model->cargaMensajeBienvenida();
        $data['css'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['img'] = $this->inicializar->addImg();
        $data['pic'] = $this->inicializar->addPic();
        $data['plg'] = $this->inicializar->addPlg();
        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
        $data['lastName'] = $campos!=null?$campos->apellido:'';
        $data['foto'] = $campos!=null?$campos->foto_perfil:base_url() . 'avatar5.png';

        if($this->session->userdata('activo') == 1)
            $this->load->view('backend/template', $data);  
        else
            redirect('activacion-cuenta');
	}

    public function login(){
        $data['titulo'] = 'Login';
        $data['css1'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['css'] = $this->inicializar->formCss();
        $data['fonts'] = $this->inicializar->formFonts();
        $data['img'] = $this->inicializar->formImg();
        $this->load->view('backend/login', $data);
    }

    public function ingresar(){
        //Usamos las validacione de codeigniter
        //Si pasamos un parametro callback_loginok, tiene que existir dentro del controlador una funcion
        //que se llame loginok
        $this->form_validation->set_rules('username','Usuario','required|callback_loginok');
        $this->form_validation->set_rules('password','Password','required');
        //ejecutamos la validacion
        if($this->form_validation->run() == FALSE){
            $this->login();
        }
        else{
            if($this->session->userdata('activo') == 1)
                redirect('escritorio');
            else
                redirect('activacion-cuenta');
        }
    }

    public function loginok(){
        /*====================================================================================
        con esta función se valida que los datos ingresados en el formulario de login
        se encuentren registrados en la base de datos, para dar acceso al sistema.
        Esta validación se llama por parametros en el form_validation de la función ingresar
        de este controlador
        ====================================================================================*/
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        return $this->usuariolib->login($username, md5($password));
    }

    public function activacion(){
        $data['titulo'] = 'Escritorio';
        $data['css'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['plg'] = $this->inicializar->addPlg();
        $this->load->view('backend/activacion',$data);
    }

    public function cambioClave(){
        $data['contenido'] = 'backend/perfil/ficha';
        $this->load->view('backend/template',$data);
    }

    public function post_cambioClave(){
        $this->form_validation->set_rules('passAct', 'Password Actual', 'required');
        $this->form_validation->set_rules('passNew', 'Nuevo Password', 'required|matches[passRep]');
        $this->form_validation->set_rules('passRep', 'Confirme password', 'required');
        if($this->form_validation->run() == FALSE){
            $this->cambioClave();
        }
        else{
            redirect('perfil');
        }
    }

    public function salir(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>