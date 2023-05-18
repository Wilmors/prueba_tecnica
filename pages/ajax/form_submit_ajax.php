<?php
include ('../../conexion.php');


$modal_oculto = $_POST['modal_oculto'] ?? "";
$producto = $_POST['producto'] ?? "";
if ($modal_oculto != "") {
    
    $t_file = "SELECT `Codigo_Producto`,`Nombre_Producto`
                FROM `clase` 
                WHERE Codigo_Producto = '$producto'";
    $q_file = $con->prepare($t_file);
    $q_file->execute();
    $d_file = $q_file->get_result();
    $q_file->close();
    $d_table = $d_file->fetch_assoc();
    $Nombre_Producto = $d_table['Nombre_Producto'] ?? "";
    $Codigo_Producto = $d_table['Codigo_Producto'] ?? "";

    echo json_encode(array('success' => 1, 'name' => $Nombre_Producto, 'codigo' => $Codigo_Producto));
} else {

}?>   