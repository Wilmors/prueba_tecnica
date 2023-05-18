<?php
include ('../../conexion.php');
    $fecha_actual = date("Y-m-d H-i-s"); 
  $titulo = $_POST['titulo'];
  $descripcion = $_POST['descripcion'];
  $archivos = $_FILES['archivos'];
  $ruta_destino = '../../files/'.$archivos['name'][0];
  
  $table_files = '';

  $j=0;
  for ($i = 0; $i < count($archivos['name']); $i++) {
    $nombre_archivo = $archivos['name'][$i];
    $ruta_archivo = $ruta_destino . $nombre_archivo;

    if (move_uploaded_file($archivos['tmp_name'][$i], $ruta_archivo)) {
   
      $j++;

    } else {

    }
  }

  $q_id = mysqli_query($con, "SELECT `id_info` FROM `info_basica` ORDER BY id_info DESC LIMIT 1");
$f_id = mysqli_fetch_assoc($q_id);
$n_archivos = $j;
$id_info = $f_id['id_info'] ?? "";
$t_insert = "INSERT INTO `files_info` (
    `id_files`,
    `fecha_de_creacion`,
    `titulo`,
    `descripcion`,
    `n_archivos`, 
    `id_info_basica`
) VALUES (NULL, ?, ?, ?, ?, ?)";
$q_insert = $con->prepare($t_insert);
$q_insert->bind_param("sssii", 
    $fecha_actual,					  
    $titulo,
    $descripcion,
    $n_archivos,
    $id_info		  
);
$e_insert = $q_insert->execute();
if($e_insert){
  $q_table = mysqli_query($con, "SELECT `id_files`,`fecha_de_creacion`,`titulo`,`files_info`.`descripcion`,`n_archivos`,`id_info_basica`,`info_basica`.`objeto` FROM `files_info` LEFT JOIN `info_basica` ON `info_basica`.`id_info`=`files_info`.id_info_basica ORDER BY id_files DESC LIMIT 1;");
  $f_table = mysqli_fetch_assoc($q_table);
  $id_files = $f_table['id_files'] ?? "";
  $titulo = $f_table['titulo'] ?? "";
  $descripcion = $f_table['descripcion'] ?? "";
  $n_archivos = $f_table['n_archivos'] ?? "";
  $objeto = $f_table['objeto'] ?? "";
  $table_files .= "<tr>
<td>$id_files </td>
<td>$objeto</td>
<td>$titulo</td>
<td>$descripcion</td>
<td>$n_archivos</td>
<td style='text-align:center;'>-----</td>
</tr>";

echo json_encode(array('table_files' => $table_files ));
}


?>