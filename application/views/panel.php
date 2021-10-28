  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1>Sistema de Control Escolar Administrativo Beta (SICEA 3.0)</h1>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
              <li class="breadcrumb-item active">Panel Inicial</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Bienvenido(a) !!
            </h3>
          </div>
          <div class="card-body">
            <div class="col-12">
              <h5>Hola <?php echo $this->session->userdata("nombre")?></h5>
              <p>Has realizado tu inicio de sesión como usuario <b><?php echo $this->session->userdata("tipo")?></b> 
              en el periodo comprendido <b><?php echo $this->session->userdata("descper")?></b>, 
              incorporado en el turno 
              <?php 
                if($this->session->userdata("turno")=='V')
                  echo "<b>Vespertino</b>";
                else
                  echo "<b>Matutino</b>";
              ?>
              </p>
              
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->