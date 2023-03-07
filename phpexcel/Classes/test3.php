<?php

	require_once 'PHPExcel.php';
	//require 'koneksi.php';

	$host = "localhost";
    $dbname = "surat";
    $user = "postgres";
    $password = "maluku";
    $port = "5432";
    $koneksi = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);
 
    
	if($koneksi){
	    //echo "berhasil konek";
	}else{
	    echo "Error in connecting to database.";
	}

	//create PHPExcel object
	$excel = new PHPExcel();

	//select active sheet
	$excel->setActiveSheetIndex(0);

	//populate data
	$query = pg_query("SELECT nama, cabang, bagian FROM pengguna");
	$no = 4;
	
	while($row = pg_fetch_object($query)){
		$excel->getActiveSheet()
				->setCellValue('A'.$no , $row->nama)
				->setCellValue('B'.$no , $row->cabang)
				->setCellValue('C'.$no , $row->bagian);
		$no++;
	}

	//set column width
	$excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
	$excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
	$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);

	//make table headers
	$excel->getActiveSheet()
	   ->setCellValue('A1' , 'Daftar Pengguna')
	   ->setCellValue('A3' , 'Nama')
	   ->setCellValue('B3' , 'Cabang')
	   ->setCellValue('C3' , 'Bagian');

	 //merge cell A1
	 $excel->getActiveSheet()->mergeCells('A1:C1');

	 //align 
	 $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal('center');

	  $excel->getActiveSheet()->getStyle('B4:B'.($no-1))->getAlignment()->setHorizontal('center');

	 //styling
	 $excel->getActiveSheet()->getStyle('A1')->applyFromArray(
	 	array(
	 		'font'=>array(
	 			'size'=>24
	 		)
	 	)
	 );

	 $excel->getActiveSheet()->getStyle('A3:C3')->applyFromArray(
	 	array(
	 		'font'=>array(
	 			'bold'=>true
	 		),
	 		'borders'=>array(
	 			'allborders'=>array(
	 				'style'=>PHPExcel_Style_Border::BORDER_THIN
	 			)
	 		)
	 	)
	 );

	 //give borders to data
	 // $excel->getActiveSheet()->getStyle('A3:C'.($no-1))->applyFromArray(
	 // 	array(
	 // 		'borders'=>array(
	 // 			'outline'=>array(
	 // 				'style'=>PHPExcel_Style_Border::BORDER_THIN
	 // 			),
	 // 			'vertical'=>array(
	 // 				'style'=>PHPExcel_Style_Border::BORDER_THIN
	 // 			)
	 // 		)
	 // );


	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="test.xlsx"');
	header('Cache-Control: max-age=0');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');

?>