
<?php
include '../conn/fungsi.php';
koneksi_db();

//echo "masuk";

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$norek = substr($id,0,10);
	$nobuk = substr($id,10,6);
	$kd_cab = substr($id,0,3);
	$waktu = substr($id,16);

	$data = $_GET['data'];

	 	if(pg_query("UPDATE t_01_003 set s_000000 = '$data' where t_000013 = '$norek' and t_000005 = 'LPD' and t_000002 = '$nobuk' and g_000036 = '$waktu'"))
		echo 'success';
}

// and g_000036 = '$waktu'
?>