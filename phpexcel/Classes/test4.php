<?php

	require_once "PHPExcel.php";

	//create PHPExcel object
	$excel = new PHPExcel();

	//memberi nama sheet 1
	$excel->getSheet(0)->setTitle('Sheet Pertama');

	//membuat sheet 2 dan memberi nama pada sheet 2
	$excel2 = new PHPExcel_Worksheet($excel, 'Sheet Kedua');
	$excel->addSheet($excel2, 1);

	//insert some data to sheet 1
	$excel->getSheet(0)
			->setCellValue('A1','Hello')
			->setCellValue('B1','World');

	//insert some data to sheet 2
	$excel->getSheet(1)
			->setCellValue('A1','Hello')
			->setCellValue('B1','World 2');

	//select active sheet
	$excel->setActiveSheetIndex(0);

	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="test.xlsx"');
	header('Cache-Control: max-age=0');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');


?>