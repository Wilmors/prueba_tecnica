<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');
  
require_once dirname(__FILE__) . '/../librery/PHPExcel-1.8/Classes/PHPExcel.php';



$rendererName = PHPExcel_Settings::PDF_RENDERER_MPDF;

$rendererLibrary = 'mPDF5.4';

$rendererLibraryPath = dirname(__FILE__).'/../../../libraries/PDF/' . $rendererLibrary;

$objPHPExcel = new PHPExcel();

$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("PDF Test Document")
							 ->setSubject("PDF Test Document")
							 ->setDescription("Test document for PDF, generated using PHP classes.")
							 ->setKeywords("pdf php")
							 ->setCategory("Test result file");

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1', 'Hello')
            ->setCellValue('B2', 'world!')
            ->setCellValue('C1', 'Hello')
            ->setCellValue('D2', 'world!');

$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A4', 'Miscellaneous glyphs')
            ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

$objPHPExcel->getActiveSheet()->setTitle('Simple');
$objPHPExcel->getActiveSheet()->setShowGridLines(false);


$objPHPExcel->setActiveSheetIndex(0);


if (!PHPExcel_Settings::setPdfRenderer(
		$rendererName,
		$rendererLibraryPath
	)) {
	die(
		'NOTICE: Please set the $rendererName and $rendererLibraryPath values' .
		'<br />' .
		'at the top of this script as appropriate for your directory structure'
	);
}


header('Content-Type: application/pdf');
header('Content-Disposition: attachment;filename="01simple.pdf"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
$objWriter->save('php://output');
exit;
