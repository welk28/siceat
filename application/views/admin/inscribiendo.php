  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscribiendo grupo</h1> 

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Horario</li>
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
              Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");?>
            </h3>
            
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <?php
              $ci = &get_instance();
              $ci->load->model("Inscribiendo_model");

              $x=0;
              foreach ($alumnos as $a ) {
                $x++;
                echo $x.": ".$a->matricula."<br>";
                
                $z=0;
                foreach ($horarios as $h ) {
                  $z++;
                  echo $x.": ".$h->idh."<br>";
                  $agregado= $ci->Inscribiendo_model->guardaCursa($a->matricula, $h->idh);
                  if($agregado==1){echo "agregado <br>";}else{echo "ERROR <br>";}
                }
              } 
              
              ?>
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

