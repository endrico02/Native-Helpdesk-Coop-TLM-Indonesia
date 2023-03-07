<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<?php
//include ("conn/dbconn_online.php");

include '../conn/fungsi.php';
koneksi_db();


$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";

//echo $cif;
//exit;



?>
<head>
<style>
			table, td, th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			
		}

		th {
			height: 35px;
			background-color:#4CAF50;
			text-align: center;
			color: white;
		}
		td {
			padding: 10px;
		}
		
		tr:hover{background-color:#f5f5f5}
	</style>
</head>
<body>


 <?php

  if ($cif !="kosong") {
  
					$sql = pg_query ("insert into tagihan_kelompok_tbl_lunas (ktr, namacabang, norek, nama, alamat, desa, kdstaf, tgl_tagih, 
       nama_staff, kd_kel, nama_kelompok, plafond, produk, sisapi, jkwkt, 
       sukubunga, tglreal, jlhsetor, trgpokok, trgjasa, tab_blokir, 
       sw, mgclcl, norektab, pelunasan, tgl_hariini, jambek, no_agg, 
       sisa_jasa, absen, tr)
       
SELECT ktr, namacabang, norek, nama, alamat, desa, kdstaf, tgl_tagih, 
       nama_staff, kd_kel, nama_kelompok, plafond, produk, sisapi, jkwkt, 
       sukubunga, tglreal, jlhsetor, trgpokok, trgjasa, tab_blokir, 
       sw, mgclcl, norektab, pelunasan, current_timestamp , jambek, no_agg, 
       sisa_jasa, absen, tr
  FROM tagihan_kelompok_tbl,h_00_001
  where norek in ('$cif') and norek not in (select norek from tagihan_kelompok_tbl_lunas,h_00_001 where norek in ('$cif') and  date(tgl_hariini) = h_00_001.h_000001);");
 					$sql =      pg_query(" delete from tagihan_kelompok_tbl
												where norek in ('$cif');");

								
			printf ("Updated records: %d\n Syantik", pg_affected_rows($sql));
    
}else{
    echo "kosong!";
}
	
	?>
			
	<div class="clear"></div>
						
				</div>

 <?php
?>
</body>
</html>



 <!-- <?php
					// 	$query2 = pg_query("update m_01_002 set a_000001 = 1
					// // 					   where trim(c_000001) in ('$cif');");
					// 	$query = pg_query("select c_000001 as cif, a_000057 as nama, a_000001 as status, f_000004 as piutang from m_01_002 
					// 			where trim(c_000001) in ('$cif');");
					// 	while ($result = pg_fetch_object($query)) {
					// 		echo "
					// 			<tr> 
					// 			<td>$result->cif</td>
					// 			<td>$result->nama</td>
					// 			<td>$result->status</td>
					// 			<td>$result->piutang</td>
					// 			</tr> 
					// 			";
										
					// } $num_rows = pg_num_rows($query);
					//  echo "$num_rows Rows\n";
?> -->