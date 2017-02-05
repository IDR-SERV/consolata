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
									<p><a href="#">Olvid&eacute; mi contrase&ntilde;a</a></p>  
									<p><a href="activacion-cuenta">Activar mi cuenta</a></p>    
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
<script type="text/javascript">
    $('#home').submit
</script>
</html>