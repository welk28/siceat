  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Alumno</h1>
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
              <div class="col-sm-6">
                <h3 class="card-title">
                <i class="fas fa-tag"></i>
                Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");?>
                </h3>
              </div>
              <div class="col-sm-5">
							
							</div>
              <div class="col-sm-2">
							<form action="<?php echo base_url();?>admin/alumno/boleta" method="post">
                <input type="hidden" value="<?php echo $alu->matricula; ?>" name="matricula">
                  <button type="submit" class="btn btn btn-sm btn-success" title="Boleta Actual">
                  <i class="fas fa-pencil-alt"></i> Volver a Boleta
                  </button>
                </form>
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
                    <td width="300">Nmbre del alumno(a):</td>
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
            

            <div class="row">
              <div class="col-sm-12">
                <table id="listamod" class="table table-sm table-bordered table-striped">
                  <tr>
                    <th colspan="2">ASIGNATURAS</th>
                    <th colspan="4">TRIMESTRES</th>
                    
                    
                  </tr>
                    <tr>
                      <th>#</th>
                      <th>Materia</th>
                      <th>T1</th>
                      <th>T2</th>
                      <th>T3</th>
                      <th>Prom</th>
                  
                    </tr>
                  
                    <?php if(!empty($boleta)):?>
											<?php $x=0; foreach ($boleta as $bo): $x++;?>
										
											<tr>
												<td scope="row"><?php echo $x; ?></td>
												<td><?php echo $bo->nommat; ?>
												<input class="form-control form-control-sm trim" type="hidden" name="trim" value="1">
												<input class="form-control form-control-sm base_url" type="hidden" name="base_url" value="<?php echo base_url();?>admin/docente/califica">
												<input class="form-control form-control-sm matricula" type="hidden" name="matricula" value="<?php echo $alu->matricula; ?>">
												<input class="form-control form-control-sm idh" type="hidden" name="idh" value="<?php echo $bo->idh; ?>">
											</td>
												<td>
													<?php //if($bo->tr1==0){echo "";}else{echo $bo->tr1;} ?>
													<input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if(($bo->tr1==0)||($bo->tr1==6)){echo "";}else{echo $bo->tr1;} ?>">
												</td>
												<td><?php echo $bo->tr2; ?></td>
												<td><?php echo $bo->tr3; ?></td>
												<td class="guarda"> 
														<button type="button" class="btn btn-sm btn-success btn-guarda-calmod"> <i class="far fa-save"></i></button>
												</td>
	
											</tr>
							
                    <?php endforeach; ?>
                    <?php endif; ?>
                   
                </table>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <h5>Nota: El espacio en blanco indica <b><i>"SIN INFORMACIÓN"</i></b> para evaluar</h5>        
              </div>
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

