  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscribiendo <br> <?php echo "Grado:".$grado."<br> Taller: ".$nommat; ?></h1> 
          </div>
          <div class="col-sm-3">
          <a href="<?php echo base_url();?>admin/horariost" class="btn btn-sm btn-success"><i class="fas fa-list"></i> Volver a lista de Talleres </a>
          </div>
          <div class="col-sm-3">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item ">Horario</li>
              <li class="breadcrumb-item active">Inscripción a Talleres</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
    <!--<div class="preloader"></div>-->
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
                    <th width=''>matricula</th>
                    <th width="">Nombre</th>
                    <th align="center" width=""></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($alumnos)):?>
                    <?php 
                      $ci = &get_instance();
                      $ci->load->model("Alumno_model");

                      $x=0;?>
                    <?php foreach ($alumnos as $a ):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $a->matricula;?> </td>
                        <td><?php echo $a->app." ".$a->apm." ".$a->nom;?> </td>                        
                        <?php             
                          $agregado= $this->Alumno_model->guardaCursa($idh, $a->matricula);
                          if($agregado==1){?>
                            <td align="center">
                                <a href="#" class="btn btn-sm btn-success" title="Inscrito"><i class="far fa-check-circle"></i></a>
                            </td>
                            <?php
                          }else{ ?>
                            <td align="center">
                                <a href="#" class="btn btn-sm btn-warning" title="Inscrito"><i class="fas fa-exclamation-circle"></i></a>
                            </td>
                            <?php
                          }
                        ?>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                <tfoot>
                  <tr>
                    <th width="">No</th>
                    <th width=''>rfc</th>
                    <th width="">Nombre</th>
                    
                    
                    <th align="center" width=""></th>
                  </tr>
                </tfoot>
              </table>

              <?php /*
              
               {
                $x++;
                echo $x.": ".$a->matricula."<br>";
                
                $z=0;
                 {
                  $z++;
                  echo $x.": ".$h->idh."<br>";
                  
                  
                }
              } 
              */
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

