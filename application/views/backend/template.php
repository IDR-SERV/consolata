<!--A.M.D.G.-->

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  
  <title>Consolata | <?= $titulo ?> </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <?= $css ?>

</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="escritorio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><span class="ion-ios-home"></span></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>C</b>onsolata</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-danger">4</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Solicitudes de aprobación de Recarga</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php for($i=0; $i<4; $i++){ ?>
                  <li><!-- start message -->
                    <a href="#">
                      <div class="pull-left">
                        <!--<img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">-->
                      </div>
                      <h4>
                        Mensaje N&uacute;mero <?=$i + 1?>
                        <small><i class="fa fa-clock-o"></i> Fecha</small>
                      </h4>
                      <p>Glosa mensaje <?=$i + 1?></p>
                    </a>
                  </li>
                  <!-- end message -->
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todos los mensajes</a></li>
            </ul>
          </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Solicitudes de espacios</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <?php for($i=0;$i<10;$i++){?>
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Solicitud: <?=$i + 1?>
                      <small class="pull-right"><i class="fa fa-clock-o"></i> Fecha</small>
                    </a>
                  </li>
                  <?php } ?>
                </ul>
              </li>
              <li class="footer"><a href="#">Ver todas las solicitudes</a></li>
            </ul>
          </li>
          <!--Usuario-->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?=$foto != ''? $pic.$foto: $pic.'avatar5.png'?>" class="user-image" alt="User Image">
              <span class="hidden-xs">
              <?= $this->session->userdata('usrId') != ''? $this->session->userdata('user'): 'Perfil no configurado'?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?=$foto != ''?  $pic.$foto: $pic.'avatar5.png'?>" class="img-circle" alt="User Image">

                <p>
                  <?php
                    if($this->session->userdata('usrId') != '')
                      echo $name ." " . $lastName;
                    else
                      '';
                  ?>
                  <small><?= $this->session->userdata('email') ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="perfil" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=$foto != ''? $pic.$foto: $pic.'avatar5.png'?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?= 
          $this->session->userdata('usrId') != ''?$name.' '.$lastName: 'Perfil no configurado'
          ?>
          </p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <!--===============================================================================================================-->
      <!--Menu-->
      <!--===============================================================================================================-->
      <ul class="sidebar-menu">
        <li class="header">MENU</li>
        <?php foreach($partentMenu as $parent):?>
          <li class="active treeview"><a href="#"><i class="<?= $parent->clase ? $parent->clase : ''; ?>"></i> <span><?= $parent->name?$parent->name:''; ?></span>
          <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <?php if(count($this->menu_model->childMenu($parent->id)) > 0) { ?>
            <ul class="treeview-menu">
              <?php foreach($this->menu_model->childMenu($parent->id) as $child) { ?>
              <li><a href="<?= $child->path ?>"><i class="<?= $child->clase?$child->clase:'fa fa-circle-o' ?>"></i> <?= $child->name?$child->name:''; ?></a></li>
              <?php } ?>
            </ul>
          <?php } ?>
          </li>
        <?php endforeach ?>

      </ul>
      <!--===============================================================================================================-->
      <!--Menu-->
      <!--===============================================================================================================-->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?= $seccion ?>
        <small><?= $descripcion_seccion ?></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="row">
<!--===============================================================================================================-->
<!--CONTENIDO-->
<!--===============================================================================================================-->
<div class="col-md-12">
    <?php $this->load->view($contenido) ?>
</div>
<!--===============================================================================================================-->
<!--CONTENIDO-->
<!--===============================================================================================================-->
</div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Desarrollado por: <a href="#">IDR-SERV</a>.</strong>

  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" id="menu-derecha-home" data-toggle="tab"><i class="fa fa-home"></i></a></li>
        <?php if($nivel == 'ADMINISTRADOR') {?>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        <?php }?>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Actividad Reciente</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cumplea&ntilde;os empleado</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Ventas por producto</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <?php if($nivel == 'ADMINISTRADOR') {?>
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">Configuraciones</h3>

          <div class="form-group">
              <p>
                  <button class="btn btn-primary" style="width: 100%;">Crear Usuario</button>
              </p>
          </div>
          
          <hr class="text-success"/>
          <!-- /.form-group -->
          <div class="form-group">
              <p>
                  <button class="btn btn-primary" style="width: 100%;">Establecer Permisos</button>
              </p>
          </div>
          
          <h3 class="control-sidebar-heading">Eliminar Empleado</h3>

          <div class="form-group"> 
            <p>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar" aria-describedby="sizing-addon2">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                      <span class="fa fa-binoculars text-primary"></span>
                  </button>
                  </span>
              </div>
            <br>
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
                Datos del Empleado<br>
                Se eliminan solo de manera lógica
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Eliminar
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
      <?PHP }?>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
<?= $plg ?>
<?= $js ?>
<!-- jQuery 2.2.3 -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#menu-derecha-home").click();
    });
</script>

</body>
</html>
