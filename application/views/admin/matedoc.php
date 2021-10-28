  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Horario. </h1> 
            <h3>Docente: <?php echo $docente->nomp;?></h3>    
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>admin/docente/materias">Docente/Materias</a></li>
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
              Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");
              ?>
              Turno: 
              <?php 
                if($this->session->userdata("turno")=='V')
                  echo "Vespertino";
                else
                  echo "Matutino";
              ?>
            </h3>
            
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <table id="lista" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">#</th>
                    <th width=''>Turno</th>
                    <th width=''>Grupo</th>
                    
                    <!--<th width="">Idh/Mat</th> -->
                   
                    <th width="">Materia</th>
                    <th>Lunes </th>
                    <th>Martes </th>
                    <th>Mierc </th>
                    <th>Jueves </th>
                    <th>Viernes </th>
                    
                    <th align="center"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($materias)):?>
                    <?php $x=0; ?>
                    <?php foreach($materias as $ho):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php if($ho->turno=='V')
													echo "Vespertino";
												else
													echo "Matutino";
													?>  </td>
                        <td><?php echo $ho->grado.$ho->grupo;?> </td>
                        
                        <!--td><?php echo $ho->idh;?> <br> <?php echo $ho->idmat;?> </td> -->
                        
                        <td><?php echo $ho->nommat;?> </td>
                        <?php //invocamos la instancia y el modelo
                          $ci = &get_instance();
                          $ci->load->model("Horario_model");
                           
                          $lunes= $ci->Horario_model->getLunes($ho->idh);
                           $martes= $ci->Horario_model->getMartes($ho->idh);
                           $miercoles= $ci->Horario_model->getMiercoles($ho->idh);
                           $jueves= $ci->Horario_model->getJueves($ho->idh);
                           $viernes= $ci->Horario_model->getViernes($ho->idh);
                           ?>
                        <td align="center">  
                        <?php if(!empty($lunes)):?> 
                        <?php 
                          foreach ($lunes as $lun) {
                            echo $lun->hora."<br>";
                          }
                        ?>
                        <?php endif;?>  
                        </td>
                        <td align="center"> 
                        <?php if(!empty($martes)):?>
                        <?php 
                          foreach ($martes as $ma) {
                            echo $ma->hora."<br>";
                          }
                        ?>
                        <?php endif;?>  
                        </td >
                        <td align="center"> 
                        <?php if(!empty($miercoles)):?>
                        <?php 
                          foreach ($miercoles as $mie) {
                            echo $mie->hora."<br>";
                          }
                        ?>
                        <?php endif;?>  
                        </td>
                        <td align="center"> 
                        <?php if(!empty($jueves)):?>
                        <?php 
                          foreach ($jueves as $jue) {
                            echo $jue->hora."<br>";
                          }
                        ?>
                        <?php endif;?>  
                        </td>
                        <td align="center"> 
                        <?php if(!empty($viernes)):?>
                        <?php 
                          foreach ($viernes as $vie) {
                            echo $vie->hora."<br>";
                          }
                        ?>
                        <?php endif;?>  
                        </td>
                        <td align="center">
                            <div class="btn-group">
                              <form action="<?php echo base_url();?>admin/docente/listagpomat" method="post">
                                <input type="hidden" value="<?php echo $ho->idh;?>" name="idh">
                                <input type="hidden" value="<?php echo $docente->rfcp;?>" name=rfcp>
                                <button type="submit" class="btn btn-sm btn-primary" title="Lista de alumnos" formtarget="_blank">
                                <span class="fas fa-book"></span>
                              </button>
                              </form>
                              <form action="<?php echo base_url();?>admin/docente/addcal" method="post">
                                <input type="hidden" value="<?php echo $ho->idh;?>" name="idh">
                                <input type="hidden" value="<?php echo $docente->rfcp;?>" name=rfcp>
                                <button type="submit" class="btn btn-sm btn-success" title="Calificar" formtarget="_blank">
                                <span class="fas fa-th-list"></span>
                              </button>
                              </form>
                            </div>
                          </td>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  <tr>
                    <th width="">#</th>
                    <th width=''>Turno</th>
                    <th width=''>Grupo</th>
                    
                    <!--<th width="">Idh/Mat</th>-->
                    
                    <th width="">Materia</th>
                    <th>Lunes</th>
                    <th>Martes</th>
                    <th>Mierc</th>
                    <th>Jueves</th>
                    <th>Viernes</th>
                   
                    <th align="center"></th>
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

