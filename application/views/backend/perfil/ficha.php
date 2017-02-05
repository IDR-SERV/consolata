    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Perfil de Usuario
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?=$foto != ''?$pic.$foto:$pic.'avatar5.png'?>" alt="User profile picture" style="width:90px; height: 90px;">

              <h3 class="profile-username text-center"><?=$this->session->userdata('usrId')?$name:''?></h3>

              <p class="text-muted text-center"><?=$this->session->userdata('usrId')?$nivel:''?></p>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de mi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Biograf&iacute;a</strong>

              <p class="text-muted">
                <?=$this->session->userdata('usrId')?$bio:''?>
              </p>

              <hr>

              <strong><i class="fa fa-calendar-times-o margin-r-5"></i> Fecha de nacimiento</strong>

              <p class="text-muted"><?=$this->session->userdata('usrId')?date('d-m-Y',strtotime($fecnac)):''?></p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <!--===============================================================================================================-->
        <!--FIN DEL PANEL IZQUIERDO-->
        <!--===============================================================================================================-->


        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
              <li><a href="#settings" data-toggle="tab">Configuraciones</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post clearfix">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Sent you a message - 3 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>

                  <form class="form-horizontal">
                    <div class="form-group margin-bottom-none">
                      <div class="col-sm-9">
                        <input class="form-control input-sm" placeholder="Response">
                      </div>
                      <div class="col-sm-3">
                        <button type="submit" class="btn btn-danger pull-right btn-block btn-sm">Send</button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- /.post -->

                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="../../dist/img/user6-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Adam Jones</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Posted 5 photos - 5 days ago</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="row margin-bottom">
                    <div class="col-sm-6">
                      <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                    </div>
                    <!-- /.col -->
                    <div class="col-sm-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo2.png" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo3.jpg" alt="Photo">
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                          <img class="img-responsive" src="../../dist/img/photo4.jpg" alt="Photo">
                          <br>
                          <img class="img-responsive" src="../../dist/img/photo1.png" alt="Photo">
                        </div>
                        <!-- /.col -->
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="perfilController/editarPerfil" id="frm_perfil" method="post">
                <input type="hidden" name="uid" id="uid" value="<?= $this->session->userdata('usrId') ?>">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Nombre</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?=$this->session->userdata('usrId')?$name:''?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Apellido</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="<?=$this->session->userdata('usrId')?$lastName:''?>">
                    </div>
                  </div>

                  	<div class="form-group">
                  		<label for="inputName" class="col-sm-2 control-label">Fecha de Nacimiento</label>

                  		<div class="col-sm-10">
                  		<div class="input-group">
	                  	<div class="input-group-addon">
	                    	<i class="fa fa-calendar"></i>
	                  	</div>
                  		<input type="text" class="form-control" id="fechanac" name="fechanac" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?=$this->session->userdata('usrId')?date('d-m-Y',strtotime($fecnac)):''?>">
                  		</div>
                  		</div>
                	</div>

                  	<div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Detalles de biografia</label>

                    <div class="col-sm-10">
                      <input type="textarea" class="form-control" id="bio" name="bio" placeholder="Biograf&iacute;a" value="<?=$this->session->userdata('usrId')?$bio:''?>">
                    </div>
                  	</div>
                  	<div class="form-group">
		                <label for="foto" class="col-sm-2 control-label">Cargar foto</label>
		                <div class="col-sm-10">
		                	<input type="file" id="foto" name="foto">
		                </div>
                	</div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" readonly="" placeholder="Email" value="<?=$this->session->userdata('usrId')?$this->session->userdata('email'):''?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <button id="post_btn" class="btn btn-primary pull-right" onclick="enviar();">GUARDAR</button>
					<button id="back_btn" class="btn btn-danger pull-left" onclick="volver();">CANCELAR</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
<script type="text/javascript">
	$(document).ready(function(){
		$('#fechanac').datepicker({
	      autoclose: true
	    });
	});

	function volver(){
		window.history.back();
	}

	function enviar(){
		$("#post_btn").click(function(){
			alert('enviado');
			$("#frm_perfil").submit();
		});
	}
	
</script>