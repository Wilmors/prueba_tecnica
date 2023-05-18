<?php
include ('../../conexion.php');

require '../../libreria/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$spreadsheet->getProperties()->setCreator('wilmer garcia')->setTitle('Mi Excel');
$activeWorksheet = $spreadsheet->getActiveSheet();
$styleArrayFirstRow = [
    'font' => [
        'bold' => true,
    ]
];

$activeWorksheet->getStyle('A1:A1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('B1:B1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('C1:C1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('D1:D1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('E1:E1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('F1:F1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('G1:G1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('H1:H1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('I1:I1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('J1:J1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('K1:K1' )->applyFromArray($styleArrayFirstRow);
$activeWorksheet->getStyle('L1:L1' )->applyFromArray($styleArrayFirstRow);


$activeWorksheet->setCellValue('A1', 'ID oferta');
$activeWorksheet->setCellValue('B1', 'Creador oferta');
$activeWorksheet->setCellValue('C1', 'Objeto');
$activeWorksheet->setCellValue('D1', 'Actividad');
$activeWorksheet->setCellValue('E1', 'Descripción');
$activeWorksheet->setCellValue('F1', 'Moneda');
$activeWorksheet->setCellValue('G1', 'Presupuesto');
$activeWorksheet->setCellValue('H1', 'Fecha de inicio');
$activeWorksheet->setCellValue('I1', 'Hora de inicio');
$activeWorksheet->setCellValue('J1', 'Fecha de cierre');
$activeWorksheet->setCellValue('K1', 'Hora de cierre');
$activeWorksheet->setCellValue('L1', 'Estado');





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
LEFT JOIN `clase` ON `clase`.`Codigo_Producto` = `info_basica`.`actividad`
$where
");
$producto = '';
$i = 2;
while ($row = $familia_q->fetch_assoc()) { 
    $id_info = $row['id_info'] ?? "";
    $objeto = $row['objeto'] ?? "";
    $descripcion = $row['descripcion'] ?? "";
    $moneda = $row['moneda'] ?? "";
    $Nombre_Producto = $row['Nombre_Producto'] ?? "";
    $presupuesto = $row['presupuesto'] ?? "";
    $hora_inicio = $row['hora_inicio'] ?? "";
    $hora_cierre = $row['hora_cierre'] ?? "";
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
    $activeWorksheet->setCellValue('A'.$i, $id_info);
    $activeWorksheet->setCellValue('B'.$i, 'Wilmer Garcia');
    $activeWorksheet->setCellValue('C'.$i, $objeto);
    $activeWorksheet->setCellValue('D'.$i, $Nombre_Producto);
    $activeWorksheet->setCellValue('E'.$i, $descripcion);
    $activeWorksheet->setCellValue('F'.$i, $moneda);
    $activeWorksheet->setCellValue('G'.$i, $presupuesto);
    $activeWorksheet->setCellValue('H'.$i, $fecha_cierre);
    $activeWorksheet->setCellValue('I'.$i, $hora_inicio);
    $activeWorksheet->setCellValue('J'.$i, $fecha_cierre);
    $activeWorksheet->setCellValue('K'.$i, $hora_cierre);
    $activeWorksheet->setCellValue('L'.$i, $estado);
    $i++;
}

$writer = new Xlsx($spreadsheet);
$writer->save('../../Reporte_general.xlsx');


?>


