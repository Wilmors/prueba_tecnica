<?php
include ('../../conexion.php');


$segmento = $_POST['segmento'] ?? "";

if ($segmento != "") {
    $familia_q = mysqli_query($con, "SELECT `Codigo_Familia`, `Nombre_Familia`
        FROM `clase`
        WHERE Codigo_Familia LIKE '".$segmento."%' GROUP BY `Codigo_Familia`;");
     
    $familia = '<label for="objeto">familia*</label>
        <div class="input-group input-group-sm">
        <select name="familia" id="familia" style="width: 100%;">
        <option value="0">Seleccione una opción</option>';
    
    while ($fam = mysqli_fetch_assoc($familia_q)) { 
        $familia .= "<option value='".$fam['Codigo_Familia']."'>".$fam['Nombre_Familia']."</option>";
    }
    
    $familia .= "</select></div>";
    echo $familia;
} else {

}

$familia = $_POST['familia'] ?? "";

if ($familia != "") {
    $clase_q = mysqli_query($con, "SELECT `Codigo_Clase`, `Nombre_Clase`
        FROM `clase`
        WHERE Codigo_Clase LIKE '".$familia."%' GROUP BY `Codigo_Clase`;");
     
    $clase = '<label for="clase">Clase*</label>
        <div class="input-group input-group-sm">
        <select name="clase" id="clase" style="width: 100%;">
        <option value="0">Seleccione una opción</option>';
    
    while ($clas = mysqli_fetch_assoc($clase_q)) { 
        $clase .= "<option value='".$clas['Codigo_Clase']."'>".$clas['Nombre_Clase']."</option>";
    }
    
    $clase .= "</select></div>";
    echo $clase;
} else {
    
}


$clase = $_POST['clase'] ?? "";

if ($clase != "") {
    $producto_q = mysqli_query($con, "SELECT `Codigo_Producto`,`Nombre_Producto`
        FROM `clase`
        WHERE Codigo_Producto LIKE '".$clase."%' ;");
     
    $producto = '<label for="clase">Producto*</label>
        <div class="input-group input-group-sm">
        <select name="producto" required="required" id="producto" style="width: 100%;">
        <option value="0">Seleccione una opción</option>';
        
    
    while ($pro = mysqli_fetch_assoc($producto_q)) { 
        $producto .= "<option value='$pro[Codigo_Producto]'>$pro[Nombre_Producto]</option>";
    }
    
    $producto .= "</select></div>";
    echo $producto;
} else {
    
}

$producto = $_POST['producto'] ?? "";

if ($producto != "") {
    echo json_encode(array('success' => 1, 'name' => $producto));
} else {
    
}




?>   