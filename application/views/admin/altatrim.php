  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Trimestre a calificar</h1>
            
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
            <div class="row">
						
							<div class="col-sm-4">
							<form id="cambiotrim" action="<?php echo base_url();?>admin/altatrim/updateTrim" method="post">
								<div class="form-group">
									<label for="">Seleccione trimestre a calificar</label>
									<select class="form-control" name="trm" id="trim">
									
									<option value="<?php echo $act->val;?>" selected> <?php echo $act->dest." (Activo)";?>	</option>
										<?php if(!empty($trim)):?>	
											<?php foreach($trim as $tr):?>
												<option value="<?php echo $tr->trim;?>"><?php echo $tr->dest;?></option>
											<?php endforeach;?>
										<?php endif;?>
									</select>
								</div>
								
								<button type="submit" class="btn btn-secondary btn-flat btn-block">Cambiar</button>
							</form>
							</div>

							<div class="col-sm-4"></div>
							<div class="col-sm-4">
							<form id="cambiotrim2" action="<?php echo base_url();?>admin/altatrim/updateTrimcons" method="post">
								<div class="form-group">
									<label for="">Trimestre para estadística y reporte:</label>
									<select class="form-control" name="trm" id="trim">
										<option value="<?php echo $act2->val;?>" selected> <?php echo $act2->dest." (Activo)";?>	</option>
										<option value="1">1er Trimestre</option>
										<option value="2">2o  Trimestre</option>
										<option value="3">3er Trimestre</option>
									</select>
								</div>
								
								<button type="submit" class="btn btn-secondary btn-flat btn-block">Cambiar</button>
							</form>
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
