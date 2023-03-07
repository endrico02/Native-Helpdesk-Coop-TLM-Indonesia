<?php

	require_once "PHPExcel.php";

	//create PHPExcel object
	$excel = new PHPExcel();

	//insert some data to PHPExcel object
	$excel->setActiveSheetIndex(0)
			->setCellValue('A1','Hello')
			->setCellValue('B1','World');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('test.xlsx');


?>