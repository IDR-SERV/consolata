<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//A.M.D.G.
class NoticiasController extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('noticias_model'); 
        $this->load->library('UsuarioLib');
    }

    public function index(){
    	$id = $this->session->userdata('usrId');
        $campos = $this->defaultbackend_model->getUsuarioById($id);
        $noticias = $this->noticias_model->all();

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
        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
        $data['foto'] = $campos!=null?$campos->foto_perfil:base_url() . 'avatar5.png';
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);
        $data['titulo_noticia'] = $noticias != null?$noticias->titulo:'';
        $data['autor_noticia'] = $noticias != null?$noticias->autor:'';
        $data['contenido_noticia'] = $noticias != null?$noticias->contenido:'';
        $data['fecha_noticia'] = $noticias != null?$noticias->fecha:'';

        $this->load->view('backend/template',$data);

    }//fin de la funcion index

}//fin de la clase
?>