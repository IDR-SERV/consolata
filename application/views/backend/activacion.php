<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Consolata | <?= $titulo ?></title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<?= $css ?>
</head>
<body>
<div class="content">
<div class="box box-primary">
	<div class="box-header with-border">
		<h1>Activaci&oacute;n de cuenta</h1>
	</div>
	<form role="form">
		<div class="box-body">
			<div class="form-group">
				<label for="exampleInputEmail1">Email address</label>
				<input type="email" class="form-control" id="email" name="email" placeholder="Ingrese email">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Ingrese una contrase&ntilde;a</label>
				<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
			</div>
			<div class="form-group">
				<label for="exampleInputPassword1">Repita la contrase&ntilde;a</label>
				<input type="password" class="form-control" id="passRep" name="passRep" placeholder="Password">
			</div>
		</div>
		<!-- /.box-body -->

		<div class="box-footer">
		<button type="button" id="volver" class="btn btn-danger pull-left">En otro momento</button>
		<button type="submit" class="btn btn-primary pull-right">Activar</button>
		</div>
	</form>

</div>
</div>
</body>

<?= $plg ?>
<?= $js ?>

<script type="text/javascript">
	$(document).ready(function(){
		$("#volver").click(function(){
			window.location.href='<?= base_url() ?>'
		});
	});
</script>
</html>