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

	//memberi nama sheet
	$excel->getSheet(0)->setTitle('Neraca');

	//membuat sheet 2 dan memberi nama pada sheet 2
	// $excel2 = new PHPExcel_Worksheet($excel, 'Tutup Takop Sebelum');
	// $excel->addSheet($excel2, 1);

 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/

	$query = pg_query("SELECT  l_000012 as kd_laporan,	
	l_000017 as kd_analisa,
	l_000000 as ket,	 
	MAX(CASE WHEN (g_000001 = '001') THEN l_000032 ELSE NULL END) AS saldo,
	MAX(CASE WHEN (g_000001 = '002') THEN l_000032 ELSE NULL END) AS saldo_1,
	MAX(CASE WHEN (g_000001 = '003') THEN l_000032 ELSE NULL END) AS saldo_2,
	MAX(CASE WHEN (g_000001 = '004') THEN l_000032 ELSE NULL END) AS saldo_3,
	MAX(CASE WHEN (g_000001 = '005') THEN l_000032 ELSE NULL END) AS saldo_4,
	MAX(CASE WHEN (g_000001 = '006') THEN l_000032 ELSE NULL END) AS saldo_5,
	MAX(CASE WHEN (g_000001 = '007') THEN l_000032 ELSE NULL END) AS saldo_6,
	MAX(CASE WHEN (g_000001 = '008') THEN l_000032 ELSE NULL END) AS saldo_7,
	MAX(CASE WHEN (g_000001 = '009') THEN l_000032 ELSE NULL END) AS saldo_8,
	MAX(CASE WHEN (g_000001 = '010') THEN l_000032 ELSE NULL END) AS saldo_9,
	MAX(CASE WHEN (g_000001 = '011') THEN l_000032 ELSE NULL END) AS saldo_10,
	MAX(CASE WHEN (g_000001 = '012') THEN l_000032 ELSE NULL END) AS saldo_11,
	MAX(CASE WHEN (g_000001 = '013') THEN l_000032 ELSE NULL END) AS saldo_12,
	MAX(CASE WHEN (g_000001 = '014') THEN l_000032 ELSE NULL END) AS saldo_13,
	MAX(CASE WHEN (g_000001 = '015') THEN l_000032 ELSE NULL END) AS saldo_14,
	MAX(CASE WHEN (g_000001 = '016') THEN l_000032 ELSE NULL END) AS saldo_15,
	MAX(CASE WHEN (g_000001 = '017') THEN l_000032 ELSE NULL END) AS saldo_16,
	MAX(CASE WHEN (g_000001 = '018') THEN l_000032 ELSE NULL END) AS saldo_17,
	MAX(CASE WHEN (g_000001 = '019') THEN l_000032 ELSE NULL END) AS saldo_18,
	MAX(CASE WHEN (g_000001 = '020') THEN l_000032 ELSE NULL END) AS saldo_19,
	MAX(CASE WHEN (g_000001 = '021') THEN l_000032 ELSE NULL END) AS saldo_20,
	MAX(CASE WHEN (g_000001 = '022') THEN l_000032 ELSE NULL END) AS saldo_21,
	MAX(CASE WHEN (g_000001 = '023') THEN l_000032 ELSE NULL END) AS saldo_22,
	MAX(CASE WHEN (g_000001 = '024') THEN l_000032 ELSE NULL END) AS saldo_23,
	MAX(CASE WHEN (g_000001 = '025') THEN l_000032 ELSE NULL END) AS saldo_24,
	MAX(CASE WHEN (g_000001 = '026') THEN l_000032 ELSE NULL END) AS saldo_25,
	MAX(CASE WHEN (g_000001 = '027') THEN l_000032 ELSE NULL END) AS saldo_26,
	MAX(CASE WHEN (g_000001 = '028') THEN l_000032 ELSE NULL END) AS saldo_27,
	MAX(CASE WHEN (g_000001 = '029') THEN l_000032 ELSE NULL END) AS saldo_28,
	MAX(CASE WHEN (g_000001 = '030') THEN l_000032 ELSE NULL END) AS saldo_29,
	MAX(CASE WHEN (g_000001 = '031') THEN l_000032 ELSE NULL END) AS saldo_30,
	MAX(CASE WHEN (g_000001 = '032') THEN l_000032 ELSE NULL END) AS saldo_31,
	MAX(CASE WHEN (g_000001 = '033') THEN l_000032 ELSE NULL END) AS saldo_32,
	MAX(CASE WHEN (g_000001 = '034') THEN l_000032 ELSE NULL END) AS saldo_33,
	MAX(CASE WHEN (g_000001 = '035') THEN l_000032 ELSE NULL END) AS saldo_34,
	MAX(CASE WHEN (g_000001 = '036') THEN l_000032 ELSE NULL END) AS saldo_35,
	MAX(CASE WHEN (g_000001 = '038') THEN l_000032 ELSE NULL END) AS saldo_36,
	MAX(CASE WHEN (g_000001 = '039') THEN l_000032 ELSE NULL END) AS saldo_37,
	MAX(CASE WHEN (g_000001 = '040') THEN l_000032 ELSE NULL END) AS saldo_38,
	MAX(CASE WHEN (g_000001 = '041') THEN l_000032 ELSE NULL END) AS saldo_39,
	MAX(CASE WHEN (g_000001 = '042') THEN l_000032 ELSE NULL END) AS saldo_40,
	MAX(CASE WHEN (g_000001 = '043') THEN l_000032 ELSE NULL END) AS saldo_41,
	MAX(CASE WHEN (g_000001 = '044') THEN l_000032 ELSE NULL END) AS saldo_42,
	MAX(CASE WHEN (g_000001 = '045') THEN l_000032 ELSE NULL END) AS saldo_43,
	MAX(CASE WHEN (g_000001 = '046') THEN l_000032 ELSE NULL END) AS saldo_44,
	MAX(CASE WHEN (g_000001 = '047') THEN l_000032 ELSE NULL END) AS saldo_45,
	MAX(CASE WHEN (g_000001 = '100') THEN l_000032 ELSE NULL END) AS saldo_46,
	MAX(CASE WHEN (g_000001 = '700') THEN l_000032 ELSE NULL END) AS saldo_47,
	MAX(CASE WHEN (g_000001 = '500') THEN l_000032 ELSE NULL END) AS saldo_48,
	MAX(CASE WHEN (g_000001 = '048') THEN l_000032 ELSE NULL END) AS praya,
	MAX(CASE WHEN (g_000001 = '049') THEN l_000032 ELSE NULL END) AS sumbawa,
	MAX(CASE WHEN (g_000001 = '050') THEN l_000032 ELSE NULL END) AS wewewa,
	MAX(CASE WHEN (g_000001 = '600') THEN l_000032 ELSE NULL END) AS unit_lacove
FROM m_02_001 
WHERE l_000032 <> 0 and g_000001 <> '800'
GROUP BY l_000012,l_000017,l_000000
ORDER BY l_000017");
	$no = 2;
	
	while($row = pg_fetch_object($query)){

		$excel->getSheet(0)
				->setCellValue('A'.$no , $row->kd_laporan)
				->setCellValue('B'.$no , $row->kd_analisa)
				->setCellValue('C'.$no , $row->ket)
				->setCellValue('D'.$no , $row->saldo)
				->setCellValue('E'.$no , $row->saldo_1)
				->setCellValue('F'.$no , $row->saldo_2)
				->setCellValue('G'.$no , $row->saldo_3)
				->setCellValue('H'.$no , $row->saldo_4)
				->setCellValue('I'.$no , $row->saldo_5)
				->setCellValue('J'.$no , $row->saldo_6)
				->setCellValue('K'.$no , $row->saldo_7)
				->setCellValue('L'.$no , $row->saldo_8)
				->setCellValue('M'.$no , $row->saldo_9)
				->setCellValue('N'.$no , $row->saldo_10)
				->setCellValue('O'.$no , $row->saldo_11)
				->setCellValue('P'.$no , $row->saldo_12)
				->setCellValue('Q'.$no , $row->saldo_13)
				->setCellValue('R'.$no , $row->saldo_14)
				->setCellValue('S'.$no , $row->saldo_15)
				->setCellValue('T'.$no , $row->saldo_16)
				->setCellValue('U'.$no , $row->saldo_17)
				->setCellValue('V'.$no , $row->saldo_18)
				->setCellValue('W'.$no , $row->saldo_19)
				->setCellValue('X'.$no , $row->saldo_20)
				->setCellValue('Y'.$no , $row->saldo_21)
				->setCellValue('Z'.$no , $row->saldo_22)
				->setCellValue('AA'.$no , $row->saldo_23)
				->setCellValue('AB'.$no , $row->saldo_24)
				->setCellValue('AC'.$no , $row->saldo_25)
				->setCellValue('AD'.$no , $row->saldo_26)
				->setCellValue('AE'.$no , $row->saldo_27)
				->setCellValue('AF'.$no , $row->saldo_28)
				->setCellValue('AG'.$no , $row->saldo_29)
				->setCellValue('AH'.$no , $row->saldo_30)
				->setCellValue('AI'.$no , $row->saldo_31)
				->setCellValue('AJ'.$no , $row->saldo_32)
				->setCellValue('AK'.$no , $row->saldo_33)
				->setCellValue('AL'.$no , $row->saldo_34)
				->setCellValue('AM'.$no , $row->saldo_35)
				->setCellValue('AN'.$no , $row->saldo_36)
				->setCellValue('AO'.$no , $row->saldo_37)
				->setCellValue('AP'.$no , $row->saldo_38)
				->setCellValue('AQ'.$no , $row->saldo_39)
				->setCellValue('AR'.$no , $row->saldo_40)
				->setCellValue('AS'.$no , $row->saldo_41)
				->setCellValue('AT'.$no , $row->saldo_42)
				->setCellValue('AU'.$no , $row->saldo_43)
				->setCellValue('AV'.$no , $row->saldo_44)
				->setCellValue('AW'.$no , $row->saldo_45)
				->setCellValue('AX'.$no , $row->praya)
				->setCellValue('AY'.$no , $row->sumbawa)
				->setCellValue('AZ'.$no , $row->wewewa)
				->setCellValue('BA'.$no , $row->saldo_46)
				->setCellValue('BB'.$no , $row->saldo_47)
				->setCellValue('BC'.$no , $row->saldo_48)
				->setCellValue('BD'.$no , $row->unit_lacove)
				;
		$no++;
	}

	//set column width
	$excel->getSheet(0)->getColumnDimension('A')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('B')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('C')->setWidth(35);
	$excel->getSheet(0)->getColumnDimension('D')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('E')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('F')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('G')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('H')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('I')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('J')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('K')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('L')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('M')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('N')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('O')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('P')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('Q')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('R')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('S')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('T')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('U')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('V')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('W')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('X')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('Y')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('Z')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AA')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AB')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AC')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AD')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AE')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AF')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AG')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AH')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AI')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AJ')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AK')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AL')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AM')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AN')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AO')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AP')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AQ')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AR')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AS')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AT')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AU')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AV')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AW')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AX')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AY')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('AZ')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('BA')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('BB')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('BC')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('BD')->setWidth(10);

	//make table headers
	$excel->getSheet(0)
	   //->setCellValue('A1' , 'Tab Umum Tarik')	   
	   ->setCellValue('A1' , 'KD LAPORAN')
	   ->setCellValue('B1' , 'KD ANALISA')
	   ->setCellValue('C1' , 'ket')
	   ->setCellValue('D1' , 'KHUSUS')
	   ->setCellValue('E1' , 'KUPANG')
	   ->setCellValue('F1' , 'KUPANG B')
	   ->setCellValue('G1' , 'OESAO')
	   ->setCellValue('H1' , 'KUPANG C2')
	   ->setCellValue('I1' , 'BAUN')
	   ->setCellValue('J1' , 'CAMPLONG')
	   ->setCellValue('K1' , 'SOE')
	   ->setCellValue('L1' , 'KAPAN')
	   ->setCellValue('M1' , 'NIKI-NIKI')
	   ->setCellValue('N1' , 'KEFA 1')
	   ->setCellValue('O1' , 'ATAMBUA 1')
	   ->setCellValue('P1' , 'BETUN 1')
	   ->setCellValue('Q1' , 'ALOR')
	   ->setCellValue('R1' , 'ROTE 1')
	   ->setCellValue('S1' , 'ROTE 2')
	   ->setCellValue('T1' , 'ATAMBUA 2')
	   ->setCellValue('U1' , 'INSANA')
	   ->setCellValue('V1' , 'SABU')
	   ->setCellValue('W1' , 'SOE 2')
	   ->setCellValue('X1' , 'KEFA 2')
	   ->setCellValue('Y1' , 'WAINGAPU')
	   ->setCellValue('Z1' , 'MELOLO')
	   ->setCellValue('AA1' , 'RUTENG')
	   ->setCellValue('AB1' , 'MAUMERE 1')
	   ->setCellValue('AC1' , 'LEWA')
	   ->setCellValue('AD1' , 'LEMBATA')
	   ->setCellValue('AE1' , 'PANITE')
	   ->setCellValue('AF1' , 'HAILULIK')
	   ->setCellValue('AG1' , 'SOA')
	   ->setCellValue('AH1' , 'PALU')
	   ->setCellValue('AI1' , 'BETUN 2')
	   ->setCellValue('AJ1' , 'MAUMERE 2')
	   ->setCellValue('AK1' , 'BAJAWA')
	   ->setCellValue('AL1' , 'BULELENG')
	   ->setCellValue('AM1' , 'GIRI EMAS')
	   ->setCellValue('AN1' , 'CANCAR')
	   ->setCellValue('AO1' , 'LARANTUKA')
	   ->setCellValue('AP1' , 'ENDE')
	   ->setCellValue('AQ1' , 'NAGEKEO')
	   ->setCellValue('AR1' , 'BORONG')
	   ->setCellValue('AS1' , 'LEMBOR')
	   ->setCellValue('AT1' , 'MAMUJU')
	   ->setCellValue('AU1' , 'WOLOWARU')
	   ->setCellValue('AV1' , 'MARONGE')
	   ->setCellValue('AW1' , 'KALUKKU')
	   ->setCellValue('AX1' , 'PRAYA')
	   ->setCellValue('AY1' , 'SUMBAWA')
	   ->setCellValue('AZ1' , 'WEWEWA')
	   ->setCellValue('BA1' , 'PUSAT')
	   ->setCellValue('BB1' , 'UNIT BISNIS')
	   ->setCellValue('BC1' , 'DPPK COOP TLM INDONESIA')
	   ->setCellValue('BD1' , 'UNIT LA COVE')
	   ;
	 /*-----------------------ending data sheet 1 (TABUM TARIK)-------------------*/


	 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/

	

	

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

	 
	 // Script dijalankan pada 20-01-2017 05:10:15 
	 //echo date('d-m-Y H:i:s'); // 19-01-2017 23:10:15
	 
	 date_default_timezone_set('Asia/Makassar');
	 
	 
	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="Neraca '.date('dmY H.i.s').'.xlsx"');
	header('Cache-Control: max-age=0');
    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');

	//header("location:index.php");

?>