  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lista de calificaciones <?php echo $grado . "" . $grupo . " Trimestre: " . $act->val; ?></h1>
          </div>
          <div class="col-sm-4"></div>
          <div class="col-sm-2">
            <button type="button" class="btn btn-primary btn-print btn-sm ">
              <span class="fa fa-print"> </span> Imprimir</button>
          </div>

        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!--<div class="preloader"></div>-->
      <div class="container-fluid">
        <!-- COLOR PALETTE -->
        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-tag"></i>
              Periodo: <?php echo $this->session->userdata("periodo") . " " . $this->session->userdata("descper"); ?>
            </h3>
            <?php
            $ci = &get_instance();
            $ci->load->model("Alumno_model");
            ?>
          </div>
          <div class="card-body">
            <div class="col-md-12">
              <table id="x" class="table table-sm table-bordered table-striped bolgral">

                <tr>
                  <th height="100" class="align-middle">No</th>
                  <th width='' class="align-middle">matricula</th>
                  <th width="" class="align-middle">Taller</th>
                  <th width="" class="align-middle">Nombre</th>

                  <?php foreach ($horarios as $h) : ?>
                    <th style="text-align: center;">
                      <p class="vertical"><?php echo $h->idh . "/" . $h->nommat; ?></p>
                    </th>
                  <?php endforeach; ?>
                  <th>
                    <p class="vertical">TECNOLOGIA</p>
                  </th>
                  <th>
                    <p class="vertical">Igualdad de género</p>
                  </th>
                </tr>


                <?php if (!empty($alumnos)) : ?>
                  <?php


                  $x = 0; ?>
                  <?php foreach ($alumnos as $a) : ?>
                    <?php $x++; ?>
                    <tr>
                      <td align="center"><?php echo $x ?></td>
                      <td><?php echo $a->matricula; ?> </td>
                      <td><?php
                          $taller = $this->Alumno_model->cualTaller($a->matricula);
                          echo $taller->nomt; ?> </td>
                      <td><?php echo $a->app . " " . $a->apm . " " . $a->nom; ?> </td>

                      <?php foreach ($horarios as $h) : ?>

                        <td align="center">
                          <?php
                          $calif = $this->Alumno_model->verCal($h->idh, $a->matricula);

                          if ($act->val == 1) {
                            echo $calif->tr1;
                          } else {
                            if ($act->val == 2)
                              echo $calif->tr2;
                            else {
                              if ($act->val == 3)
                                echo $calif->tr3;
                              else {
                                echo "";
                              }
                            }
                          }
                          ?>
                        </td>
                      <?php endforeach; ?>
                      <td align="center">
                        <?php
                        //$hora= $this->Alumno_model->verHorario($a->grado, $a->idt);
                        $cal = $this->Alumno_model->verCalt($a->matricula);
                        //echo $a->grado."/".$a->idt."/".$cal->tr1; 
                        //if(empty($cal->tr1)){echo "Nc";}else{echo $cal->tr1; }  
                        if ($act->val == 1) {
                          echo $cal->tr1;
                        } else {
                          if ($act->val == 2)
                            echo $cal->tr2;
                          else {
                            if ($act->val == 3)
                              echo $cal->tr3;
                            else {
                              echo "";
                            }
                          }
                        }

                        ?>
                      </td>
                      <td align="center">
                        <?php
                        $cal = $this->Alumno_model->verCalme($a->matricula);
                        if ($act->val == 1) {
                          echo $cal->tr1;
                        } else {
                          if ($act->val == 2)
                            echo $cal->tr2;
                          else {
                            if ($act->val == 3)
                              echo $cal->tr3;
                            else {
                              echo "";
                            }
                          }
                        }

                        ?>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php endif; ?>

              </table>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <h5>*NC: No cursa la materia</h5>
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