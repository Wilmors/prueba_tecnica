<?php
include ('../../conexion.php');
$align = $_POST['align'] ?? "";
if($align!=""){
 
$estado="2";

$t_update = " UPDATE
`info_basica`
SET `estado` = ?
WHERE `id_info` = ? ;";
$q_update = $con->prepare($t_update);
$q_update->bind_param("ii", 	  
$estado,
$align	
);
$e_update = $q_update->execute();


    echo json_encode(array('success' => 1)); 
    }


$fecha_actual = $_POST['fecha_actual'] ?? "";
if($fecha_actual!=""){
    $estado="3";
    $fecha = explode(" ", $fecha_actual);
    $AMD = $fecha[0];
    $H =  $fecha[1];
    $t_file = "SELECT `id_info`,
    `fecha_inicio`,
    `hora_inicio`,
    `fecha_cierre`,
    `hora_cierre`,
    `estado`
  FROM
    `info_basica`
    WHERE fecha_inicio='$AMD' AND hora_inicio LIKE '".$H."%' AND estado='2';";
    $q_file = $con->prepare($t_file);
    $q_file->execute();
    $d_file = $q_file->get_result();
    $q_file->close();
    while ($pro = $d_file->fetch_assoc()) { 
        $id_info = $pro['id_info'] ?? "";
        $t_update = " UPDATE
        `info_basica`
        SET `estado` = ?
        WHERE `id_info` = ? ;";
        $q_update = $con->prepare($t_update);
        $q_update->bind_param("ii", 	  
        $estado,
        $id_info	
        );
        $e_update = $q_update->execute();


    }
    echo json_encode(array('success' => 1)); 
}
