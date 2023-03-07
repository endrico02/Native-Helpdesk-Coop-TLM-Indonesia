<?php

	require_once 'phpexcel/Classes/PHPExcel.php';
	//require 'koneksi.php';

	$host = "192.168.21.212";
    $dbname = "postgres20";
    $user = "postgres";
    $password = "s3p3d@";
    $port = "5432";	
    $koneksi = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);

	//create PHPExcel object
	$excel = new PHPExcel();

	//memberi nama sheet 1
	$excel->getSheet(0)->setTitle('Bagi Pokok Wajib');

	//membuat sheet 2 dan memberi nama pada sheet 2
	$excel2 = new PHPExcel_Worksheet($excel, 'Tutup Takop Sebelum');
	$excel->addSheet($excel2, 1);

 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/

	$query = pg_query("select m_06_001.g_000001,
			sum(m_06_001.f_000072) as pokok,
			sum(m_06_001.f_600072) as wajib,
			sum(m_06_001.f_000072)+sum(m_06_001.f_600072) as total,
			sum(m_06_001.f_000072)+sum(m_06_001.f_600072) - sum(t_01_003.t_000008) as selisih
			from m_06_001, t_01_003
			where m_06_001.f_000000 = t_01_003.t_000013 and m_06_001.g_000001 = t_01_003.g_000001 and t_01_003.t_000005 = 'SCC'
			group by m_06_001.g_000001
			order by m_06_001.g_000001");
	$no = 2;
	
	while($row = pg_fetch_object($query)){

		$excel->getSheet(0)
				->setCellValue('A'.$no , $row->g_000001)
				->setCellValue('B'.$no , $row->pokok)
				->setCellValue('C'.$no , $row->wajib)
				->setCellValue('D'.$no , $row->total)
				->setCellValue('E'.$no , $row->selisih);
		$no++;
	}

	//set column width
	$excel->getSheet(0)->getColumnDimension('A')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('B')->setWidth(20);
	$excel->getSheet(0)->getColumnDimension('C')->setWidth(20);
	$excel->getSheet(0)->getColumnDimension('D')->setWidth(20);
	$excel->getSheet(0)->getColumnDimension('E')->setWidth(20);

	//make table headers
	$excel->getSheet(0)
	   //->setCellValue('A1' , 'Tab Umum Tarik')	   
	   ->setCellValue('A1' , 'KTR')
	   ->setCellValue('B1' , 'Pokok')
	   ->setCellValue('C1' , 'Wajib')
	   ->setCellValue('D1' , 'Total')
	   ->setCellValue('E1' , 'selisih')
	   ;
	 /*-----------------------ending data sheet 1 (TABUM TARIK)-------------------*/


	 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/

	$query2 = pg_query("SELECT a.g_000001 as g_000001, a.l_000000 as l_000000, a.l_000029 as l_000029, a.l_000030 as l_000030, a.l_000031 as l_000031, a.l_000032 as l_000032 FROM m_02_001 a WHERE l_000017 in ('314','315') 
			and g_000001 in (SELECT m_06_001.g_000001
					from m_06_001, t_01_003
					where m_06_001.f_000000 = t_01_003.t_000013 and m_06_001.g_000001 = t_01_003.g_000001 and t_01_003.t_000005 = 'SCC'
					group by m_06_001.g_000001
					order by m_06_001.g_000001)
			order by g_000001, a.l_000017");
	$no2 = 2;
	
	while($row2 = pg_fetch_object($query2)){

		$excel->getSheet(1)
				->setCellValue('A'.$no2 , $row2->g_000001)
				->setCellValue('B'.$no2 , $row2->l_000029)
				->setCellValue('C'.$no2 , $row2->l_000030)
				->setCellValue('D'.$no2 , $row2->l_000031)
				->setCellValue('E'.$no2 , $row2->l_000032);
		$no2++;
	}

	//set column width
	$excel->getSheet(1)->getColumnDimension('A')->setWidth(10);
	$excel->getSheet(1)->getColumnDimension('B')->setWidth(20);
	$excel->getSheet(1)->getColumnDimension('C')->setWidth(20);
	$excel->getSheet(1)->getColumnDimension('D')->setWidth(20);
	$excel->getSheet(1)->getColumnDimension('E')->setWidth(20);

	//make table headers
	$excel->getSheet(1)
	   //->setCellValue('A1' , 'Tab Umum Tarik')	   
	   ->setCellValue('A1' , 'g_000001')
	   ->setCellValue('B1' , 'l_000029')
	   ->setCellValue('C1' , 'l_000030')
	   ->setCellValue('D1' , 'l_000031')
	   ->setCellValue('E1' , 'l_000032')
	   ;
	 /*-----------------------ending data sheet 1 (TABUM TARIK)-------------------*/

	 //merge cell A1
	 // $excel->getSheet(0)->mergeCells('A1:M1');
	 // $excel->getSheet(1)->mergeCells('A1:M1');
	 // $excel->getSheet(2)->mergeCells('A1:L1');
	 // $excel->getSheet(3)->mergeCells('A1:L1');

	 //align 
	 // $excel->getSheet(0)->getStyle('A1')->getAlignment()->setHorizontal('center');
	 // $excel->getSheet(1)->getStyle('A1')->getAlignment()->setHorizontal('center');
	 // $excel->getSheet(2)->getStyle('A1')->getAlignment()->setHorizontal('center');
	 // $excel->getSheet(3)->getStyle('A1')->getAlignment()->setHorizontal('center');


	  // $excel->getActiveSheet()->getStyle('B4:B'.($no-1))->getAlignment()->setHorizontal('center');

	 //styling
	 // for($i=0; $i<=3; $i++){
	 // 	if($i<=1){
	 // 		$cell="M3";
	 // 	}else{
	 // 		$cell = "L3";
	 // 	}

	 // 	// $excel->getSheet($i)->getStyle('A1')->applyFromArray(
		//  // 	array(
		//  // 		'font'=>array(
		//  // 			'size'=>24
		//  // 		)
		//  // 	)
		//  // );

		//  $excel->getSheet($i)->getStyle('A3:'.$cell)->applyFromArray(
		//  	array(
		//  		'font'=>array(
		//  			'bold'=>true
		//  		),
		//  		'borders'=>array(
		//  			'allborders'=>array(
		//  				'style'=>PHPExcel_Style_Border::BORDER_THIN
		//  			)
		//  		)
		//  	)
		//  );

	 // }


	 //select active sheet
	$excel->setActiveSheetIndex(0);

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
	header('Content-Disposition: attachment; filename="Tutup Takop Sebelum '.date('d-m-Y').'.xlsx"');
	header('Cache-Control: max-age=0');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');

	//header("location:index.php");

?>