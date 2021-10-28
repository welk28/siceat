  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Talleres</h1>
            
          </div>
          <div class="col-md-3">
            <button type="submit" class="btn btn-sm btn-primary" title="Agregar nuevo registro" data-toggle="modal" data-target="#modal-default">
              <i class="far fa-plus-square"></i> Agregar
						</button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Talleres</li>
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
              <table id="example1" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">No</th>
                    <th width=''>Id</th>
                    <th width="">Descripción</th>
                    <th align="center" width="">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($taller)):?>
                    <?php $x=0; ?>
                    <?php foreach($taller as $ta):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $ta->idt;?> </td>
                        <td><?php echo $ta->nomt;?> </td>
                        <?php 
                          $datos=$ta->idt."||".
                          $ta->nomt;
                        ?>
                        <td align="center">
                            <div class="btn-group">
                              
                              <button class="btn btn-sm btn-success btn-mostrar" title="modificar" data-toggle="modal" data-target="#modal-modif" onclick="agregaform('<?php echo $datos ?>')">
                                <i class="fas fa-pencil-alt"></i>
                              </button> 
                              <!--
                              <a href="#" class="btn btn-sm btn-secondary" title="Deshabilitar">
                                <span class="fas fa-book"></span>
                              </a>-->
                            </div>
                          </td>
                      </tr>
                    <?php endforeach;?>
                  <?php endif;?>  
                </tbody>
                  <tfoot>
                  <tr>
                    <th width="">No</th>
                    <th width=''>Id</th>
                    <th width="">Descripción</th>
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

<!--INICIO DE MODAL DE ALTA DE TALLER -->
			<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmtaller" action="<?php echo base_url();?>admin/taller/addtaller" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Nuevo Taller</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                  <input type="text" class="form-control" name="idt" placeholder="Identificador" required onkeyup="this.value=this.value.toUpperCase()">
                  <small id="idt" class="form-text text-muted">Identificador de taller</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nomt" placeholder="Descripción" required onkeyup="this.value=this.value.toUpperCase()">
                  <small id="nomt" class="form-text text-muted">Nombre del taller</small>
                </div>
              
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

      <!--INICIO DE MODAL DE MODIFICACION DE TALLER -->
<div class="modal fade" id="modal-modif">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmtallermod" action="<?php echo base_url();?>admin/taller/Modtaller" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Modificar Taller</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
                <div class="form-group">
                  <input type="hidden" class="form-control" name="idt" id="idta">
                  <input type="text" class="form-control" name="idt2" id="idta2" placeholder="Identificador" required onkeyup="this.value=this.value.toUpperCase()">
                  <small id="idt" class="form-text text-muted">Identificador de taller</small>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="nomt" id="nomta" placeholder="Descripción" required onkeyup="this.value=this.value.toUpperCase()">
                  <small id="nomt" class="form-text text-muted">Nombre del taller</small>
                </div>
              
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
