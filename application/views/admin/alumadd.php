  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Alta de alumno</h1>
          </div>
          <div class="col-sm-3">
          <a href="#" class="btn btn-sm btn-primary" title="Nuevo alumno">
          <i class="far fa-plus-square"></i> Agregar
          </a> 
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Alumnos Inscritos</li>
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
          <form id="frmalumno" action="<?php echo base_url();?>admin/alumno/addAlumno" method="post">
					<!--INICIO DE CARD DATOS ALUMNO -->
					<div class="row">
          <div class="col-12">
            <div class="card card-gray "><!-- collapsed-card -->
              <div class="card-header">
                <h3 class="card-title">Datos del alumno</h3>
                 <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

            
							<div class="row">
								<div class="col-sm-2">
									<div class="form-group">
                   
                    <input type="hidden" class="form-control" name="base_url" id="base_url" aria-describedby="helpId" placeholder="Matrícula" value="<?php echo base_url();?>admin/alumno/horalumno">
										<input type="text" class="form-control" name="matricula" id="matricula" aria-describedby="helpId" placeholder="Matrícula" onkeyup="this.value=this.value.toUpperCase()" required>
										<label for="">Matrícula</label>
									</div>
								</div>
							</div>
							<div class="row">
							<div class="col-sm-1"></div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="app" id="app" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()"required>
										<label for="">Apellido Paterno</label>

									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="apm" id="apm" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()" required>
										<label for="">Apellido Materno</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="nom" id="nom"  aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()" required>
										<label for="">Nombre(s)	</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="curp" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Curp	</label>
									</div>
								</div>
                
								
							</div>
							
							<div class="row">
							<div class="col-sm-2"></div>

							<div class="col-sm-3">								
                    <div class="form-group clearfix">
											<label for="">Sexo: </label>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="sexo" id="ra1" value="M" required>
                        <label for="ra1"> Masculino
                        </label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="sexo" id="ra2" value="F" >
                        <label for="ra2">Femenino
                        </label>
                      </div> 
                    </div>
								</div>	
								<div class="col-sm-2">
									<div class="form-group">										
										<input type="date" class="form-control form-control-sm" name="fecnac" required>		
										<label for="">Fecha Nacimiento</label>
									</div>
								</div>
								
							</div>
							</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
				
				<!--INICIO DE CARD Contacto -->
				<div class="row">
          <div class="col-12">
            <div class="card card-gray collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Contacto</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							
							<div class="row">
							<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="telal" aria-describedby="helpId" placeholder="">
										<label for="">Teléfono	</label>
									</div>
								</div>
								<div class="col-sm-2">
                <div class="form-group">                  
                  <input type="email" class="form-control" name="email" id="" aria-describedby="emailHelpId" onkeyup="this.value=this.value.toUpperCase()" placeholder="">
                  <label for="">Correo</label>
                </div>
								</div>
                
								<div class="col-sm-3">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="calle" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Calle	</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="colonia" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Colonia	</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="ciudad" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Ciudad	</label>
									</div>
								</div>
							</div>
							</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
						<!--INICIO DE CARD Contacto -->
				<div class="row">
          <div class="col-12">
            <div class="card card-gray collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Tutor</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							
							<div class="row">
              <div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="nomtut" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Nombre de tutor	</label>
									</div>
								</div>
							<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="teltut" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Teléfono	</label>
									</div>
								</div>
								<div class="col-sm-2">
									<div class="form-group">
										<input type="text" class="form-control form-control-sm" name="dirtut" aria-describedby="helpId" placeholder="" onkeyup="this.value=this.value.toUpperCase()">
										<label for="">Dirección	</label>
									</div>
								</div>
							
								
							</div>
							</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
							
						<!--INICIO DE CARD Contacto -->
				<div class="row">
          <div class="col-12">
            <div class="card card-gray collapsed-card">
              <div class="card-header">
                <h3 class="card-title">Escolar</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							
							<div class="row">
								<div class="col-sm-1"></div>
								<div class="col-sm-2">
								<label for="">Turno</label>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="turno" id="ta1" value="M" required>
                        <label for="ta1"> Matutino
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="turno" id="ta2" value="V" required>
                        <label for="ta2">Vespertino
                        </label>
                      </div> 
                    </div>	
								</div>
								<div class="col-md-2">
									<!-- radio -->
									<label for="">Grado</label>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="gr1" value="1" required>
                        <label for="gr1"> Primero
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="gr2" value="2" required>
                        <label for="gr2">Segundo
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="gr3" value="3" required>
                        <label for="gr3">Tercero
                        </label>
                      </div> 
                    </div>
                </div>
                <div class="col-sm-1">
									<div class="form-group">
										<label for="">Grupo</label>
										<select class="form-control" name="grupo" id="grupo" required>
                      <?php if(!empty($a->grupo)):?>
                        <option value="<?php echo $a->grupo?>"><?php echo $a->grupo?></option>
                      <?php endif;?>
                      <option value="">Seleccione</option>
                      <?php foreach ($grupo as $g ): ?>
                        <option value="<?php echo $g->grupo?>"><?php echo $g->grupo?></option>
                      <?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label for="">Taller</label>
										<select class="form-control" name="idt" id="idt">
                      <option value="">Seleccione</option>
                      <?php foreach ($taller as $ta ): ?>
                        <option value="<?php echo $ta->idt?>"><?php echo $ta->nomt?></option>
                      <?php endforeach; ?>
										</select>
									</div>
									
								</div>
								
							</div>
							</div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
							<hr>
							<button type="submit" class="btn btn-lg btn-block btn-secondary">Guardar Datos</button>
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

