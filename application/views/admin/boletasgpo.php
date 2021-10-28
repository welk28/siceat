  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inscribir grupos a Horarios ofertados</h1> 

          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item ">Horario</li>
              <li class="breadcrumb-item active">Inscripción de grupo</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content" >
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
              <table id="listax" class="table table-sm table-bordered table-striped" width="500" align="center">
                <thead>
                  <tr>
                    <th width="">#</th>
                    <th width=''>Grupo</th>
                                       
                    <th align="center">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($horario)):?>
                    <?php $x=0; ?>
                    <?php foreach($horario as $ho):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $ho->grado."".$ho->grupo;?> </td>
                        <?php //invocamos la instancia y el modelo
                          $ci = &get_instance();
                          $ci->load->model("Horarios_model");
                           
                          $cant= $ci->Horarios_model->getinsc($ho->grado, $ho->grupo);
                           ?>
                        
                        <td align="center">
                          <?php if($cant>0): ?>
                            <a href="#" class="btn btn-sm btn-primary" title="Inscrito"><i class="far fa-check-circle"></i></a>
                            
                          <?php else: ?>
                            <div class="btn-group">
                            <form class="frmgrupo" action="<?php echo base_url();?>admin/alumno/inscribeGrupo" method="post">
                              <input type="hidden" name="grado" value="<?php echo $ho->grado; ?>" id="">
                              <input type="hidden" name="grupo" value="<?php echo $ho->grupo; ?>" id="">
                              <button type="submit" class="btn btn-sm btn-success" title="Inscribir grupo">
                              <span class="fas fa-th-list"></span>
                              </button>                                
                              </a>    
                            </form>                           
                            </div>
                          <?php endif;?>
                        </td>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  <tr>
                  <th width="">#</th>
                    <th width=''>Grupo</th>                    
                    <th align="center">Opciones</th>
                  </tr>
                  </tfoot>
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

