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

    <!--PARA CAMBIAR LA IMAGEN-->
    <form name="frm_carga_foto" action="<?= base_url() . 'noticiasController/cargar_imagen'?>" class="form-inline" method="post" enctype="multipart/form-data">
      <div class="input-group">
      <input type="file" name="foto_noticia" class="pull-left filestyle form-control" data-buttonText="Cambiar la Imagen" data-buttonName="btn-primary" data-buttonBefore="true" data-badge="false" data-buttonSize="sm"></input>
      <br>
      <input type="hidden" name="idNoticia" value="<?= $id_noticia ?>"></input>
      <span class="input-group-btn"><input id = "carga_foto" name="carga_foto" type="submit" class="btn btn-primary form-control pull-right" value="OK"></input></span>
      </div>
    </form>


      <form role="form" action="<?= base_url(). 'noticiasController/editar_noticia_ok/'.$id_noticia?>" method="post">
        <div class="form-group">
          <label for="titulo_noticia">Titulo Noticia</label>
          <h2 class="text-primary text-uppercase"><p><input type="text" class="form-control" name="titulo_noticia" value="<?= $titulo_noticia ?>"></p></h2>
        </div>
        <div class="form-group">
          <label for="contenido_noticia">Contenido noticia</label>
          <p class="text-justify">
            <textarea class="textarea" name="contenido_noticia" id="contenido_noticia" placeholder="Escriba el contenido..." style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
              <?= $contenido_noticia ?>
            </textarea>
          </p>
        </div>
        <div class="form-group">
          <a class="btn btn-danger pull-left" href="<?= $back ?>">Volver</a>
          <button class="btn btn-primary pull-right" type="submit">Aceptar</button>
        </div>
      </form>
    </div>
    <!-- /.box-body -->
</div>