
<?php
include '../conn/fungsi.php';
koneksi_db();

//echo "masuk";

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$norek = substr($id,0,10);
	$nobuk = substr($id,10,6);
	$len = substr($id,16,1);
	$len_waktu = substr($id,17,$len);
	$a = 17+$len;
	$waktu = substr($id,$a,$len_waktu);
	$end = $a+$len_waktu;
	$ket= substr($id,$end);
	$kd_cab = substr($id,0,3);
	

	//echo "<script>alert('".$end."');</script>";
	//exit();


	$data = $_GET['data'];

	 	if(pg_query("UPDATE t_01_003 set s_000000 = '$data' where g_000001 = '$kd_cab' and t_000005 = 'CRI' and t_000002 = '$nobuk' and g_000036 = '$waktu' and s_000000 = '$ket'"))
		echo 'success';
}

// and g_000036 = '$waktu'
?>