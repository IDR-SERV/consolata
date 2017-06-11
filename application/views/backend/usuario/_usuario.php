<section class="content">
<div class="alert alert-success" style="display: none;"></div>
	<div class="box">
		<div class="box-header">
			<button id="btn-nuevo-usuario" class="btn btn-success"><span class="glyphicon glyphicon-plus"></span> Nuevo</button>
		</div>
		<div class="box-body">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th class="hidden">ID</th>
						<th style="width:10%;">Nick</th>
						<th style="width:35%;">Email</th>
            <th style="width:20%;">Nivel</th>
            <th style="width:15%">Estado</th>
						<th style="width:20%;" class="text-center">Acciones</th>
					</tr>
				</thead>
			<tbody id='mostrar_data'></tbody>
      </table>
		</div>
	</div>
</section>

<!--
    MODAL NUEVO USUARIO
    -->
     <div class="modal modal-primary fade" id="modal_nuevo_usuario" tabindex="-1" hidden="true" role="dialog">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4><span class="glyphicon glyphicon-user"></span> <span class="modal-title"></span></h4>
            <small class="pull-right"><b>Autor: <?= $this->session->userdata('user')?></b></small>
          </div>
          <div class="modal-body">
          <form name="frm_usuario" id="frm_usuario" method="post">
          <input type="hidden" name="id_usuario" id="id_usuario" value="0">
              <div class="form-group">
                <label for="nick_usuario">Nick: </label>
                <input name="nick_usuario" id="nick_usuario" type="text" class="form-control" placeholder="Ingrese el nick del usuario...">
            </div>
				<div class="form-group">
                  <label for="nivel_usuario">Nivel: </label>
                  <select name="nivel_usuario" id="nivel_usuario" class="form-control">
					<option value="0">-- SELECCIONE --</option>
					<?php for($n=0; $n < count($nivel_usuario); $n++){?>
					<option value="<?= $nivel_usuario[$n]->id?>"><?= $nivel_usuario[$n]->nombre?></option>
					<?php } ?>
				  </select>
                </div>
				<div class="form-group">
                  <label for="email_usuario">Email: </label>
                  <input name="email_usuario" id="email_usuario" type="email" class="form-control" placeholder="Ingrese el email del usuario...">
                </div>
                
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Cerrar</button>
                    <button name="btn_guardar_usuario" id="btn_guardar_usuario" type="button" class="btn btn-outline">Guardar</button>
                </div>
              </form>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

     <!--
    MODAL NUEVO USUARIO
    -->

    <div class="modal modal-primary fade" id="modal_eliminar_usuario" tabindex="-1" hidden="true" role="dialog">
      <div class="modal-dialog"> 
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4><span class="glyphicon glyphicon-user"></span> <span class="modal-title"></span></h4>
            <small class="pull-right"><b>Autor: <?= $this->session->userdata('user')?></b></small>
          </div>
          <div class="modal-body">
            Confirme que desea eliminar este registro
          </div>
           <div class="modal-footer">
            <button class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button class="btn btn-danger" id="btnDelete">Eliminar</button>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
