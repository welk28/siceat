  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Docentes en turno 
						<?php 
                if($this->session->userdata("turno")=='V')
                  echo "Vespertino";
                else
                  echo "Matutino";
              ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Docentes/Materias</li>
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
            <div class="col-md-12">
              <table id="listax" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">No</th>
                    <th width=''>rfc</th>
                    <th width="">Nombre</th>
                    <th align="center" width=""></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($docentes)):?>
                    <?php $x=0; ?>
                    <?php foreach($docentes as $doc):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $doc->rfcp;?> </td>
                        <td><?php echo $doc->nomp;?> </td>                        
                        <?php 
                          $ci = &get_instance();
                          $ci->load->model("Docente_model");
                           
                          $datos= $ci->Docente_model->getRoles($doc->rfcp);
                        ?>
                        
                        <td align="center">
                            <div class="btn-group">
														<form action="<?php echo base_url();?>admin/docente/matedoc" method="post">
															<input type="hidden" value="<?php echo $doc->rfcp?>" name="rfcp">
															<button type="submit" class="btn btn-sm btn-primary" title="Ver horario">
															<span class="far fa-id-card"></span>
															</button>
														</form>
                             
                            </div>
                          </td>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  <tr>
                    <th width="">No</th>
                    <th width=''>rfc</th>
                    <th width="">Nombre</th>
                    
                    
                    <th align="center" width=""></th>
                  </tr>
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

