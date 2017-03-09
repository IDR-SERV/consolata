<?php
    class Inicializar{
        public function addCss(){
            $data = '';
            $data .= '<link href="' . base_url() . 'assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/ionicons/css/ionicons.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/css/mi_estilo.css" rel="stylesheet" type="text/css"/>';
            return $data;
            
        }
        
        public function addFrontCss(){
            $data = '';
            $data .= base_url() . 'assets/frontend/css/';
            return $data;
            
        }
        
        public function addJs(){
            $data = '';
            $data .= '<script src="' . base_url() . 'assets/js/jquery-3.1.1.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/js/jquery-ui-1.12.1.custom/jquery-ui.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/js/bootstrap.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/morris/morris.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/datatables/jquery.dataTables.min.js" type="text/javascript"></script>';
             $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/datatables/dataTables.bootstrap.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/fastclick/fastclick.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/js/bootstrap-filestyle.min.js" type="text/javascript"></script>';
            $data .= '<script src="' . base_url() . 'assets/js/app.min.js" type="text/javascript"></script>';

            return $data;
        }
        
        public function addFrontJs(){
            $data = '';
            $data .= base_url() . 'assets/frontend/js/';
            return $data;
        }
        
        public function addFrontimg(){
            $data = '';
            $data .= base_url() . 'assets/frontend/images/';
            return $data;
        }
        
        public function addFrontFonts(){
            $data = '';
            $data .= base_url() . 'assets/frontend/fonts/';
            return $data;
        }
        
        public function addFrontSass(){
            $data = '';
            $data .= base_url() . 'assets/frontend/sass/';
            return $data;
        }
        
        
        public function addPlg(){
            $data = '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css"/>';
            $data .= '<link href="' . base_url() . 'assets/AdminLTE-2.3.7/plugins/morris/morris.css" rel="stylesheet" type="text/css"/>';

            return $data;
        }
        
        public function addImg(){
            $data = '';
            $data .= base_url() . 'assets/img/';
            return $data;
        }
        
        public function addPic(){
            $data = '';
            $data .= base_url() . 'assets/pictures/';
            
            return $data;
        }
        

        
        public function formCss(){
            $data = '';
            $data .= base_url() . 'assets/forms/css/';
            return $data;
        }
        
        public function formFonts(){
            $data = '';
            $data .= base_url() . 'assets/forms/fonts/';
            return $data;  
        }
        
        public function formImg(){
            $data = '';
            $data .= base_url() . 'assets/forms/images/';
            return $data;
        }

        public function addAjax(){
            $data = '';
            $data .= base_url() . 'assets/js/ajax/';
            return $data;
        }
    }
?>
