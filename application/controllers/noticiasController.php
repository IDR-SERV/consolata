<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
//A.M.D.G.
class NoticiasController extends CI_Controller {
	 function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('noticias_model'); 
        $this->load->library('UsuarioLib');
        $this->load->library('NoticiasLib');
        $this->load->library('pagination');


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
        $data['foto'] = $campos!=null?$campos->foto_perfil:'';
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($id);
        $data['cantidad_noticias'] = count($noticias);
        $data['noticias'] = $noticias;

        //para la paginacion de la tabla
        $config['base_url'] = base_url().'/noticias/';
        $config['total_rows'] = count($noticias);
        $config['per_page'] = 1;
        $config['first_link'] = 'Primera P&aacute;gina';
        $config['last_link'] = '&Uacute;ltima P&aacute;gina';
        //$config['attributes']['rel'] = FALSE;

        $this->pagination->initialize($config);
        $data['pag'] = $this->pagination->create_links();

        $this->load->view('backend/template',$data);
        $this->load->view('backend/footer');


    }//fin de la funcion index

    public function nuevo(){
        //Verificar que el usuario este logueado
        if($this->session->userdata('usrId') == null){
            return false;
        }
        //Capturar los valores del formulario
        $titulo = $this->input->post('titulo_noticia');
        $contenido = $this->input->post('contenido_noticia');
        
            if($titulo == '' || $contenido == ''){
                redirect('noticias');
            }else{
                //se llama al metodo del modelo y se le pasa el parametro
            $datos = array(
                'titulo' => $titulo,
                'contenido' => $contenido,
                'id_usuario' => $this->session->userdata('usrId'),
                'fecha_creacion' => now()
            );
                $this->noticias_model->insert($datos);
                redirect('noticias');
            }
    }//fin de la funcion

    public function editar_noticia($id){
        if($this->session->userdata('usrId') == null){
            return false;
        }
        $campos = $this->defaultbackend_model->getUsuarioById($this->session->userdata('usrId'));
        $contenido_noticias = $this->noticias_model->find($id);

        $data['partentMenu'] = $this->menu_model->partentMenu();
        $data['contenido'] = 'backend/noticias/_editar_noticia';//carpeta/vista
        $data['titulo'] = 'Ficha Noticia';
        $data['seccion'] = $data['titulo'];
        $data['descripcion_seccion'] = '';
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
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($this->session->userdata('usrId'));
        $data['id_noticia'] = $contenido_noticias->id;
        $data['titulo_noticia'] = $contenido_noticias->titulo;
        $data['imagen_noticia'] = $contenido_noticias->imagen!=null?$contenido_noticias->imagen:'/avatar5.png';
        $data['contenido_noticia'] = $contenido_noticias->contenido;
        $data['id_usuario_noticia'] = $contenido_noticias->id_usuario;
        $data['fecha'] = $contenido_noticias->fecha_actualizacion?$contenido_noticias->fecha_actualizacion:$contenido_noticias->fecha_creacion;
        //Se capturan los datos del formulario

        $this->load->view('backend/template',$data);
        $this->load->view('backend/footer');
    }

    public function editar_noticia_ok($id){
        //Se verifica que el usuario se encuentre logueado al sistema
        if($this->session->userdata('usrId') == null){
            return false;
        }
        if($this->input->post()){
            //Se recuperan los datos del formulario y se almacenan en variables
            $titulo = $this->input->post('titulo_noticia');
            $contenido = $this->input->post('contenido_noticia');
            //se crea el arreglo que enviara los datos al modelo
            $datos = array(
                //que llega por parametro y es el id de la noticia
                'titulo' => $titulo,
                'contenido' => $contenido,
                'fecha_actualizacion' => now()
            );
            //se llama a la funcion del modelo encargada de actualizar los datos
            $this->noticias_model->update($datos, $id);//donde el id llega por parametros y es el id de la noticia
            //se redirige a la ficha de noticias
            $this->ver_noticia($id);
        }//fin del if input post
    }

    public function ver_noticia($id){
        $campos = $this->defaultbackend_model->getUsuarioById($this->session->userdata('usrId'));
        $contenido_noticias = $this->noticias_model->find($id);

        $data['partentMenu'] = $this->menu_model->partentMenu();
        $data['contenido'] = 'backend/noticias/_nueva_noticia';//carpeta/vista
        $data['titulo'] = 'Ficha Noticia';
        $data['seccion'] = $data['titulo'];
        $data['descripcion_seccion'] = '';
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
        $data['nivel'] = $this->usuariolib->get_nivel_usuario($this->session->userdata('usrId'));
        $data['id_noticia'] = $contenido_noticias->id;
        $data['titulo_noticia'] = $contenido_noticias->titulo;
        $data['imagen_noticia'] = $contenido_noticias->imagen!=null?$contenido_noticias->imagen:'/avatar5.png';
        $data['contenido_noticia'] = $contenido_noticias->contenido;
        $data['id_usuario_noticia'] = $contenido_noticias->id_usuario;
        $data['fecha'] = $contenido_noticias->fecha_actualizacion?$contenido_noticias->fecha_actualizacion:$contenido_noticias->fecha_creacion;


        $this->load->view('backend/template',$data);
        $this->load->view('backend/footer');

    }

    public function cargar_imagen(){
            $config['upload_path']          =  './assets/pictures/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 200000;
            $config['max_width']            = 2780;
            $config['max_height']           = 1024;
            $config['overwrite']            = TRUE;
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto_noticia'))
            {
                $error = array('error' => $this->upload->display_errors());
                redirect(base_url().'escritorio');  
            }
            else
            {
                $id = $this->input->post('idNoticia');
                $foto = utf8_encode($this->upload->data('file_name'));
                $datos = array('imagen' => $foto);
                $this->noticias_model->update($datos, $id);
                $this->ver_noticia($id);
            }
        }//fin de cargar foto

   

    public function eliminar_noticia($id){
        $this->noticias_model->delete($id);
        redirect('noticias');
    }//fin de la funcion

}//fin de la clase
?>