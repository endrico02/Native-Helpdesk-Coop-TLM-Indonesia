<?php
	if(!isset($_POST['download'])){
		echo '<script>window.location = "index.php";</script>';
		exit();
	}

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
	$excel->getSheet(0)->setTitle('Jurnal');

 /*---------------------data untuk sheet 1 (TABUM TARIK)--------------------------*/
 	$date1 = $_POST['date1'];
	$date2 = $_POST['date2'];

 	if(isset($_POST['gl'])){
		$gl = $_POST['gl'];
		$query = pg_query("SELECT t_000005, t_000003, s_000000, t_000002, t_000021, t_000022, t_000023, t_000024, g_000001, g_000033, a_000057, c_000001, g_000032, g_000036, t_000017, t_000006 from m_02_004 where t_000003 >= '$date1' and t_000003 <= '$date2' and f_000000 in ('$gl') order by t_000003, g_000001
			");
 	}else{
 		$query = pg_query("SELECT t_000005, t_000003, s_000000, t_000002, t_000021, t_000022, t_000023, t_000024, g_000001, g_000033, a_000057, c_000001, g_000032, g_000036, t_000017, t_000006 from m_02_004 where t_000003 >= '$date1' and t_000003 <= '$date2' order by t_000003, g_000001
			");
 	}

	$no = 1;
	
	while($row = pg_fetch_object($query)){

		$nama = $row->a_000057;

		$excel->getSheet(0)
				->setCellValue('A'.$no , $row->t_000005)
				->setCellValue('B'.$no , $row->t_000003)
				->setCellValue('C'.$no , $row->s_000000)
				->setCellValue('D'.$no , $row->t_000002)
				->setCellValue('E'.$no , $row->t_000021)
				->setCellValue('F'.$no , $row->t_000022)
				->setCellValue('G'.$no , $row->t_000023)
				->setCellValue('H'.$no , $row->t_000024)
				->setCellValue('I'.$no , $row->g_000001)
				->setCellValue('J'.$no , $row->g_000033)
				->setCellValue('K'.$no , $row->a_000057)
				->setCellValue('L'.$no , $row->c_000001)
				->setCellValue('M'.$no , $row->g_000032)
				->setCellValue('N'.$no , $row->g_000036)
				->setCellValue('O'.$no , $row->t_000017)
				->setCellValue('P'.$no , $row->t_000006);
		$no++;
	}

	$dat1 = date('d-m-Y', strtotime($date1));
	$dat2 = date('d-m-Y', strtotime($date2));

	//set column width
	$excel->getSheet(0)->getColumnDimension('A')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('B')->setWidth(10);
	$excel->getSheet(0)->getColumnDimension('C')->setWidth(10);
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

	//make table headers
	$excel->getSheet(0)
	   ->setCellValue('A1' , 'Kode Transaksi')
	   ->setCellValue('B1' , 'Tgl Transaksi')
	   ->setCellValue('C1' , 'Uraian')
	   ->setCellValue('D1' , 'Bukti Transaksi')
	   ->setCellValue('E1' , 'Saldo Awal')
	   ->setCellValue('F1' , 'Mutasi Debet')
	   ->setCellValue('G1' , 'Mutasi Kredit')
	   ->setCellValue('H1' , 'Saldo Akhir')
	   ->setCellValue('I1' , 'Kantor Lokasi Trx')
	   ->setCellValue('J1' , 'Kasir')
	   ->setCellValue('K1' , 'Nama GL')
	   ->setCellValue('L1' , 'GL')
	   ->setCellValue('M1' , 'Kantor')
	   ->setCellValue('N1' , 'Waktu')
	   ->setCellValue('O1' , 'Voucher System')
	   ->setCellValue('P1' , 'Status Mutasi')
	   ;
	 /*-----------------------ending data sheet 1 (TABUM TARIK)-------------------*/

	 //select active sheet
	$excel->setActiveSheetIndex(0);

	

	//this is for MS Office Excel 2007 xlsx format
	header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
	header('Content-Disposition: attachment; filename="Jurnal '.$nama.' '.$gl.' '.$dat1.' - '.$dat2.'.xlsx"');
	header('Cache-Control: max-age=0');

	ob_end_clean();

    //write the result to a file
	$file = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
	$file->save('php://output');

	//header("location:index.php");

?>