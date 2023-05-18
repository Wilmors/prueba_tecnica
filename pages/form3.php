<?php include ('cabecera.php');
include ('../conexion.php')?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h3><a href="botones.php"><img src="../img/flecha-izquierda.png" style="max-width: 35px;"></a>Proceso/Eventos participacion cerrada</h3>
      </div>
       <form class="form_group_bb" id="form_busqueda" action="#" type_form="create">
        <div class="card-body" >
          <div class="tab-content" id="tab_content">
            <div class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                      <h5>Busqueda</h5>
                      <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>ID cerrada*</label>
                              <div class="input-group input-group-sm">
                                <input  placeholder="Escriba un ID cerrada" name="cerrada" id="cerrada" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Objeto/Descripcion*</label>
                              <div class="input-group input-group-sm">
                                <input  placeholder="Escriba un Objeto/Descripcion" name="descripcion" id="descripcion" type="text"  class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Comprador*</label>
                              <div class="input-group input-group-sm">
                                <input  placeholder="Escriba un Comprador" name="comprador" id="comprador" type="text" class="form-control">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Estado</label>
                              <div class="input-group input-group-sm">
                                <select name="selct_estado" id="selct_estado" class="form-control">
                                  <option value="4" selected>Todos</option>
                                  <option value="1">Activo</option>
                                  <option value="2">Publicado</option>
                                  <option value="3">Evaluacion</option>
                                </select>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-3">
                          <button class="btn btn-primary" onclick="window.location.href='/prueba_tecnica/pages/form_crono.php'">Publicar</button>
                          </div>
                          <div class="col-md-3">
                          </div>
                          <div class="col-md-3">
                            <input type="submit" class="btn btn-light" value="Buscar" id="Buscar">
                          </div>
                          <div class="col-md-3">
                            <input type="button" class="btn btn-success" value="Descargar Excel" id="Excel"> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </form>
 
<div class="row">
  <div class="col-md-12">
    <div class="card">
            <div class="card-body" >
                <table id="datatable"class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Ronda</th>
                            <th>Objeto</th>
                            <th>Descripcion</th>
                            <th>Fecha inicio</th>
                            <th>Fecha cierre</th>
                            <th>Estado</th>
                            <th>Responsable de evento</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody id="tr_td">
                  
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    </div>
  </div>
</div>



<?php include ('pie.php');




