<?php include ('cabecera.php');
include ('../conexion.php')?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
      <h3> <a href="botones.php"><img src="../img/flecha-izquierda.png" style="max-width: 35px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crear proceso/Evento participación cerrada</h3>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
          <li class="nav-item">
            <a class="nav-link active"  data-toggle="tab" href="#informacion_basica" role="tab" aria-controls="home" aria-selected="true">Información básica</a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  data-toggle="tab" href="#cronograma" role="tab" aria-controls="profile" aria-selected="false">Cronograma</a>
          </li>
          <li class="nav-item" id="nav_ofertas" style="display: none;">
            <a class="nav-link"  data-toggle="tab" href="#ofertas" role="tab" aria-controls="profile" aria-selected="false">Documentación petición de ofertas</a>
          </li>
        </ul>
      </div>
      <form class="form_group_bb" id="form_infor" action="#" type_form="create">
        <div class="card-body" >
          <div class="tab-content" id="tab_content">
            <div class="tab-pane fade show active" id="informacion_basica" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <h5>Información básica</h5>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Objeto*</label>
                              <div class="input-group input-group-sm">
                                <input required placeholder="Escriba un objeto" name="objeto" id="objeto" type="text" class="form-control disable_input">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Actividad*</label>
                              <div class="input-group input-group-sm">
                                <input required placeholder="Escriba una actividad" name="actividad" id="actividad" type="text" readonly class="form-control"><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal" data-whatever="@mdo">Clases</button>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Descripción/Alcance*</label>
                              <div class="input-group input-group-sm">
                                <input required placeholder="Escriba una descripción/alcance" name="descripcion_alcance" id="descripcion_alcance" type="text" class="form-control disable_input" >
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Moneda</label>
                              <div class="input-group input-group-sm ">
                                <select name="selct_moneda" id="selct_moneda" class="form-control disable_select">
                                  <option value="COP" selected>COP</option>
                                  <option value="USD">USD</option>
                                  <option value="EUR">EUR</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                            <div class="form-group">
                              <label>Presupuesto*</label>
                              <div class="input-group input-group-sm">
                                <input required placeholder="Escriba su presupuesto" name="presupuesto" id="presupuesto" type="number" class="form-control disable_input">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="tab-pane fade" id="cronograma" role="tabpanel" aria-labelledby="profile-tab">
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <h5>Cronograma</h5>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Fecha de inicio*</label>
                            <div class="input-group input-group-sm">
                            <input class="form-control disable_input" required type="date" id="fecha_inicio" name="fecha_inicio">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Hora inicio*</label>
                            <div class="input-group input-group-sm">
                            <input class="form-control disable_input" required type="time" id="hora_inicio" name="hora_inicio">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Fecha de cierre*</label>
                            <div class="input-group input-group-sm">
                            <input class="form-control disable_input" required type="date" id="fecha_cierre" name="fecha_cierre">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                            <label>Hora de cierre*</label>
                            <div class="input-group input-group-sm">
                              <input class="form-control disable_input" required type="time" id="hora_cierre" name="hora_cierre">
                            </div>
                          </div>
                        </div>
                        <div class="col-md-12">
                          <input class="form-control" type="hidden" id="oculto" name="oculto">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane fade" id="ofertas" role="tabpanel" aria-labelledby="profile-tab" >
              <div class="row">
                <div class="col-md-12">
                  <div class="card">
                    <h6>Contenido-documentacion peticion de ofertas/Terminos y condiciones del proceso</h6>
                    <div class="card-body">
                    <table id="datatable"class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Tipo</th>
                            <th>Titulo</th>
                            <th>descripcion</th>
                            <th>Contenido</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla">
                  
                    </tbody>
                </table> 


                      <form id="formulario" enctype="multipart/form-data">
                       <div class="col-md-4">
                          <div class="form-group">
                            <label for="titulo">Título:</label>
                            <input type="text" id="titulo" class="form-control"  name="titulo" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <input type="text" id="descripcion" class="form-control"  name="descripcion" />
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="archivos">Archivos:</label>
                            <input type="file" id="archivos" class="form-control"  name="archivos" multiple />
                          </div>
                        </div>  
                          <div>
                            <button class="btn btn-primary" id="agregar">Agregar contenido</button>
                          </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <input type="submit" id="guardar_procesos" class="btn btn-primary" value="Guardar" >
        </div>
      </form>
    </div>
  </div>
</div>
<div>
<div class="modal fade" id="Modal">
  <div class="modal-dialog" role="document" style="max-width: 85% !important;">
    <div class="modal-content">
      <div class="modal-body">
        <form class="form_group_bb" id="form_modal" action="#" type_form="create">
          <div class="card-body">
              <div class="tab-content" id="tab_content">
                  <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                          <div class="col-md-12">
                              <div class="card">
                                  <h5 class="card-header">Información básica</h5>
                                  <div class="card-body">
                                      <div class="row">
                                          <div class="col-md-3">
                                              <div class="form-group">
                                                  <label for="objeto">Segmento*</label>
                                                  <div class="input-group input-group-sm">
                                                  <select name="selct_segmento"  id="selct_segmento" style="width: 100%;">
                                                  <option value='0'>Seleccione una opción</option>
                                                         <?php
                                                          $segmento =	mysqli_query($con,"SELECT `Codigo_Segmento`,`Nombre_Segmento` FROM `clase`  GROUP BY `Codigo_Segmento`;");
                                                          while($seg = mysqli_fetch_assoc($segmento)){ 
                                                                      echo "<option value='$seg[Codigo_Segmento]'>$seg[Nombre_Segmento]</option>";
                                                          } ?>
                                                  </select>
                                                  </div>
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group" id="selct_familia">
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group" id="selct_clase">
                                                  
                                              </div>
                                          </div>
                                          <div class="col-md-3">
                                              <div class="form-group" id="selct_producto">
                                                  
                                              </div>
                                          </div>
                                          <div class="col-md-12">
                                              <input class="form-control" type="hidden" id="modal_oculto" name="modal_oculto">
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <input type="submit" class="btn btn-primary" value="Guardar" id="modal_g">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php include ('pie.php');




