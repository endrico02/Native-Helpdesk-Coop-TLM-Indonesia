<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$kd_kel= isset($_REQUEST['kd_kel']) ? $_REQUEST['kd_kel']:"kosong";
$kd_ao= isset($_REQUEST['kd_ao']) ? $_REQUEST['kd_ao']:"kd_ao kosong";
//echo $kode_ao.$cif;
//exit;




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


 <?php
 if ($kd_kel !="kosong") {
$query = pg_query("		DELETE from mobile_absen
  						WHERE mobile_absen.usr_insert in ('$kd_ao') and kd_kel in ('$kd_kel') 
   						and server_date = (select h_000001 from h_00_001)");

$query2 = pg_query("	DELETE from mobile_ao_setoran
						where mobile_ao_setoran.usr_insert in ('$kd_ao') and kd_kel in ('$kd_kel') 
						and trx_date = (select h_000001 from h_00_001)");

$query3 = pg_query("	DELETE from mobile_ao_trx
						where mobile_ao_trx.usr_insert in ('$kd_ao') and kd_kel in ('$kd_kel') 
						and server_date = (select h_000001 from h_00_001)");

$query4 = pg_query("	DELETE from mobile_setoran_sesama
						where mobile_setoran_sesama.usr_insert in ('$kd_ao') and kd_kel in ('$kd_kel') 
						and trx_date = (select h_000001 from h_00_001)");

	echo "<br><p style='text-align:center;'>";
	printf ("Mobile Absen : %d\n Nasabah", pg_affected_rows($query));
	echo "</p></br>";
	echo "<br><p style='text-align:center;'>";
	printf ("Mobile AO Setoran : %d\n Kelompok", pg_affected_rows($query2));
	echo "</p></br>";
	echo "<br><p style='text-align:center;'>";
	printf ("Mobile AO Trx : %d\n Kelompok", pg_affected_rows($query3));
	echo "</p></br>";
	echo "<br><p style='text-align:center;'>";
	printf ("Mobile Setoran Sesama : %d\n Nasabah", pg_affected_rows($query4));
	echo "</p></br>";
    
}else{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>