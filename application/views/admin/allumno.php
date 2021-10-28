  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Alumno</h1>
          </div>
          <div class="col-sm-3">
          <a href="<?php echo base_url();?>admin/alumno/alumnoAdd" class="btn btn-sm btn-primary" title="Nuevo alumno">
          <i class="far fa-plus-square"></i> Agregar
          </a> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Alumnos Inscritos</li>
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
             <table id="listax" class="table table-sm table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="">No</th>
                    <th width="">Control</th>
                    <th width="">Nombre</th>
                    <th width="">S</th>
                    <th width="">Fecnac</th>
                    <th width="">Ed</th>
                    <th width="">Grado</th>
                    <th width="">Taller</th>
                    <th width=''>Horario/Datos/Boleta</th>
                  </tr>
                  </thead>
                  <tbody>
                    
                      <?php $x=0; ?>
                      <?php foreach($alumno as $alu):?>
                        <?php $x++; ?>
                        <tr>
                          <td><?php echo $x?></td>
                          
                          <td><?php echo $alu->matricula;?></td>
                          <td><?php echo $alu->app." ".$alu->apm." ".$alu->nom;?> </td>
                          <td><?php echo $alu->sexo;?></td>
                          <td><?php echo $alu->fecnac;?></td>
                          <td><?php 
                            if(!empty($alu->fecnac)){
                            $fechanacimiento=$alu->fecnac;
                            list($ano,$mes,$dia) = explode("-",$fechanacimiento);
                            $edad= date("Y") - $ano;
                            echo $edad;
                          }
                          ?></td>
                          <td><?php echo $alu->grado.$alu->grupo;?></td>
                          <td><?php echo $alu->nomt;?></td>
                          <td align="center">
                          <div class="btn-group">
                              <form action="<?php echo base_url();?>admin/alumno/horalumno" target="_blank" method="post">
                                <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                                <button type="submit" class="btn btn-sm btn-info" title="Horario">
                                <i class="far fa-clock"></i>
                                </button>
                              </form>
                              <form action="<?php echo base_url();?>admin/alumno/datos" target="_blank" method="post">
                                <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                                <button type="submit" class="btn btn-sm btn-primary" title="Datos del alumno">
                                <span class="far fa-id-card"></span>
                                </button>
                              </form>
                              <form action="<?php echo base_url();?>admin/alumno/boleta" target="_blank" method="post">
                              <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                                <button type="submit" class="btn btn btn-sm btn-success" title="Boleta Actual">
                                <span class="fas fa-th-list"></span>
                                </button>
                              </form>
                          </td>
                         
                        </tr>
                      <?php endforeach;?>
                    
                  </tbody>
                  
                </table>
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

