  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Alumno</h1>
          </div>
         <div class="col-sm-1">
							<button type="button" class="btn btn-primary btn-print btn-sm ">
										<span class="fa fa-print"> </span> Imprimir</button>
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
              <div class="col-sm-5"></div>
              <div class="col-sm-1">
							<button type="button" class="btn btn-primary btn-print btn-sm ">
										<span class="fa fa-print"> </span> Imprimir</button>
							</div>
            </div>
            
          </div>
          <div class="card-body">
          <!--INICIO DE CARGA DE BOLETA POR ALUMNO -->
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
            

            <div class="row">
              <div class="col-sm-12">
                <table class="table table-sm table-bordered table-striped">
                  <tr>
                    <th colspan="2">ASIGNATURAS</th>
                    <th colspan="4">TRIMESTRES</th>
                    <th colspan="4">INASISTENCIAS</th>
                    
                  </tr>
                    <tr>
                      <th>#</th>
                      <th>Materia</th>
                      <th>T1</th>
                      <th>T2</th>
                      <th>T3</th>
                      <th>Prom</th>
                      <th>1</th>
                      <th>2</th>
                      <th>3</th>
                      <th>Total</th>
                    </tr>
                  
                    <?php if(!empty($boleta)):?>
                      <?php $x=0; foreach ($boleta as $bo): $x++;?>
                    <tr>
                      <td scope="row"><?php echo $x; ?></td>
                      <td><?php echo $bo->nommat; ?></td>
                      <td><?php echo $bo->tr1; ?></td>
                      <td><?php echo $bo->tr2; ?></td>
                      <td><?php echo $bo->tr3; ?></td>
                      <td><?php echo $bo->prom; ?></td>
                      <td></td>
                      <td></td>
                      <td></td>
                      <td></td>
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
            
            <!--SALTO DE PAGINA -->
            <div style="page-break-after: always"></div>
            <!--FIN DE CARGA DE BOLETA POR ALUMNO -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

