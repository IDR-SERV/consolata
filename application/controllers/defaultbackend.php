<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//A.M.D.G.
class Defaultbackend extends CI_Controller {
    
    function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('UsuarioLib');
		$this->load->model('perfil_model');

        /*MENSAJES PERSONALIZADOS PARA EL ERROR EN EL LOGIN*/
        $this->form_validation->set_message('required','Debe llenar el campo %s');
        $this->form_validation->set_message('loginok','Usuario o password incorrectos');
    }

	public function index()
	{

        $id = $this->session->userdata('usrId');
        $campos = $this->defaultbackend_model->getUsuarioById($id);

        $data['partentMenu'] = $this->menu_model->partentMenu();
        $data['contenido'] = 'backend/default';//carpeta/vista
        $data['titulo'] = 'Escritorio';
        $data['seccion'] = $data['titulo'];
        $data['descripcion_seccion'] = 'Bienvenido al sistema';
        $data['bienvenida'] = $this->defaultbackend_model->cargaMensajeBienvenida();
        $data['css'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['img'] = $this->inicializar->addImg();
        $data['pic'] = $this->inicializar->addPic();
        $data['plg'] = $this->inicializar->addPlg();
        $data['fnt'] = $this->inicializar->addFrontFonts();
        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
        $data['lastName'] = $campos!=null?$campos->apellido:'';
        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

        if($this->session->userdata('activo') == 1){
            $this->load->view('backend/template', $data);  
            $this->load->view('backend/ajax/ajax_usuario');
            $this->load->view('backend/footer');
        }else{
            redirect('activacion-cuenta');
        }
	}

    public function login(){
        $data['titulo'] = 'Login';
        $data['css1'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['css'] = $this->inicializar->formCss();
        $data['fonts'] = $this->inicializar->formFonts();
        $data['img'] = $this->inicializar->formImg();
        $data['fnt'] = $this->inicializar->addFrontFonts();
        $this->load->view('backend/login', $data);
        $this->load->view('backend/ajax/ajax_usuario');
        $this->load->view('backend/footer');
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
        $data['fnt'] = $this->inicializar->addFrontFonts();
        $this->load->view('backend/activacion',$data);
        $this->load->view('backend/ajax/ajax_usuario');
        $this->load->view('backend/footer');
    }

    public function cambioClave(){
        $data['contenido'] = 'backend/perfil/ficha';
        $this->load->view('backend/template',$data);
        $this->load->view('backend/ajax/ajax_usuario');
        $this->load->view('backend/footer');
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
	
	public function indexusuario(){
		//Verificar que el usuario este logueado
        if($this->session->userdata('usrId') == null){
            redirect(base_url());
        }
		
        $id = $this->session->userdata('usrId');
        $campos = $this->defaultbackend_model->getUsuarioById($id);
        $usuario = $this->defaultbackend_model->tabla_usuarios();
		$nivel_usuario = $this->defaultbackend_model->getNiveles();

        $data['partentMenu'] = $this->menu_model->partentMenu();
        $data['contenido'] = 'backend/usuario/_usuario';//carpeta/vista
		$data['titulo'] = 'Usuarios';
        $data['seccion'] = $data['titulo'];
        $data['descripcion_seccion'] = 'Listado';
        $data['css'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['img'] = $this->inicializar->addImg();
        $data['pic'] = $this->inicializar->addPic();
        $data['plg'] = $this->inicializar->addPlg();
        $data['fnt'] = $this->inicializar->addFrontFonts();
        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
        $data['lastName'] = $campos!=null?$campos->apellido:'';
        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);
        $data['cantidad_usuarios'] = count($usuario);
        $data['usuarios'] = $usuario;
		$data['nivel_usuario'] = $nivel_usuario;
		
		$this->load->view('backend/template', $data);
        $this->load->view('backend/ajax/ajax_usuario');
        $this->load->view('backend/footer');
	}

    public function tablaUsuarios(){
        $usuario = $this->defaultbackend_model->tabla_usuarios();
        echo json_encode($usuario);
    }

    public function nuevo_usuario(){
        //Se verifica que el usuario este logueado
        if(!$this->session->userdata('usrId')) return false;

        $resultado = $this->defaultbackend_model->insert();
        $msg['success'] = false;
        $msg['type'] = 'add';
        if($resultado){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }
	
	public function editar_usuario(){
		//Verificar que el usuario este logueado
        if($this->session->userdata('usrId') == null){
            redirect(base_url());
        }
		$resultado = $this->defaultbackend_model->edicion();
        echo json_encode($resultado);
	}

    public function update_usuario(){
        $resultado = $this->defaultbackend_model->update();
        $msg['success'] = false;
        $msg['type'] = 'updt';
        if($resultado){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }//fin de la funcion

    public function eliminar_usuario(){
        $resultado = $this->defaultbackend_model->deleteUsuario();
        $msg['success'] = false;
        if($resultado){
            $msg['success'] = true;
        }
        echo json_encode($msg);
    }

    public function salir(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
?>