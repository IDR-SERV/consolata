//A. M. D. G.
switch ("noticias"){
	case: "nueva"
		$.ajax({
			url: "<?= base_url().noticiasController/nuevo ?>",
			type: "POST",
			data: $("#frm_noticias").serializa();
			success: function(respuesta){
				alert(respuesta);
			}
		});
	break;

}//fin de sitch
