  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Horario. Lista de materias ofertadas</h1> 

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
              <table id="listax" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">#</th>
                    <th width=''>Grupo</th>
                    <th width="">Materia</th>
                    <th>Lunes </th>
                    <th>Martes </th>
                    <th>Mierc </th>
                    <th>Jueves </th>
                    <th>Viernes </th>
                    <th align="center">Opciones</th>
                    <th align="center">Insc</th>
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
                        <!--td><?php echo $ho->idh;?> <br> <?php echo $ho->idmat;?> </td> -->
                        
                        <td><?php echo $ho->idh."/".$ho->nommat;?><br> <?php echo $ho->nomp;?> </td>
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
                              <!-- <a href="#" class="btn btn-sm btn-primary" title="Ver">
                                <span class="far fa-id-card"></span>
                              </a> -->
															<form id="" action="<?php echo base_url()?>admin/horario/showUpdate" method="post">
																<input type="hidden" name="idh" id="" value="<?php echo $ho->idh;?>">
																<input type="hidden" name="grado" id="" value="<?php echo $ho->grado;?>">
																<input type="hidden" name="idg" id="" value="<?php echo $ho->idg;?>">
																<button type="submit" class="btn btn-sm btn-success"><i class="far fa-edit"></i></button>
															</form>
															
                            </div>
                          </td>

                          <td align="center">
                            <div class="btn-group">
                              <!-- <a href="#" class="btn btn-sm btn-primary" title="Ver">
                                <span class="far fa-id-card"></span>
                              </a> -->
															<form id="" action="<?php echo base_url()?>admin/horario/inscgpo" method="post">
																<input type="hidden" name="idmat" id="" value="<?php echo $ho->idmat;?>">
																<input type="hidden" name="idh" id="" value="<?php echo $ho->idh;?>">
																<input type="hidden" name="grado" id="" value="<?php echo $ho->grado;?>">
																<input type="hidden" name="idg" id="" value="<?php echo $ho->grupo;?>">
																<button type="submit" class="btn btn-sm btn-success" formtarget="_blank"><span class="fas fa-th-list"></span></button>
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
                    <th width=''>Grupo</th>
                    <th width="">Materia</th>
                    <th>Lunes </th>
                    <th>Martes </th>
                    <th>Mierc </th>
                    <th>Jueves </th>
                    <th>Viernes </th>
                    <th align="center">Opciones</th>
                    <th align="center">Insc</th>
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

