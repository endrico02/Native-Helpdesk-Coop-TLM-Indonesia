<?php
	
	$date = date('d-m-Y');

	require_once 'phpexcel/Classes/PHPExcel.php';
	//require 'koneksi.php';	

	$host = "192.168.21.212";
    $dbname = "postgres20";
    $user = "postgres";
    $password = "s3p3d@";
    $port = "5432";
    $koneksi = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);
 
    
	if($koneksi){
	    //echo "berhasil konek";
	    //exit();
	}else{
	    echo "Error in connecting to database.";
	    //exit();
	}

	//create PHPExcel object
	$excel = new PHPExcel();

	//memberi nama sheet 1
	$excel->getSheet(0)->setTitle('GL Akhir Bulan');

 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/

						$show = pg_query("SELECT g_000001, l_000012, '''' || l_000017::text as l_000017, l_000026::text, l_000000, l_000032 from m_02_001 where g_000001 not in ('800') and l_000032 <> '0' order by g_000001");

	$no = 2;

	while($row = pg_fetch_object($show)){

		//$nama = $row->a_000057

		$excel->getSheet(0)
				->setCellValue('A'.$no , $row->g_000001)
				->setCellValue('B'.$no , $row->l_000012)
				->setCellValue('C'.$no , $row->l_000017)
				->setCellValue('D'.$no , $row->l_000026)
				->setCellValue('E'.$no , $row->l_000000)
				->setCellValue('F'.$no , $row->l_000032);
		$no++;
	}

	//set column width
	$excel->getSheet(0)->getColumnDimension('A')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('B')->setWidth(15);
	$excel->getSheet(0)->getColumnDimension('C')->setWidth(25);
	$excel->getSheet(0)->getColumnDimension('D')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('E')->setWidth(70);
	$excel->getSheet(0)->getColumnDimension('F')->setWidth(10);

	//make table headers
	$excel->getSheet(0)
	   ->setCellValue('A1' , 'CABANG')
	   ->setCellValue('B1' , 'KD_LAP')
	   ->setCellValue('C1' , 'KD_ANALISA')
	   ->setCellValue('D1' , 'COA')
	   ->setCellValue('E1' , 'KETERANGAN')
	   ->setCellValue('F1' , 'SALDO AKHIR')
	   ;
	 /*-----------------------ending data sheet 1 (TABUM TARIK)-------------------*/

	 //select active sheet
	$excel->setActiveSheetIndex(0);

	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="GL AKHIR BULAN '.$date.'.xlsx"');
	header('Cache-Control: max-age=0');

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');

	//header("location:index.php");

?>