<?php
include ('../../conexion.php');
$cerrada = $_POST['cerrada'] ?? "";
$descripcion = $_POST['descripcion'] ?? "";
$comprador = $_POST['comprador'] ?? "";
$selct_estado = $_POST['selct_estado'] ?? "";
$where = '';
if($cerrada!="" || $descripcion!="" || $comprador!="" || ($selct_estado != "4" && $selct_estado != "")  ){
    $where .= 'WHERE';
    if($cerrada!=""){
        $where .= ' id_info='.$cerrada.' and';
    }
    if($descripcion!=""){
        $where .= ' objeto='.$descripcion.' and';
    }
    if($comprador!=""){
        $where .=  'objeto='.$comprador.' and';
    }
    if($selct_estado!="4"){
        $where .= ' estado='.$selct_estado.' and';
    }
    $where = substr($where, 0, -4);
}
$familia_q = mysqli_query($con, "SELECT `id_info`,
`objeto`,
`descripcion`,
`fecha_inicio`,
`fecha_cierre`,
`estado`
FROM `info_basica`
$where
");
$producto = '';
while ($row = $familia_q->fetch_assoc()) { 
    $id_info = $row['id_info'] ?? "";
    $objeto = $row['objeto'] ?? "";
    $descripcion = $row['descripcion'] ?? "";
    $fecha_inicio = $row['fecha_inicio'] ?? "";
    $fecha_cierre = $row['fecha_cierre'] ?? "";
    $estado = $row['estado'] ?? "";
    if ($estado == 1) {
        $estado = "Activo";
    } elseif ($estado == 2) {
        $estado = "Publicado";
    } elseif ($estado== 3) {
        $estado = "Evaluacion";
    }
$producto .= "<tr>
<td>$id_info </td>
<td>Ronda 1</td>
<td> $objeto </td>
<td>$descripcion</td>
<td>$fecha_inicio</td>
<td>$fecha_cierre </td>
<td>$estado</td>
<td>Wilmer Garcia</td>
<td style='text-align:center;'>--</td>
</tr>";
}
echo json_encode(array('success' => 1 ,'producto' => $producto )); 


