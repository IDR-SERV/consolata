<?php $back = $_SERVER['HTTP_REFERER']?>
<div class="box box-widget" id="ficha-noticia">
    <div class="box-header with-border">
      <div class="user-block">
        <img class="img-circle" src="<?= $pic . $foto ?>" alt="User Image">
        <span class="username"><a href="#"><?= $name . ' ' . $lastName?></a></span>
        <span class="description">Publicaci&oacute;n: - <?= date('d-m-Y',strtotime($fecha)) ?></span>
      </div>
      <!-- /.user-block -->
      <div class="box-tools">
        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
          <i class="fa fa-circle-o"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
        </button>
        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <div style="text-align: center;">
      <img class="img-responsive pad" style="width: 700px; height: 400px;" src="<?= $pic . $imagen_noticia ?>" alt="Photo">
    </div>
    	<?php if($this->session->userdata('usrId') == $id_usuario_noticia){?>
    	<a href="<?=base_url()?>noticiasController/editar_noticia/<?= $id_noticia?>" title="Editar Noticia"><span class="glyphicon glyphicon-pencil text-primary"></span></a>
    	<?php } ?>
      	<h2 class="text-primary text-uppercase"><p><?= $titulo_noticia ?></p></h2>

      	<p class="text-justify">
        	<?= $contenido_noticia ?>
      	</p>
      	<div class="form-group">
	      <a class="btn btn-danger pull-left" href="<?= $back ?>">Volver</a>
	    </div>

	  	<div class="form-group pull-right">
	      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
	      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
      	</div>
    </div>
    <!-- /.box-body -->
</div>