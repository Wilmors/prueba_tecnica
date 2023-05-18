<?php include ('cabecera.php');
include ('../conexion.php')?>

<?php
$familia_q = mysqli_query($con, "SELECT `id_info`,
`objeto`,
`descripcion`,
`moneda`,
`presupuesto`,
`actividad`,
`fecha_inicio`,
`hora_inicio`,
`fecha_cierre`,
`hora_cierre`,
`estado`,
`clase`.`Nombre_Producto`
FROM `info_basica`
LEFT JOIN `clase` ON `clase`.`Codigo_Producto` = `info_basica`.`actividad`");
$fecha_actual = date("Y-m-d h"); 

 if ($familia_q->num_rows > 0) { ?>
<div class="row">
  <div class="col-md-12">
    <div class="card">
        <div class="card-header">
        <a href="form3.php"><img src="../img/flecha-izquierda.png" style="max-width: 35px;"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" id="refresh" fecha_actual="<?php echo $fecha_actual ?>" class="btn btn-primary" value="Tarea cron">
        </div>   
            <div class="card-body" >
                <table id="datatable"class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>N°</th>
                            <th>Objeto</th>
                            <th>Descripcion</th>
                            <th>Moneda</th>
                            <th>Presupuesto</th>
                            <th>Actividad</th>
                            <th>Fecha inicio</th>
                            <th>Hora inicio</th>
                            <th>Fecha cierre</th>
                            <th>Hora cierre</th>
                            <th>Estado</th>
                            <th>Publicar</th>

                        </tr>
                    </thead>
                    <?php 
                    while ($row = $familia_q->fetch_assoc()) {
                        if ($row['estado'] == 1) {
                            $estado = "Activo";
                        } elseif ($row['estado'] == 2) {
                            $estado = "Publicado";
                        } elseif ($row['estado'] == 3) {
                            $estado = "Evaluacion";
                        }
                        ?>
                        <tr>
                            <td><?php echo $row['id_info']; ?></td>
                            <td><?php echo $row['objeto']; ?></td>
                            <td><?php echo $row['descripcion']; ?></td>
                            <td><?php echo $row['moneda']; ?></td>
                            <td><?php echo $row['presupuesto']; ?></td>
                            <td><?php echo $row['Nombre_Producto']; ?></td>
                            <td><?php echo $row['fecha_inicio']; ?></td>
                            <td><?php echo $row['hora_inicio']; ?></td>
                            <td><?php echo $row['fecha_cierre']; ?></td>
                            <td><?php echo $row['hora_cierre']; ?></td>
                            <td><?php echo $estado ?></td>
                            <td><button  class="btn btn-primary" onClick="publicar_click(<?php echo $row['id_info']; ?>)" >Publicar</button></td>
                        </tr>
                    <?php  } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<?php include ('pie.php');




