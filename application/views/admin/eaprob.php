  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
  	<!-- Content Header (Page header) -->
  	<section class="content-header">
  		<div class="container-fluid">
  			<div class="row mb-2">
  				<div class="col-sm-4">
  					<h1>Lista de calificaciones </h1>
  				</div>
  				<div class="col-sm-6"></div>
  				<div class="col-sm-2">
  					<button type="button" class="btn btn-primary btn-print btn-sm ">
  						<span class="fa fa-print"> </span> Imprimir</button>
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
  						Periodo: <?php echo $this->session->userdata("periodo") . " " . $this->session->userdata("descper") . " trim: " . $trim->val; ?>
  					</h3>
  					<?php
						$ci = &get_instance();
						$ci->load->model("Reportes_model");
						?>
  				</div>
  				<div class="card-body">
  					<!-- ENCABEZADO CON LOGOS -->
  					<div class="row">
  						<div class="col-sm-12">
  							<table class="table table-sm table-borderless">
  								<tr>
  									<td width="200" rowspan="3" class="align-middle">
  										<img src="<?php echo base_url(); ?>images/logoGEM.jpg" width="200">
  										<table class="table table-sm table-bordered table-striped bolgral">
  											<tr>
  												<th>E.S.T.</th>
  												<th>39</th>
  											</tr>
  											<tr>
  												<td>SECTOR</td>
  												<td>VII</td>
  											</tr>
  											<tr>
  												<td>ZONA</td>
  												<td>XX</td>
  											</tr>
  											<tr>
  												<td>TURNO</td>
  												<td><?php
															if ($this->session->userdata("turno") == 'V')
																echo "Ves";
															else
																echo "Mat";
															?></td>
  											</tr>
  											<tr>
  												<td>PERIODO</td>
  												<td>
													</td>
  											</tr>
  											<tr>
  												<td>RETENCION</td>
  												<td></td>
  											</tr>
  										</table>
  									</td>
  									<td align="center">
  										<h6>GOBIERNO DEL ESTADO DE MÉXICO</h6>
  										<h6>SERVICIOS EDUCATIVOS INTEGRADOS AL ESTADO DE MÉXICO</h6>
  									</td>
  									<td width="200" rowspan="3" class="align-middle">
										<img src="<?php echo base_url(); ?>images/tecnica.gif" alt="" width="100">
										<table class="table table-sm table-bordered table-striped bolgral">
  											<tr>
  												<th></th>
  												<th>1°</th>
  												<th>2°</th>
  												<th>3°</th>
  												<th>Total</th>
  											</tr>
  											<tr>
													<td>INSCRIPCION</td>
													<td><?php echo $primero; ?></td>
													<td><?php echo $segundo; ?></td>
													<td><?php echo $tercero; ?></td>
													<td><?php echo $primero+$segundo+$tercero; ?></td>
												</tr>
												<tr>
													<td>ALTAS</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>BAJAS</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>EXISTENCIA</td>
													<td><?php echo $primero; ?></td>
													<td><?php echo $segundo; ?></td>
													<td><?php echo $tercero; ?></td>
													<td><?php echo $primero+$segundo+$tercero; ?></td>
												</tr>
												<tr>
													<td>DESERCION</td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
  										</table>
										</td>
  								</tr>
  								<tr>
  									<td align="center">
  										<h6>DIRECCIÓN DE EDUCACIÓN SECUNDARIA Y SERVICIOS DE APOYO</h6>
  										<h6>DEPARTAMENTO DE EDUCACIÓN SECUNDARIA TÉCNICA VALLE DE MÉXICO</h6>
  									</td>
  								</tr>
  								<tr>
  									<td align="center">

  										<h6>ESTADISTICA DE APROBACION - REPROBACION E INDICE GENERAL DE APROVECHAMIENTO</h6>
  										<h6>Ciclo escolar <?php echo $this->session->userdata("descper"); ?> </h6>
  									</td>
  								</tr>
  							</table>
  						</div>
  					</div>


  					<div class="row">
  						
  					</div>
  					<div class="col-md-12">
  						<table id="x" class="table table-sm table-bordered table-striped bolgral">

  							<tr>
  								<th width='' class="align-middle" rowspan="2">Asignatura</th>
  								<th width="" class="align-middle" colspan="4">Datos de Aprobación</th>
  								<th width="" class="align-middle" colspan="4">Datos de Reprobación</th>
  								<th width="" class="align-middle" colspan="4">Alumnos sin Calificación</th>
  								<th width="" class="align-middle" colspan="4">Porcentaje Alumnos sin Calificación</th>
  								<th width="" class="align-middle" colspan="4">Porcentaje de Aprobación</th>
  								<th width="" class="align-middle" colspan="4">Promedio General de Aprovechamiento</th>
  							</tr>
  							<tr>
  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Total</th>

  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Total</th>

  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Total</th>

  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Prom</th>

  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Prom</th>

  								<th>1°</th>
  								<th>2°</th>
  								<th>3°</th>
  								<th>Prom</th>
  							</tr>
  							<?php if (!empty($materias)) : ?>
  								<?php foreach ($materias as $materia) : ?>
  									<tr>
  										<td> <?= $materia->nommat; ?> </td>
  										<td>
  											<?php
												if ($trim->val == 1) {
													$primeroA = $this->Reportes_model->AprobadosTr11($materia->idmat);
													echo $primeroA;
												} else {
													if ($trim->val == 2) {
														$primeroA = $this->Reportes_model->AprobadosTr21($materia->idmat);
														echo $primeroA;
													} else {
														if ($trim->val == 3) {
															$primeroA = $this->Reportes_model->AprobadosTr31($materia->idmat);
															echo $primeroA;
														}
													}
												}


												?>
  										</td>
  										<td>
  											<?php
												if ($trim->val == 1) {
													$segundoA = $this->Reportes_model->AprobadosTr12($materia->idmat);
													echo $segundoA;
												} else {
													if ($trim->val == 2) {
														$segundoA = $this->Reportes_model->AprobadosTr22($materia->idmat);
														echo $segundoA;
													} else {
														if ($trim->val == 3) {
															$segundoA = $this->Reportes_model->AprobadosTr32($materia->idmat);
															echo $segundoA;
														}
													}
												}


												?>
  										</td>
  										<td>
  											<?php
												if ($trim->val == 1) {
													$terceroA = $this->Reportes_model->AprobadosTr13($materia->idmat);
													echo $terceroA;
												} else {
													if ($trim->val == 2) {
														$terceroA = $this->Reportes_model->AprobadosTr23($materia->idmat);
														echo $terceroA;
													} else {
														if ($trim->val == 3) {
															$terceroA = $this->Reportes_model->AprobadosTr33($materia->idmat);
															echo $terceroA;
														}
													}
												}


												?>
  										</td>
  										<td> <?php echo $primeroA + $segundoA + $terceroA; ?> </td>

  										<td>
  											<?php
												if($trim->val==1){
													$primeroR= $this->Reportes_model->ReprobadoTr11($materia->idmat); echo $primeroR;
												}else{
													if($trim->val==2){
														$primeroR= $this->Reportes_model->ReprobadoTr21($materia->idmat); echo $primeroR;
													}else{
														if($trim->val==3){
															$primeroR= $this->Reportes_model->ReprobadoTr31($materia->idmat); echo $primeroR;
														}
													}
												}	
												//$repro1 = $primero - $primeroA;
												//echo $repro1;
												echo $primeroR;
												?>
  										</td>
  										<td>
  											<?php
												if($trim->val==1){
													$segundoR= $this->Reportes_model->ReprobadoTr12($materia->idmat); echo $segundoR;
												}else{
													if($trim->val==2){
														$segundoR= $this->Reportes_model->ReprobadoTr22($materia->idmat); echo $segundoR;
													}else{
														if($trim->val==3){
															$segundoR= $this->Reportes_model->ReprobadoTr32($materia->idmat); echo $segundoR;
														}
													}
												}

												//$repro2 = $segundo - $segundoA;
												echo $segundoR;
												?>
  										</td>
  										<td>
  											<?php
												if($trim->val==1){
													$terceroR= $this->Reportes_model->ReprobadoTr13($materia->idmat); echo $terceroR;
												}else{
													if($trim->val==2){
														$terceroR= $this->Reportes_model->ReprobadoTr23($materia->idmat); echo $terceroR;
													}else{
														if($trim->val==3){
															$terceroR= $this->Reportes_model->ReprobadoTr33($materia->idmat); echo $terceroR;
														}
													}
												}

												//$repro3 = $tercero - $terceroA;
												echo $terceroR;
												?>
  										</td>
  										<td> <?php //$repros = $repro1 + $repro2 + $repro3;
														//echo $repros; 
														echo $primeroR+$segundoR+$terceroR;
														?> </td>

  										<td>
  											<?php
												if($trim->val==1){
													$primeroS= $this->Reportes_model->SinCalifTr11($materia->idmat); echo $primeroS;
												}else{
													if($trim->val==2){
														$primeroS= $this->Reportes_model->SinCalifTr21($materia->idmat); echo $primeroS;
													}else{
														if($trim->val==3){
															$primeroS= $this->Reportes_model->SinCalifTr31($materia->idmat); echo $primeroS;
														}
													}
												}
												echo $primeroS;


												?>
  										</td>
  										<td>
  											<?php
												if($trim->val==1){
													$segundoS= $this->Reportes_model->SinCalifTr12($materia->idmat); echo $segundoS;
												}else{
													if($trim->val==2){
														$segundoS= $this->Reportes_model->SinCalifTr22($materia->idmat); echo $segundoS;
													}else{
														if($trim->val==3){
															$segundoS= $this->Reportes_model->SinCalifTr32($materia->idmat); echo $segundoS;
														}
													}
												}
												echo $segundoS;

												?>
  										</td>
  										<td>
  											<?php
												 if($trim->val==1){
												 	$terceroS= $this->Reportes_model->SinCalifTr13($materia->idmat); echo $terceroS;
												}else{
													if($trim->val==2){
														$terceroS= $this->Reportes_model->SinCalifTr23($materia->idmat); echo $terceroS;
													}else{
														if($trim->val==3){
															$terceroS= $this->Reportes_model->SinCalifTr33($materia->idmat); echo $terceroS;
														}
													}
												}

												echo $terceroS;

												?>
  										</td>
  										<td>
  											<?php //echo $repros; 
											  $sincal=$primeroS+$segundoS+$terceroS; echo $sincal;
												?>
  										</td>

  										<td> <?php 
										  //$prom5 = ($repro1 * 10) / $primero;
														//printf("%0.1f", $prom5); 
														 $prom5=($primeroS*100)/$primero; printf("%0.1f",$prom5);
														?> </td>
  										<td> <?php 
										  //$prom6 = ($repro2 * 10) / $segundo;
														//printf("%0.1f", $prom6); 
														 $prom6=($segundoS*100)/$segundo; printf("%0.1f",$prom6);
														?> </td>
  										<td> <?php 
										  //$prom7 = ($repro3 * 10) / $tercero;
														//printf("%0.1f", $prom7);
														  $prom7=($terceroS*100)/$tercero; printf("%0.1f",$prom7);
														?> </td>
  										<td> <?php 
										  //$prom8 = ($prom5 + $prom6 + $prom7) / 3;
														//printf("%0.1f", $prom8); 
														 $prom8=($prom5+$prom6+$prom7)/3; printf("%0.1f",$prom8);
														?></td>

  										<td> <?php $prom1 = ($primeroA * 10) / $primero;
														printf("%0.1f", $prom1); ?> </td>
  										<td> <?php $prom2 = ($segundoA * 10) / $segundo;
														printf("%0.1f", $prom2); ?> </td>
  										<td> <?php $prom3 = ($terceroA * 10) / $tercero;
														printf("%0.1f", $prom3); ?> </td>
  										<td> <?php $prom4 = ($prom1 + $prom2 + $prom3) / 3;
														printf("%0.1f", $prom4); ?></td>

  										<td>
  											<?php
												if ($trim->val == 1) {
													$gral1 = $this->Reportes_model->ProMatTrim1($materia->idmat);
													printf("%0.1f", $gral1->prom);
												} else {
													if ($trim->val == 2) {
														$gral1 = $this->Reportes_model->ProMatTrim2($materia->idmat);
														printf("%0.1f", $gral1->prom);
													} else {
														if ($trim->val == 3) {
															$gral1 = $this->Reportes_model->ProMatTrim3($materia->idmat);
															printf("%0.1f", $gral1->prom);
														}
													}
												}
												?>
  										</td>
  										<td>
  											<?php
												if ($trim->val == 1) {
													$gral2 = $this->Reportes_model->ProMatTrim4($materia->idmat);
													printf("%0.1f", $gral2->prom);
												} else {
													if ($trim->val == 2) {
														$gral2 = $this->Reportes_model->ProMatTrim5($materia->idmat);
														printf("%0.1f", $gral2->prom);
													} else {
														if ($trim->val == 3) {
															$gral2 = $this->Reportes_model->ProMatTrim6($materia->idmat);
															printf("%0.1f", $gral2->prom);
														}
													}
												}
												?>
  										</td>
  										<td>
  											<?php
												if ($trim->val == 1) {
													$gral3 = $this->Reportes_model->ProMatTrim7($materia->idmat);
													printf("%0.1f", $gral3->prom);
												} else {
													if ($trim->val == 2) {
														$gral3 = $this->Reportes_model->ProMatTrim8($materia->idmat);
														printf("%0.1f", $gral3->prom);
													} else {
														if ($trim->val == 3) {
															$gral3 = $this->Reportes_model->ProMatTrim9($materia->idmat);
															printf("%0.1f", $gral3->prom);
														}
													}
												}
												?>

  										</td>
  										<td>
  											<?php $promgral = ($gral1->prom + $gral2->prom + $gral3->prom) / 3;
												printf("%0.1f", $promgral); ?>
  										</td>
  									</tr>
  								<?php endforeach; ?>
  							<?php endif; ?>

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
