  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-3">
            <h1>Docentes</h1>
          </div>
          <div class="col-sm-3">
          <button type="submit" class="btn btn-sm btn-primary" title="Agregar nuevo registro" data-toggle="modal" data-target="#modal-default">
              <i class="far fa-plus-square"></i> Agregar
						</button>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url();?>">Home</a></li>
              <li class="breadcrumb-item active">Docentes</li>
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
                    <th width="">Turno</th>
                    <th width="">Tipo / status</th>
                    
                    <th align="center" width="">Opciones</th>
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
                        <td><?php  
                        if($doc->turno=='V')
                          echo "Vespertino";
                        else
                          echo "Matutino";
                        ?> </td>
                        
                        <?php 
                          $ci = &get_instance();
                          $ci->load->model("Docente_model");
                           $rfc=$doc->rfcp;
                           $nom=$doc->nomp;
                           $turno=$doc->turno;
                          $datos= $ci->Docente_model->getRoles($doc->rfcp);

                          $adm= $ci->Docente_model->getAdmin($rfc);
                          $aca= $ci->Docente_model->getAca($rfc);
                          $doc= $ci->Docente_model->getDoc($rfc);
                          $pre= $ci->Docente_model->getPre($rfc);
                        ?>
                        <td>
                        <?php if(!empty($datos)):?>
                          <ul>
                          <?php foreach ($datos as $da) {
                            echo "<li>".$da->tipo." / ";
                            if($da->status==1)
                              echo "Activo";
                            else
                              echo "Inactivo";
                            echo "</li>";
                          } ?> 
                        </ul>
                        <?php endif;?> 
                        <?php 
                        $datos= $rfc."||".
                        $nom."||".
                        $turno."||".
                        $adm."||".
                        $aca."||".
                        $doc."||".
                        $pre; 
                        ?>
                        </td>
                        <td align="center">
                            <?php //echo "adm:".$adm."|| aca: ".$aca."||doc: ".$doc."||pre: ".$pre; ?>
                            <div class="btn-group">
                            <button class="btn btn-sm btn-success btn-mostrar" title="modificar" data-toggle="modal" data-target="#modal-modif" onclick="agregadoc('<?php echo $datos ?>')">
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
                    <th width="">Opciones</th>
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

<!--INICIO DE MODAL DE ALTA DE PERSONAL -->
<div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmperso" action="<?php echo base_url();?>admin/docente/addDocente" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Alta y asignación de Rol</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="text" class="form-control" name="rfcp" id="rfcp" placeholder="RFC" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="rfcp" class="form-text text-muted">RFC de persona</small>
                  </div>

                  <div class="form-group">
                    <input type="text" class="form-control" name="nomp" id="nomp" placeholder="A. Paterno A.Materno Nombre(s)" onkeyup="this.value=this.value.toUpperCase()" required>
                    <small id="nomp" class="form-text text-muted">Nombre:</small>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="contra" id="contra" required>
                    <small id="contra" class="form-text text-muted">Contraseña:</small>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <label for="">Seleccione Rol</label>
                    <div class="form-group clearfix">
                    <?php if($this->session->userdata("idr")==1): ?>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="uno" value="1" id="rol1">
                        <label for="rol1"> Administrador
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="dos" value="2" id="rol2">
                        <label for="rol2"> Académico
                        </label>
                      </div>
                    <?php endif; ?>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="tres" value="3" id="rol3">
                        <label for="rol3"> Docente
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="cuatro" value="4" id="rol4">
                        <label for="rol4"> Prefecto
                        </label>
                      </div>
                      
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- radio -->
                    <label for="">Turno</label>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="turno" id="ra1" value="M" required>
                        <label for="ra1"> Matutino
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="turno" id="ra2" value="V" required>
                        <label for="ra2">Vespertino
                        </label>
                      </div> 
                    </div>
                </div>

                <div class="col-md-6"></div>
              </div>
                
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              
              <button type="submit" class="btn btn-secondary">Guardar Datos</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->



      <!--INICIO DE MODAL DE modificacion DE PERSONAL -->
<div class="modal fade" id="modal-modif">
        <div class="modal-dialog">
          <div class="modal-content">
          <form id="frmpersomod" action="<?php echo base_url();?>admin/docente/updateDoc" method="post">
            <div class="modal-header">
              <h4 class="modal-title">Modificación Reasignación de Rol</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" class="form-control" name="mrfcp" id="mrfcp" >
                    <input type="text" class="form-control" name="mrfcp2" id="mrfcp2" placeholder="RFC" required onkeyup="this.value=this.value.toUpperCase()">
                    <small id="rfcp" class="form-text text-muted">RFC de persona</small>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" name="mnomp" id="mnomp" placeholder="A. Paterno A.Materno Nombre(s)" onkeyup="this.value=this.value.toUpperCase()" required>
                    <small id="nomp" class="form-text text-muted">Nombre:</small>
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" name="mcontra" id="mcontra" >
                    <small id="contra" class="form-text text-muted">Contraseña:</small>
                  </div>
                </div>
              </div>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <label for="">Seleccione Rol</label>
                    <div class="form-group clearfix">
                    <?php if($this->session->userdata("idr")==1): ?>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="uno" value="1" id="mrol1">
                        <label for="mrol1"> Administrador
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="dos" value="2" id="mrol2">
                        <label for="mrol2"> Académico
                        </label>
                      </div>
                    <?php endif; ?>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="tres" value="3" id="mrol3">
                        <label for="mrol3"> Docente
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="checkbox" name="cuatro" value="4" id="mrol4">
                        <label for="mrol4"> Prefecto
                        </label>
                      </div>
                      
                    </div>
                </div>
                <div class="col-sm-6">
                    <!-- radio -->
                    <label for="">Turno</label>
                    <div class="form-group clearfix">
                      <div class="icheck-success d-block">
                        <input type="radio" name="mturno" id="mra1" value="M" required>
                        <label for="mra1"> Matutino
                        </label>
                      </div>
                      <div class="icheck-success d-block">
                        <input type="radio" name="mturno" id="mra2" value="V" required>
                        <label for="mra2">Vespertino
                        </label>
                      </div> 
                    </div>
                </div>

                <div class="col-md-6"></div>
              </div>
                
                
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              
              <button type="submit" class="btn btn-secondary">Guardar Datos</button>
            </div>
          </div>
          </form>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->