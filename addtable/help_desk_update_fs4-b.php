<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
//$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
//$status= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
//echo $cabang.$cif.$status;
//exit;

//echo '<script>alert("'.$cif.'");</script>';

?>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
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
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
tr:hover{background-color:#f5f5f5}
</style>
</head>
<body>

<table style="width:100%">
  <caption><h2></h2></caption>
  <thead> 
	
		<tr>
			<td>No</td>
			<td>Cabang</td>
			<td>CIF</td>
			<td>Nama</td>
			<td>Status Cetak FS4</td>
			<td>Status FS4-b</td>
			<td>Frekuensi Bayar</td>
		</tr> 

</thead>
  </tbody>
 <?php
$query1 = pg_query("UPDATE tagihan_kelompok_tbl set sts_topup = '1' where norek in ('$cif') and sts_relak = '2' and sts_cetak = '0'");


$query = pg_query("SELECT * From tagihan_kelompok_tbl where norek in ('$cif') and sts_relak = '2' and sts_cetak = '0'");
$no = 1;
						while ($result = pg_fetch_object($query)) {
							$cetak = $result->sts_cetak;
							$topup = $result->sts_topup;
							$frek = $result->sts_relak;

							if($cetak == '0'){
								$sts_c = 'Tidak';
							}else{
								$sts_c = 'Cetak';
							}

							if($topup == '0'){
								$sts_t = 'Tidak';
							}else{
								$sts_t = 'Cetak';
							}

							if($frek == '1'){
								$sts_f = 'Per Minggu';
							}elseif($frek == '2'){
								$sts_f = '2 Mingguan';
							}else{
								$sts_f = '';
							}

						echo "
							<tr> 
							<td>$no</td>
							<td>$result->namacabang</td>
							<td>$result->norek</td>
							<td>$result->nama</td>
							<td>$sts_c</td>
							<td>$sts_t</td>
							<td>$sts_f</td>
							</tr> 
							";	
								$no++;
										
					} $num_rows = pg_num_rows($query);
					 echo "$num_rows Rows\n";
					 unset($cif);
					 unset($cabang);
					 unset($status);
					 unset($query1);
					 unset($query2);
					 unset($query);
?>					
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
</form>
</body>
</html>