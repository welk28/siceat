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
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Periodo: <?php echo $this->session->userdata("periodo")." ".$this->session->userdata("descper");?>
            </h3>
          </div>
          <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-12">
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
						<div class="row">
							<div class="col-md-1">
								Docente: 
							</div>
							<div class="col-md-3">
								<u><?php echo $domat->nomp; ?></u>
							</div>
							<div class="col-md-1">
								Grupo: 
							</div>
							<div class="col-md-3">
								<u><?php echo $domat->grado." ".$domat->grupo; ?></u>
							</div>
							<div class="col-md-1">
								Turno: 
							</div>
							<div class="col-md-3">
								<u><?php ; 
								if($domat->turno=='V')
								echo "Vespertino";
							else
								echo "Matutino";
								?></u>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-md-1">Materia:</div>
							<div class="col-md-5">
							<u><?php echo $domat->nommat; ?></u>
							</div>
						</div>
            <div class="col-md-12">
              <table id="lista" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="40">No</th>
                    <th width=''>Nombre</th>
                    
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                    <th width="25"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($alumnos)):?>
                    <?php $x=0; ?>
                    <?php foreach($alumnos as $alu):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $alu->app." ".$alu->apm." ".$alu->nom;?> </td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                      </tr>
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

