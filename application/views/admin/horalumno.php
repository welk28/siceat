  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Horario. <?php //echo $alu->matricula; ?></h1> 

          </div>
          <div class="col-sm-9">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active"><a href="<?php echo base_url();?>admin/alumno">Alumnos Inscritos</a></li>
              <li class="breadcrumb-item active">Horario Alumno</li> 
							<?php 

								
							
								//print_r($inscribe);
								// if ($inscrito==0){
								// 	foreach ($inscribe as $in) {
								// 		$agregado= $this->Alumno_model->guardaCursa($in->idh, $alu->matricula);
								// 	}
								// }
								?>
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
            <div class="row">
              <div class="col-sm-5">
                <h3 class="card-title"><i class="fas fa-tag"></i>Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");?></h3>
              </div>
              
							<div class="col-sm-3">
                <form id="frmCargahorario" action="<?php echo base_url();?>admin/alumno/cargaHorario" method="post">
                  <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                  <input type="hidden" value="<?php echo $alu->idt; ?>" name="idt">
									<input type="hidden" value="<?php echo $alu->grado; ?>" name="grado">
                  <input type="hidden" value="<?php echo $alu->grupo; ?>" name="grupo">
                  <button type="submit" class="btn btn-sm btn-success" title="Carga el horario del alumno">
                  <i class="far fa-trash-alt"></i> Cargar Horario
                  </button>
                </form>
              </div>
							<div class="col-sm-3">
                <form id="frmvaciarx" action="<?php echo base_url();?>admin/alumno/vaciar" method="post">
                  <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                  
                  <button type="submit" class="btn btn-sm btn-primary" title="Vaciar horario del alumno">
                  <i class="far fa-trash-alt"></i> Vaciar Horario
                  </button>
                </form>
              </div>
            </div>
            
            
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-sm table-borderless">
                    <tr>
                      <td width="200" rowspan="3" class="align-middle"><img src="<?php echo base_url();?>images/logoGEM.jpg" width="200" > </td>
                      <td align="center"><h3>ESCUELA SECUNDARIA TECNICA No 39</h3></td>
                      <td width="200" rowspan="3" class="align-middle"><img src="<?php echo base_url();?>images/tecnica.gif" alt="" width="100"></td>
                    </tr>
                    <tr>
                      <td align="center"><h4>"Jesús Reyes Heroles"</h4></td>
                    </tr>
                    <tr>
                      <td align="center"><h4>C.C.T. 15DST0049C</h4></td>
                    </tr>
                </table>
              </div>
            </div>
            <div class="row mt-3 mb-3">
              <div class="col-sm-12">
                <table class="table table-sm table-borderless">
								<tr>
                    <td width="300">Matricula:</td>
                    <td width="600"> <u><?php echo $alu->matricula; ?> </u> </td>
                    <td> </td>
                    <td> </td>
                  </tr>
                  <tr>
                    <td width="300">Nombre del alumno(a):</td>
                    <td width="600"> <u><?php echo $alu->app." ".$alu->apm." ".$alu->nom; ?> </u> </td>
                    <td>Grado: <u><?php echo $alu->grado; ?> </u></td>
                    <td>Grupo: <u><?php echo $alu->grupo; ?> </u></td>
                  </tr>
                  <tr>
                    <td>Tecnología:</td>
                    <td><u><?php echo $alu->nomt; ?> </u></td>
                    <td>Turno:</td>
                    <td><u>
                          <?php
                          if($alu->turno=='V')
                            echo "Vespertino";
                          else
                            echo "Matutino";  ?> </u>
                    </td>
                  </tr>
                </table>
              </div>
            </div>
            <div class="col-md-12">
              <table id="listaxx" class="table table-sm table-bordered table-striped">
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
                    <!-- <th align="center">Opciones</th> -->
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
                        
                        <td><?php echo $ho->nommat;?><br> <?php echo $ho->nomp;?> </td>
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
                        <!-- <td align="center">
                            <div class="btn-group">
                              <a href="#" class="btn btn-sm btn-warning" title="Quitar de horario">
                              <i class="far fa-trash-alt"></i>
                              </a>
                              
                            </div>
                          </td> -->
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
                    <!-- <th align="center">Opciones</th> -->
                  </tr>
                  </tfoot>
                </table>
            </div>
            <div class="row">
            
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

