  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Periodos</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Periodos</li>
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
             <button type="button" class="btn btn-sm btn-primary btn-print"> <span class="fa fa-print">Imprimir</span> </button>
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <table id="listax" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">No</th>
                    <th width=''>Periodo</th>
                    <th width="">Descripción</th>
                   
                    <th width="">Predeterminado</th>
                    <th align="center" width="">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($periodos)):?>
                    <?php $x=0; ?>
                    <?php foreach($periodos as $per):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $per->idp;?> </td>
                        <td><?php echo $per->descper;?> </td>
                        <td>
                        <?php 
                          if($per->predet==1)
                            echo"Activo";
                          else  
                            echo "";
                        ?> 
                        </td>
                        <td align="center">
                            <div class="btn-group">
                              <a href="#" class="btn btn-sm btn-primary" title="Ver">
                                <span class="far fa-id-card"></span>
                              </a>
                              <a href="#" class="btn btn-sm btn-success" title="modificar">
                                <span class="fas fa-th-list"></span>
                              </a> 
                              <a href="#" class="btn btn-sm btn-secondary" title="Deshabilitar">
                                <span class="fas fa-book"></span>
                              </a>
                            </div>
                          </td>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  <tr>
                    <th width="">No</th>
                    <th width=''>Periodo</th>
                    <th width="">Descripción</th>
                   
                    <th width="">Predeterminado</th>
                    <th align="center" width="">Opciones</th>
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

