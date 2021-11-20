  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Materias</li>
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
							<div class="col-sm-6">
								<h3 class="card-title">
              	<i class="fas fa-tag"></i>Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");?></h3>
							</div>
							<div class="col-sm-5">
							<h5>Trimestre activo: <?php echo $act->dest;?></h5>
							</div>
							<div class="col-sm-1">
							<button type="button" class="btn btn-primary btn-print btn-sm ">
										<span class="fa fa-print"> </span> Imprimir</button>
							</div>
						</div>            						
          </div>
          <div class="card-body">
            <div class="row mb-3">
                <div class="col-sm-12">
                    <table class="table table-sm table-borderless">
                      <tr>
                        <td rowspan="4" align="center"> <img src="<?php echo base_url();?>images/sep-logo.png" alt="" width="100"> </td>
                        <td align="center">SECRETARIA DE EDUCACION PUBLICA</td>
                        <td rowspan="4" align="center"> <img src="<?php echo base_url();?>images/tecnica.gif" alt="" width="100"> </td>
                      </tr>
                      <tr>
                        <td align="center">DIRECCION GENERAL DE EDUCACION SECUNDARIA TECNICA</td>
                      </tr>
                      <tr>
                        <td align="center">ESCUELA SECUNDARIA TECNICA No 39</td>
                      </tr>
                      <tr>
                        <td align="center">"Jesús Reyes Heroles"</td>
                      </tr>
                    </table>
                </div>
            </div>
						<div class="row">
							<div class="col sm-12 pb-5">
								<table class="table table-sm table-borderless">
								
									<tbody>
										<tr>
											<td scope="row">Docente:</td>
											<td><u><?php echo $domat->nomp; ?></u></td>
											<td><Grupo:/td>
											<td>	<u><?php echo $domat->grado.$domat->grupo; ?></u></td>
											<td>Turno: </td>
											<td><u><?php ; 
													if($domat->turno=='V')
													echo "Vespertino";
												else
													echo "Matutino";
													?></u></td>
										</tr>
										<tr>
											<td scope="row">Materia:	 </td>
											<td><u><?php echo $domat->idh."/".$domat->nommat; ?></u></td>
											<td></td>
											<td></td>
											<td></td>
											<td></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="row">
						<div class="col-sm-12">
							
						</div>
						</div>
            <div class="col-sm-12">
              <table id="lista" class="table table-sm table-bordered table-striped">  <?= $act->val ?>
                <thead>
								<tr>
                    <th width="40">No</th>
										<?php if($taller==1){
											echo"<th width='30'>grupo</th>";
										} ?>
                    <th width=''>Nombre</th>
                    
                    <th width="80">tr1</th>
                    <th width="80">Falta</th>
                    <th width="80">tr2</th>
										<th width="80">Falta</th>
                    <th width="80">tr3</th>
										<th width="80">Falta</th>
                    <th width="80">Prom</th>                    
                    <th width="80" class="guarda"></th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($alumnos)):?>
                    <?php $x=0; ?>
                    <?php foreach($alumnos as $alu):?>
                      <?php $x++; ?>
                      <form class="califica" action="<?php echo base_url();?>admin/docente/calificaa" method="post">
												<tr>
													<td align="center"><?php echo $x?></td>
													<?php if($taller==1){
														echo"<td width=''>$alu->grado$alu->grupo</td>";
													} ?>
													<td>	
														<?php echo $alu->app." ".$alu->apm." ".$alu->nom;?>
														<input class="form-control form-control-sm trim" type="hidden" name="trim" value="<?php echo $act->val; ?>">
														<input class="form-control form-control-sm base_url" type="hidden" name="base_url" value="<?php echo base_url();?>admin/docente/califica">
														<input class="form-control form-control-sm matricula" type="hidden" name="matricula" value="<?php echo $alu->matricula; ?>">
														<input class="form-control form-control-sm idh" type="hidden" name="idh" value="<?php echo $domat->idh; ?>">
													</td>
													<!--trimestre 1 -->
													<?php if($act->val==1):?>
														
														<td align="center"><input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if($alu->tr1==0){echo "";}else{echo $alu->tr1;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa1 solo-numero" type="text" size="3" maxlength="2" name="fa1" style="width: 50px; text-align: center;" value="<?php echo $alu->fa1; ?>" ></td>
														<td align="center"><input class="form-control form-control-sm tr2 solo-numero" type="text" size="3" maxlength="2" name="tr2" style="width: 50px; text-align: right;" value="<?php if($alu->tr2==0){echo "";}else{echo $alu->tr2;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa2 solo-numero" type="text" size="3" maxlength="2" name="fa2" style="width: 50px; text-align: center;" value="<?php echo $alu->fa2; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr3 solo-numero" type="text" size="3" name="tr3" style="width: 50px; text-align: right;" value="<?php if($alu->tr3==0){echo "";}else{echo $alu->tr3;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa3 solo-numero" type="text" size="3" maxlength="2" name="fa3" style="width: 50px; text-align: center;" value="<?php echo $alu->fa3; ?>" readonly></td>
													<?php endif;?>
													<!--trimestre 2 -->
													<?php if($act->val==2):?>
														
														<td align="center"><input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if(($alu->tr1==0)||($alu->tr1==6)){echo "";}else{echo $alu->tr1;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa1 solo-numero" type="text" size="3" maxlength="2" name="fa1" style="width: 50px; text-align: center;" value="<?php echo $alu->fa1; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr2 solo-numero" type="text" size="3" maxlength="2" name="tr2" style="width: 50px; text-align: right;" value="<?php if(($alu->tr2==0)||($alu->tr2==6)){echo "";}else{echo $alu->tr2;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa2 solo-numero" type="text" size="3" maxlength="2" name="fa2" style="width: 50px; text-align: center;" value="<?php echo $alu->fa2; ?>"></td>
														<td align="center"><input class="form-control form-control-sm tr3 solo-numero" type="text" size="3" name="tr3" style="width: 50px; text-align: right;" value="<?php if(($alu->tr3==0)||($alu->tr3==6)){echo "";}else{echo $alu->tr3;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa3 solo-numero" type="text" size="3" maxlength="2" name="fa3" style="width: 50px; text-align: center;" value="<?php echo $alu->fa3; ?>" readonly></td>
													<?php endif;?>
													<!--trimestre 3 -->
													<?php if($act->val==3):?>
														<td align="center"><input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if($alu->tr1==0){echo "";}else{echo $alu->tr1;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa1 solo-numero" type="text" size="3" maxlength="2" name="fa1" style="width: 50px; text-align: center;" value="<?php echo $alu->fa1; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr2 solo-numero" type="text" size="3" name="tr2" style="width: 50px; text-align: right;" value="<?php if($alu->tr2==0){echo "";}else{echo $alu->tr2;} ?>" readonly></td>														
														<td align="center"><input class="form-control form-control-sm fa2 solo-numero" type="text" size="3" maxlength="2" name="fa2" style="width: 50px; text-align: center;" value="<?php echo $alu->fa2; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr3 solo-numero" type="text" size="3" name="tr3" style="width: 50px; text-align: right;" value="<?php if($alu->tr3==0){echo "";}else{echo $alu->tr3;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa3 solo-numero" type="text" size="3" maxlength="2" name="fa3" style="width: 50px; text-align: center;" value="<?php echo $alu->fa3; ?>" ></td>
													<?php endif;?>
													<!--trimestre 4 ABIERTO -->
													<?php if($act->val==4):?>
														<td align="center"><input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if($alu->tr1==0){echo "";}else{echo $alu->tr1;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa1 solo-numero" type="text" size="3" maxlength="2" name="fa1" style="width: 50px; text-align: center;" value="<?php echo $alu->fa1; ?>" ></td>
														<td align="center"><input class="form-control form-control-sm tr2 solo-numero" type="text" size="3" maxlength="2" name="tr2" style="width: 50px; text-align: right;" value="<?php if($alu->tr2==0){echo "";}else{echo $alu->tr2;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa2 solo-numero" type="text" size="3" maxlength="2" name="fa2" style="width: 50px; text-align: center;" value="<?php echo $alu->fa2; ?>" ></td>
														<td align="center"><input class="form-control form-control-sm tr3 solo-numero" type="text" size="3" maxlength="2" name="tr3" style="width: 50px; text-align: right;" value="<?php if($alu->tr3==0){echo "";}else{echo $alu->tr3;} ?>" ></td>
														<td align="center"><input class="form-control form-control-sm fa3 solo-numero" type="text" size="3" maxlength="2" name="fa3" style="width: 50px; text-align: center;" value="<?php echo $alu->fa3; ?>" ></td>
													<?php endif;?>

													<!--trimestre 4 CERRADO -->
													<?php if($act->val==5):?>
														<td align="center"><input class="form-control form-control-sm tr1 solo-numero" type="text" size="3" maxlength="2" name="tr1" style="width: 50px; text-align: right;" value="<?php if($alu->tr1==0){echo "";}else{echo $alu->tr1;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa1 solo-numero" type="text" size="3" maxlength="2" name="fa1" style="width: 50px; text-align: center;" value="<?php echo $alu->fa1; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr2 solo-numero" type="text" size="3" maxlength="2" name="tr2" style="width: 50px; text-align: right;" value="<?php if($alu->tr2==0){echo "";}else{echo $alu->tr2;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa2 solo-numero" type="text" size="3" maxlength="2" name="fa2" style="width: 50px; text-align: center;" value="<?php echo $alu->fa2; ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm tr3 solo-numero" type="text" size="3" maxlength="2" name="tr3" style="width: 50px; text-align: right;" value="<?php if($alu->tr3==0){echo "";}else{echo $alu->tr3;} ?>" readonly></td>
														<td align="center"><input class="form-control form-control-sm fa3 solo-numero" type="text" size="3" maxlength="2" name="fa3" style="width: 50px; text-align: center;" value="<?php echo $alu->fa3; ?>" readonly></td>
													<?php endif;?>

													
													<td align="center">
														<input class="form-control form-control-sm prom" type="text" size="3" name="prom" style="width: 50px; text-align: right;" value="<?php printf("%2.1f", $alu->prom); ?>" readonly>
													</td>	
																									
													<td class="guarda"> 
														<?php if($act->val!=5):?>
															<button type="button" class="btn btn-sm btn-success btn-guarda-cal"> <i class="far fa-save"></i></button>
														<?php endif; ?>
													</td>
													
												</tr>
                      </form>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  
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

