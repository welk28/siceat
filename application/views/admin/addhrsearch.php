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
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Complete los siguientes campos
            </h3>
          </div>
          <div class="card-body">
					
            <div class="col-12">
              
              
            </div>
						<form id="hrsearch" action="<?php echo base_url()?>admin/horario/addHorario" method="post">
							<input type="hidden" id="dirgrupo" value="<?php echo base_url()?>admin/horario/getGrupo">
							<input type="hidden" id="dirmat" value="<?php echo base_url()?>admin/horario/getMateriash">
							<input type="hidden" id="dirdoc" value="<?php echo base_url()?>admin/horario/getDocentes">
							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-2">
									<div class="form-group">
										<label>Grado</label>
										<select name="grado" id="grado" class="form-control" onchange="CargarGrupo(this.value);" required>
											<option value="">Seleccione</option>
											<option value="1">1°</option>
											<option value="2">2°</option>
											<option value="3">3°</option>
										</select>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group" id="grupoc" style="display:none;">
										<label>Grupo</label>
										<select name="idg" id="idg" class="form-control" onchange="CargarMaterias(this.value);"  required>
											
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group" id="matec" style="display:none;" onchange="verDocente(this.value);">
										<label>Materia</label>
										<select id="idmat" name="idmat" class="form-control select2bs4" style="width: 100%;"  required>
														
										</select>
									</div>
								</div>
								
							</div>
							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-5">
									<div class="form-group" id="doch" style="display:none;">
										<label>Docente</label>
										<select name="rfcp" id="rfcp" class="form-control select2bs4" style="width: 100%;" onchange="verBoton(this.value);" required>
																						
										</select>
									</div>
								</div>
							</div>
							<br>
							<hr>
							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-10" id="botonh" style="display:none;">
									<button type="submit" class="btn btn-primary btn-block">Continuar a Horario</button>	
								</div>
							</div>
							
						</form>
          </div>
          <!-- /.card-body -->
					
        </div>
				
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
