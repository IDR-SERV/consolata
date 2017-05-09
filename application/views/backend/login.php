<!DOCTYPE html>
<html lang="es">
<head>
<title>Consolata | Login</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- Custom Theme files -->
<link href="<?= $css ?>style.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?= $css ?>font-awesome.css" rel="stylesheet"> 
<?= $css1 ?>
<?= $js ?>
<!-- //font-awesome icons -->
<!-- web font -->
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-agile">
		<div class="content">
			<div class="top-grids">
				<div class="top-grids-left">
					<div class="signin-form-grid">
						<div class="signin-form">
							<?= form_open('defaultbackend/ingresar'); ?>

							<?= my_validation_errors(validation_errors()); ?>

								<legend><h4 style="color: #FFFFFF;">Ingrese al sistema</h4></legend>
								<?= form_label('Usuario','username',array('class'=>'text-primary')); ?>
								<?=form_input(array('type'=>'text','name'=>'username','paceholder'=>'usuario', 'id'=>'username', 'value'=>set_value('username')));?>

								<?= form_label('Password','password',array('class'=>'text-primary')); ?>
								<?=form_input(array('type'=>'password','name'=>'password', 'id'=>'password','value'=>set_value('password')));?>
								
								<label for="brand"><span></span> </label> 
								<?=form_submit(array('name'=>'Aceptar', 'id'=>'aceptar','value'=>'Aceptar'))?>

								<div class="signin-agileits-bottom"> 
									<p><a id="btn_olvide_clave" href="#">Olvid&eacute; mi contrase&ntilde;a</a></p>  
									<p><a href="<?=base_url()?>activacion-cuenta">Activar mi cuenta</a></p>    
								</div> 
								
							<?= form_close(); ?>
						</div>
						<div class="signin-firm">
							<div class="social-grids">
								<div class="social-text">
									<p>S&iacute;guenos</p>
								</div>
								<div class="social-icons">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-rss"></i></a></li>
									</ul>
								</div>
								<div class="clear"> </div>
							</div>
						</div>
					</div>
				</div>
                            <div class="top-grids-right">
                                <div class="signin-form subscribe">	
                                        <form id="home" action="<?= base_url() ?>" method="post">
                                                <input type="submit" value="Ir al home">
                                        </form>
                                </div>
                            </div>
				<div class="clear"> </div>
			</div>
		</div>
		<div class="copyright">
			<p> Desarrollado por <a href="#" target="_blank">IDR-Serv</a></p>
		</div>
	</div>	
	<!-- //main --> 
</body>

<div class="modal modal-primary fade" id="modal_restaurar_clave" tabindex="-1" hidden="true" role="dialog">
  <div class="modal-dialog"> 
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span> Restaurar contrase&ntilde;a</h4>
      </div>
      <div class="modal-body">
          <form name="frm_restaurar_clave" id="frm_restaurar_clave" action="loginController/restaurarClave" method="post">
          	<div class="form-group">
              <label>Seleccione usuario</label>
              <select name="nick-usuario" class="form-control">
              	<option name="id-usuario" value="0">Seleccione...</option>
              	<?php 
              	foreach($usuarios as $usr){
              	?>
              	<option value="<?= $usr->email ?>"><?= $usr->email ?></option>
              	<?php 
              	} 
              	?>
              </select>
            </div>
            <div class="form-group">
              <label>Ingrese contrase&ntilde;a nueva</label>
              <input name="clave-nueva" id="clave-nueva" type="password" class="form-control">
            </div>
            <div class="form-group">
              <label>Confirme contrase&ntilde;a nueva</label>
             <input name="rep-clave-nueva" id="rep-clave-nueva" type="password" class="form-control">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                <button name="guardar-clave-nueva" id="guardar-clave-nueva" type="submit" class="btn btn-outline">Guardar</button>
            </div>
          </form>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<script type="text/javascript">
    $('#home').submit
    $('#btn_olvide_clave').click(function(){
    	$("#modal_restaurar_clave").modal("show");
    });
</script>
</html>