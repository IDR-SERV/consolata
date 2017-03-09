<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//A.M.D.G.
class NoticiasController extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('noticias_model'); 
        $this->load->library('UsuarioLib');


        $config['upload_path']          =  './assets/pictures/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 200000;
        $config['max_width']            = 2780;
        $config['max_height']           = 1024;
        $config['overwrite']            = TRUE;
        $this->load->library('upload', $config);
    }

    public function index(){
    	$id = $this->session->userdata('usrId');
        $campos = $this->defaultbackend_model->getUsuarioById($id);
        $noticias = $this->noticias_model->tablaNoticias();

        $data['partentMenu'] = $this->menu_model->partentMenu();
        $data['contenido'] = 'backend/noticias/index';//carpeta/vista
        $data['titulo'] = 'Noticias Publicadas';
        $data['seccion'] = $data['titulo'];
        $data['descripcion_seccion'] = 'Listado de Noticias';
        $data['css'] = $this->inicializar->addCss();
        $data['js'] = $this->inicializar->addJs();
        $data['img'] = $this->inicializar->addImg();
        $data['pic'] = $this->inicializar->addPic();
        $data['plg'] = $this->inicializar->addPlg();
        $data['fnt'] = $this->inicializar->addFrontFonts();
        $data['ajax'] = $this->inicializar->addAjax();
        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
        $data['foto'] = $campos!=null?$campos->foto_perfil:base_url() . 'avatar5.png';
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);
        $data['cantidad_noticias'] = count($noticias);
        $data['noticias'] = $noticias;
        $this->load->view('backend/template',$data);

    }//fin de la funcion index

    public function nuevo(){
        //Verificar que el usuario este logueado
        if($this->session->userdata('usrId') == null){
            return false;
        }

        //Capturar los valores del formulario
        $datos = array(
            'titulo' => $this->input->post('titulo_noticia'),
            'contenido' => $this->input->post('contenido_noticia'),
            'id_usuario' => $this->session->userdata('usrId'),
            'fecha_creacion' => now()
        ); 
        //se llama al metodo del modelo y se le pasa el parametro
        $this->noticias_model->insert($datos);
        redirect('noticias');
    }//fin de la funcion

    public function cargar_imagen($field_name){
         //Se verifica primeramente que el usuario este logueado
        if($this->CI->session->userdata('usrId') == null){
            return false;
        }

        $this->upload->do_upload($field_name);
    }//fin de la funcion

}//fin de la clase
?>