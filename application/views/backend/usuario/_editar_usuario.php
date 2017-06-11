 <?php	$back = $_SERVER['HTTP_REFERER'] ?>
 <div class="box box-info">
<div class="box-header with-border">
  <h3 class="box-title">Edici&oacute;n de usuario</h3>
</div>
<!-- /.box-header -->
<!-- form start -->
<form class="form-horizontal" action="<?= base_url() . 'defaultbackend/editar_usuario/'. $id_usuario ?>" method="post">
  <div class="box-body">
	<div class="form-group">
	  <label for="email_usuario" class="col-sm-2 control-label">Email</label>

	  <div class="col-sm-10">
		<input type="email" class="form-control" id="email_usuario" name="email_usuario" value="<?=$email_usuario?>" placeholder="Email">
	  </div>
	</div>
	<div class="form-group">
	  <label for="nivel_usuario" class="col-sm-2 control-label">Nivel</label>

	  <div class="col-sm-10">
		<select name="nivel_usuario" id="nivel_usuario" class="form-control">
			<option value="<?=$id_nivel_usuario?>" style="background-color:#c4c4c4; font-weight:bold;"><?=$nivel_usuario?></option>
			<?php for ($i=0; $i < count($niveles); $i++) {?>
			<option value="<?=$niveles[$i]->id?>"><?=$niveles[$i]->nombre?></option>
			<?php } ?>
		</select>
	  </div>
	</div>
		<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="<?=$id_usuario?>">
  </div>
  <!-- /.box-body -->
  <div class="box-footer">
	<a type="button" href="<?= $back ?>" id="btn_volver" class="btn btn-danger">Volver</a>
	<button type="submit" class="btn btn-primary pull-right">Guardar</button>
  </div>
  <!-- /.box-footer -->
</form>
</div>
