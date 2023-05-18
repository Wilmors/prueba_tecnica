<?php
include ('../../conexion.php');

$objeto = $_POST['objeto'] ?? "";
if ($objeto != "") {
    $objeto = $_POST['objeto'] ?? "";
    $actividad = $_POST['actividad'] ?? "";
    $oculto = $_POST['oculto'] ?? "";
    $selct_moneda = $_POST['selct_moneda'] ?? "";
    $descripcion_alcance = $_POST['descripcion_alcance'] ?? "";
    $selct_moneda = $_POST['selct_moneda'] ?? "";
    $presupuesto = $_POST['presupuesto'] ?? "";
    $fecha_inicio = $_POST['fecha_inicio'] ?? "";
    $hora_inicio = $_POST['hora_inicio'] ?? "";
    $fecha_cierre = $_POST['fecha_cierre'] ?? "";
    $hora_cierre = $_POST['hora_cierre'] ?? "";
    $estado="1";
    $t_insert = "INSERT INTO `info_basica` (
        `id_info`,
        `objeto`,
        `descripcion`,
        `moneda`,
        `presupuesto`,
        `actividad`,
        `fecha_inicio`,
        `hora_inicio`,
        `fecha_cierre`,
        `hora_cierre`,
         `estado`
      )
  VALUES (NULL,?,?,?,?,?,?,?,?,?,?);";
  $q_insert = $con->prepare($t_insert);
  $q_insert->bind_param("sssiissssi", 
    $objeto,					  
    $descripcion_alcance,
    $selct_moneda,
    $presupuesto,
    $oculto,
    $fecha_inicio,
    $hora_inicio,
    $fecha_cierre,
    $hora_cierre,
    $estado				  
  );
  $e_insert = $q_insert->execute();
  if($e_insert){
    echo json_encode(array('success' => 1)); 
    }
} else {

}



?>              