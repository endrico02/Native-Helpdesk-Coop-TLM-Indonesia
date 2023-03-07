<?php

	require_once "PHPExcel.php";

	//create PHPExcel object
	$excel = new PHPExcel();

	//insert some data to PHPExcel object
	$excel->setActiveSheetIndex(0)
			->setCellValue('A1','Hello')
			->setCellValue('B1','World');

	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="test.xlsx"');
	header('Cache-Control: max-age=0');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');


?>