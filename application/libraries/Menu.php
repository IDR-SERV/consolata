<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
class Menu{
    private $arr_menu;
    public function __construct($arr) {
        $this->arr_menu = $arr;
        //$this->load->model('defaultbackend_model');
    }
    
    public function renderMenu(){
        /*$ret_menu = '<nav><ul>';
        foreach($this->arr_menu as $seccion){
            $ret_menu .= '<li>'. $seccion .'</li>';
        }
        $ret_menu .= '</ul></nav>';
        return $ret_menu;*/
    }
}

?>
