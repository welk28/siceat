<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>SICEA 3.0</title>
  <!-- FAVICON -->
  <link rel="shortcut icon" type="image/png" href="<?php echo base_url()?>images/tecnica.gif" />
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Alertify -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/alertifyjs/css/themes/default.css">
	<!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- DataTables -->
   <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <!-- DataTables export-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/datatable_export/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/precarga.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    @media all {
   div.saltopagina{
      display: none;
   }
}
   
@media print{
   div.saltopagina{
      display:block;
      page-break-before:always;
   }
}
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="preloader"></div>
<div class="wrapper">
<!-- INICIO DE SUPER USUARIO-->
<?php if($this->session->userdata("idr")==5): ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="" class="navbar-brand">
        <img src="<?php echo base_url()?>images/tecnica.gif" alt="Tecnica 39" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SICEA 3.0</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Alumnos</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>su/alumno/alumnoAdd" class="dropdown-item" title="Dar de alta nuevo alumno">Agregar</a></li>
              <li><a href="<?php echo base_url();?>su/alumno" class="dropdown-item" title="Alumnos inscritos">Inscritos</a></li>
              <li><a href="<?php echo base_url();?>su/alumno/allumno" class="dropdown-item" title="Ver a todos los alumnos registrados">General</a></li>
              <!--<li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-buscar">Buscar </a></li> -->
              
            </ul>
          </li>
         
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Horario</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Agregar</a></li>
              <li><a href="<?php echo base_url();?>su/horario" class="dropdown-item">Lista </a></li>
              <li><a href="<?php echo base_url();?>su/horarios" class="dropdown-item">Inscribir Grupo</a></li>
							<li><a href="<?php echo base_url();?>su/horariost" class="dropdown-item">Inscribir a taller</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Reporte</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>su/reporte/bgpo" class="dropdown-item" title="Dar de alta nuevo alumno">Boleta grupal General</a></li>
              <!--<li><a href="<?php echo base_url();?>admin/alumno/boletas" class="dropdown-item" title="Alumnos inscritos">Boletas</a></li>-->
            </ul>
          </li>
          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Docente</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a tabindex="-1" href="<?php echo base_url();?>su/docente" class="dropdown-item">Lista</a>
              </li>              
              <li>
                <a tabindex="-1" href="<?php echo base_url();?>su/docente/materias" class="dropdown-item">Materias</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>admin/materia" class="nav-link">Materias</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>admin/taller" class="nav-link">Talleres</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Configuración</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>admin/altatrim" class="dropdown-item">Alta Trimestral</a></li>
              <li><a href="<?php echo base_url();?>admin/periodo" class="dropdown-item">Periodo </a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#modal-password" class="nav-link">Contraseña</a>
          </li>
            </ul>
          </li>
        </ul>

        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-tie"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Usuario: <?php echo $this->session->userdata("nombre")?></span>
            <!--<span class="dropdown-header">IDperiodo: <?php echo $this->session->userdata("periodo")?></span>-->
            <span class="dropdown-header">Periodo: <?php echo $this->session->userdata("descper")?></span>
            <div class="dropdown-divider"></div>
            <span class="dropdown-header">Turno: 
              <?php 
                if($this->session->userdata("turno")=='V')
                  echo "Vespertino";
                else
                  echo "Matutino";
              ?></span>
            <!-- <span class="dropdown-header">IDr: <?php echo $this->session->userdata("idr")?></span> -->
            <span class="dropdown-header">Tipo: <?php echo $this->session->userdata("tipo")?></span>
            <span class="dropdown-header">Periodo: <?php echo $this->session->userdata("descper")?></span>
            <!-- <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div> -->
            <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
<?php endif; ?>
<!-- FIN DE SUPER USUARIO-->
<?php if(($this->session->userdata("idr")==1)|| ($this->session->userdata("idr")==2)): ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="<?php echo base_url()?>images/tecnica.gif" alt="Tecnica 39" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SICEA 3.0</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Alumnos</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>admin/alumno/alumnoAdd" class="dropdown-item" title="Dar de alta nuevo alumno">Agregar</a></li>
              <li><a href="<?php echo base_url();?>admin/alumno" class="dropdown-item" title="Alumnos inscritos">Inscritos</a></li>
              <li><a href="<?php echo base_url();?>admin/alumno/allumno" class="dropdown-item" title="Ver a todos los alumnos registrados">General</a></li>
              <!--<li><a href="#" class="dropdown-item" data-toggle="modal" data-target="#modal-buscar">Buscar </a></li> -->
              
            </ul>
          </li>
         
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Horario</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>admin/horario/addhrsearch" class="dropdown-item">Agregar</a></li>
              <li><a href="<?php echo base_url();?>admin/horario" class="dropdown-item">Lista </a></li>
              <li><a href="<?php echo base_url();?>admin/horarios" class="dropdown-item">Inscribir Grupo</a></li>
							<li><a href="<?php echo base_url();?>admin/horariost" class="dropdown-item">Inscribir a taller</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Reportes</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>admin/reporte/bgpo" class="dropdown-item" title="Lista general de grupos, seleccionar para ver calificacion generales">Boleta grupal General</a></li>
							<li><a href="<?php echo base_url();?>admin/reporte/eaprob" class="dropdown-item" title="Estadistica de Aprobación-Reprobación e Indice General de Aprovechamiento">Estadistica de Aprobación</a></li>
              <!--<li><a href="<?php echo base_url();?>admin/alumno/boletas" class="dropdown-item" title="Alumnos inscritos">Boletas</a></li>-->
            </ul>
          </li>
          
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Docente</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li>
                <a tabindex="-1" href="<?php echo base_url();?>admin/docente" class="dropdown-item">Lista</a>
              </li>              
              <li>
                <a tabindex="-1" href="<?php echo base_url();?>admin/docente/materias" class="dropdown-item">Materias</a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>admin/materia" class="nav-link">Materias</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo base_url();?>admin/taller" class="nav-link">Talleres</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Configuración</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="<?php echo base_url();?>admin/altatrim" class="dropdown-item">Alta Trimestral</a></li>
              <?php if($this->session->userdata("idr")==1): ?>
              <li><a href="<?php echo base_url();?>admin/periodo" class="dropdown-item">Periodo </a></li>
              <?php endif;?>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#modal-password" class="nav-link">Contraseña</a>
          </li>
            </ul>
          </li>
        </ul>

        
      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-tie"></i>
            <!-- <span class="badge badge-warning navbar-badge">15</span> -->
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">Usuario: <?php echo $this->session->userdata("nombre")?></span>
            <!--<span class="dropdown-header">IDperiodo: <?php echo $this->session->userdata("periodo")?></span>-->
            <span class="dropdown-header">Periodo: <?php echo $this->session->userdata("descper")?></span>
            <div class="dropdown-divider"></div>
            <span class="dropdown-header">Turno: 
              <?php 
                if($this->session->userdata("turno")=='V')
                  echo "Vespertino";
                else
                  echo "Matutino";
              ?></span>
            <!-- <span class="dropdown-header">IDr: <?php echo $this->session->userdata("idr")?></span> -->
            <span class="dropdown-header">Tipo: <?php echo $this->session->userdata("tipo")?></span>
            <span class="dropdown-header">Periodo: <?php echo $this->session->userdata("descper")?></span>
            <!-- <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div> -->
            <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
<?php endif; ?>

<!-- /.navbar PARA DOCENTE-->
<?php if($this->session->userdata("idr")==3): ?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <img src="<?php echo base_url()?>images/tecnica.gif" alt="Tecnica 39" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">SICEA 3.0</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">      
          <li class="nav-item">
            <a href="<?php echo base_url();?>docenteu/materias" class="nav-link">Mis Materias</a>
          </li>
          <li class="nav-item">
            <a href="#" data-toggle="modal" data-target="#modal-password" class="nav-link">Contraseña</a>
          </li>
            </ul>
          </li>
        </ul>

        
      </div>
      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-user-tie"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          
            <span class="dropdown-header">Usuario: <?php echo $this->session->userdata("nombre")?></span>
            <span class="dropdown-header">Periodo: <?php echo $this->session->userdata("descper")?></span>
            <div class="dropdown-divider"></div>
            <span class="dropdown-header">Turno: 
              <?php 
                if($this->session->userdata("turno")=='V')
                  echo "Vespertino";
                else
                  echo "Matutino";
              ?></span>
            <!-- <span class="dropdown-header">IDr: <?php echo $this->session->userdata("idr")?></span> -->
            <span class="dropdown-header">Tipo: <?php echo $this->session->userdata("tipo")?></span>
            <a href="<?php echo base_url(); ?>auth/logout" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
<?php endif; ?>



<!--INICIO DE MODAL cambio de contraseña  -->
<div class="modal fade" id="modal-password">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmpassword" action="<?php echo base_url();?>auth/changepass" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Modificar contraseña</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                  <label for="">Ingrese su contraseña</label>
                  <input type="password" class="form-control" name="contra" id="pcontra" placeholder="Contraseña" required>
                </div>
                <div class="form-group">
                  <label for="">Confirme su contraseña</label>
                  <input type="password" class="form-control" name="contra2" id="pcontra2" placeholder="Contraseña" required>
                
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
