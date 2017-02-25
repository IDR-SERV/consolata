<?php
	if(!defined('BASEPATH')) exit('No direct script access allowed');

	if(!function_exists('my_validation_errors')){
		function my_validation_errors($errors){
			$salida = '';
			if($errors){
				$salida .= '<div class="alert alert-error">';
				$salida .= '<button type="button" class="close" data-dismiss="alert">x</button>';
				$salida .= '<h4>Ha ocurrido un error</h4>';
				$salida .= '<small>'.$errors.'</small>';
				$salida .= '</div>';
			}
			return $salida;
		}//fin de la funcion
	}
?>