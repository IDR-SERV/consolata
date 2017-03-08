<!-- A. M. D. G. -->
<script type="text/javascript">
  <?= $ajax."noticias.js" ?> 
</script>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <button class="btn btn-success" data-toggle="modal" data-target="#modal_nueva_noticia"><span class="glyphicon glyphicon-plus"></span> Nueva</button>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Título</th>
                  <th>Autor</th>
                  <th>Fecha</th>
                  <th style="width: 130px; text-align: center;">Acciones</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($noticias as $fila) {?>
                <tr>
                  <td><?= $fila->titulo ?></td>
                  <td><?= $fila->email ?></td>
                  <td><?= $fila->fecha_creacion ?></td>
                  <td style="width: 130px; text-align: center;">
                    <a href="#" title="Leer"><i class="glyphicon glyphicon-eye-open text-success"></i></a>
                    &nbsp;
                    <a href="#" title="Editar"><i class="glyphicon glyphicon-pencil text-primary"></i></a>
                    &nbsp;
                    <?php if($nivel == 'ADMINISTRADOR') {?>
                    <a href="#" title="Eliminar"><i class="glyphicon glyphicon-remove-sign text-danger"></i></a>
                    <?php } ?>
                  </td>
                </tr>
                <?php } ?>
                <tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


    <!--
    ESTE ES EL MODAL DONDE SE CARGA LA NOTICIA
    Este modal se cargará con un ajax
    -->
     <div class="modal modal-primary fade" id="modal_nueva_noticia" tabindex="-1" hidden="true" role="dialog">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title"><span class="glyphicon glyphicon-info-sign"></span> Nueva Noticia</h4>
            <small class="pull-right"><b>Autor: <?= $this->session->userdata('user')?></b></small>
          </div>
          <div class="modal-body">
              <form name="frm_noticias" id="frm_noticias" action="noticiasController/nuevo" method="post">
                <div class="form-group">
                  <label>Título</label>
                  <input name="titulo_noticia" id="titulo_noticia" type="text" class="form-control" placeholder="Ingrese el título...">
                </div>
                 <div class="form-group">
                  <label>Imágen</label>
                  <input name="foto_noticia" id="foto_noticia" type="file">
                </div>
                <div class="form-group">
                  <label>Contenido</label>
                  <textarea name="contenido_noticia" id="contenido_noticia" class="form-control" rows="12" placeholder="Escriba el contenido..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button name="guardar_noticia" id="guardar_noticia" type="submit" class="btn btn-outline">Guardar</button>
                </div>
              </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->


<script>

function m_nueva_noticia(){
  $("#modal_nueva noticia").modal("show");
}


  $(document).ready(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });

  });
</script>
