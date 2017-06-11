
<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//A.M.D.G.
	class SolicitudController extends CI_Controller {
		function __construct(){
	        parent::__construct();
	        $this->load->helper('url');
	        $this->load->library('UsuarioLib');
	        $this->load->library('pagination');
	    }

	    public function index(){
	    	$id = $this->session->userdata('usrId');
	        $campos = $this->defaultbackend_model->getUsuarioById($id);

	        $data['partentMenu'] = $this->menu_model->partentMenu();
	        $data['contenido'] = 'backend/solicitud/_solicitud';//carpeta/vista
	        $data['titulo'] = 'Solicitud de servicio';
	        $data['seccion'] = $data['titulo'];
	        $data['descripcion_seccion'] = 'Solicitudes de servicios';
	        $data['css'] = $this->inicializar->addCss();
	        $data['js'] = $this->inicializar->addJs();
	        $data['img'] = $this->inicializar->addImg();
	        $data['pic'] = $this->inicializar->addPic();
	        $data['plg'] = $this->inicializar->addPlg();
	        $data['fnt'] = $this->inicializar->addFrontFonts();
	        $data['ajax'] = $this->inicializar->addAjax();
	        $data['name'] = $campos!=null?$campos->nombre:'Configure su perfil';
	        $data['lastName'] = $campos!=null?$campos->apellido:'Configure su perfil';
	        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
	        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);

	        $this->load->view('backend/template',$data);
        	$this->load->view('backend/footer');

	    }
	}//fin de la clase

?>