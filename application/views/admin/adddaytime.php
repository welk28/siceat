  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-7">
            <h1>Alta de nuevo Horario</h1>
          </div>
          <div class="col-sm-5">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Inicio</a></li>
              <li class="breadcrumb-item active">Panel Inicial</li>
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
						<h3 class="card-title"><i class="fas fa-tag"></i>Complete los siguientes campos</h3>
						
          </div>
          <div class="card-body">		
						<div class="row">
							<div class="col-sm-1">
								<div class="form-group">
									<label>Grado</label>
									<input class="form-control form-control-sm" type="hidden" name="idh" id="" value="<?php echo $horario->idh?>">
									<input class="form-control form-control-sm" type="hidden" name="idg" id="" value="<?php echo $horario->idg?>">
									<input class="form-control form-control-sm" type="text" name="grado" id="" value="<?php echo $horario->grado?>">
								</div>
							</div>
							<div class="col-sm-1">
								<div class="form-group" >
									<label>Grupo</label>
									
									<input class="form-control form-control-sm" type="text" name="grupo" id="" value="<?php echo $horario->grupo?>">
								</div>
							</div>
							<div class="col-sm-4">
								<div class="form-group" >
									<label>Materia</label>
									<input class="form-control form-control-sm" type="hidden" name="idmat" id="" value="<?php echo $horario->idmat?>">
									<input class="form-control form-control-sm" type="text" name="nommat" id="" value="<?php echo $horario->nommat?>">
								</div>
							</div>
							<div class="col-sm-5">
								<div class="form-group" >
									<label>Docente</label>
									<input class="form-control form-control-sm" type="hidden" name="rfcp" id="" value="<?php echo $horario->rfcp?>">
									<input class="form-control form-control-sm" type="text" name="nomp" id="" value="<?php echo $horario->nomp?>">
								</div>
							</div>
						</div>
						<hr>
						<?php 
						$ci = &get_instance();
						$ci->load->model("Horario_model");
						 
					
						?>
						<!-- inicio de despliegue de horario a seleccionar semana y reloj -->
						<div class="row bg-info">
							<div class="col-sm-1 text-center"></div>
							<div class="col-sm-2 text-center"></div>
							<div class="col-sm-9 text-center"><h5>Semana</h5></div>
						</div>
						<div class="row">
							<div class="col-sm-1 text-center"></div>
							<div class="col-sm-2 text-center"><h5>Hora</h5></div>
							<?php foreach ($semana as $dia):?>
								<div class="col-sm-1 text-center">
									<?php echo $dia->dia ?>
								</div>
							<?php endforeach;?>
						</div>
						<div class="row">
						<div class="col-sm-1 text-center"></div>
							<div class="col-sm-2 text-center">
								
								<?php foreach ($reloj as $hora):?>
									<?php echo $hora->hora ?> <br>
								<?php endforeach;?>
							</div>
                

							<?php foreach ($semana as $dia):?>
								<div class="col-sm-1 text-center">
									<?php foreach ($reloj as $hora):?>
										<?php 
											$datos= $horario->idh."||".$dia->idia."||".$hora->idr;
										
										?>
										<?php $carga= $ci->Horario_model->cargado($horario->idg,$horario->idh, $dia->idia, $hora->idr); ?>	
											
										<?php //echo $carga; $horario->idh."/".$dia->idia."/".$hora->idr; ?>
										<?php if($carga==0):?>
											<?php $uso= $ci->Horario_model->usoHrdia($horario->idh, $dia->idia, $hora->idr); ?>
											<?php if($uso>0):?>
												<input class="form-check-input" type="checkbox" data-toggle="modal" data-target="#cargahorario" onclick="ModalHorario('<?php echo $datos?>'); " checked>                         
											<?php else:?>
												<input class="form-check-input" type="checkbox" data-toggle="modal" data-target="#cargahorario" onclick="ModalHorario('<?php echo $datos?>'); ">
											<?php endif;?>	
										<?php endif;?>
											<br>
									<?php endforeach;?>
								</div>
							<?php endforeach;?>
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
	
			<div class="modal fade" id="cargahorario">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
          <form id="frmimparte" action="<?php echo base_url()?>admin/horario/saveHoradia" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Agregar a horario</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <h5>¿Desea hacer este cambio?</h5>
						<input type="hidden" id="dirgrupo" value="<?php echo base_url()?>admin/horario/saveHoradia">
								<input type="hidden" name="aidh" id="aidh" value="">
								<input type="hidden" name="aidia" id="aidia" value="">
								<input type="hidden" name="aidr" id="aidr" value="">
              
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
