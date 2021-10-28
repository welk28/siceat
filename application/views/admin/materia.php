  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Materias</h1>
          </div>
          <div class="col-sm-3">
          <button type="submit" class="btn btn-sm btn-primary" title="Agregar nuevo registro" data-toggle="modal" data-target="#modal-default">
              <i class="far fa-plus-square"></i> Agregar
						</button>
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
            <div class="col-md-12">
              <table id="listax" class="table table-sm table-bordered table-striped">
                <thead>
                  <tr>
                    <th width="">No</th>
                    <th width=''>ID</th>
                    <th width="">Materia</th>
                    <th width="50px">Grado</th>
                    <th width=""></th>
                    <th align="center" width="50px"></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($materias)):?>
                    <?php $x=0; ?>
                    <?php foreach($materias as $mat):?>
                      <?php $x++; ?>
                      <tr>
                        <td align="center"><?php echo $x?></td>
                        <td><?php echo $mat->idmat;?> </td>
                        <td><?php echo $mat->nommat;?> </td>
                        <td><?php echo $mat->grado;?> </td>
                        <td align="center">
                        <?php 
                          if($mat->status==1)
                            echo "Activo";
                          else
                            echo "Inactivo";
                        ?></td>

                        <?php 
                        $datos=$mat->idmat."||".
                        $mat->nommat."||".
                        $mat->grado."||".
                        $mat->status;
                        ?>
                        <td align="center">
                            <div class="btn-group">
                            <button class="btn btn-sm btn-success btn-mostrar" title="modificar" data-toggle="modal" data-target="#modal-modif" onclick="agregaformat('<?php echo $datos ?>')">
                              <i class="fas fa-pencil-alt"></i>
                              </button>

                             <!--
                              <a href="#" class="btn btn-sm btn-success" title="modificar">
                                <span class="fas fa-th-list"></span>
                              </a> 
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
                    <th width=''>Clave</th>
                    <th width="">Descripcion</th>
                    <th width="">Cred</th>
                    <th width="">Creditos</th>
                    <th width="">Opción</th>
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
<!--INICIO DE MODAL DE ALTA DE MATERIA -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmmat" action="<?php echo base_url();?>admin/materia/addmat" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Nueva Materia</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="idmat" placeholder="Identificador" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="idmat" class="form-text text-muted">Identificador de la materia</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nommat" placeholder="Nombre de la materia" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="nommat" class="form-text text-muted">Nombre de la materia</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <!-- radio -->
                  
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
                <div class="col-sm-6">
                    <!-- radio -->
                    
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="status" id="ra1" value="1" required>
                        <label for="ra1"> Activo
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="status" id="ra2" value="0" required>
                        <label for="ra2">Inactivo
                        </label>
                      </div> 
                    </div>
                </div>
                
                <div class="col-md-6"></div>
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



      <!--INICIO DE MODAL DE modificacion DE MATERIA -->
<div class="modal fade" id="modal-modif">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmmatmod" action="<?php echo base_url();?>admin/materia/modMateria" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Modificación Materia</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="idmat"  id="mmat1">
                    <input type="text" class="form-control" name="idmat2" id="mmat2" placeholder="Identificador" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="idmate" class="form-text text-muted">Identificador de la materia</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="nommat" id="mnommat" placeholder="Nombre de la materia" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="nommat" class="form-text text-muted">Nombre de la materia</small>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <!-- radio -->
                  
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="mgr1" value="1" required>
                        <label for="mgr1"> Primero
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="mgr2" value="2" required>
                        <label for="mgr2">Segundo
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="grado" id="mgr3" value="3" required>
                        <label for="mgr3">Tercero
                        </label>
                      </div> 
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- radio -->
                    
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="status" id="mra1" value="1" required>
                        <label for="mra1"> Activo
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="status" id="mra2" value="0" required>
                        <label for="mra2">Inactivo
                        </label>
                      </div> 
                    </div>
                </div>
                
                <div class="col-md-6"></div>
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
