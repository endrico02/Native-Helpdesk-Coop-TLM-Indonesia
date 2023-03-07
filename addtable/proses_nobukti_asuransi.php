<?php
include '../conn/fungsi.php';
koneksi_db();
echo '<script>alert("awal");</script>';
if($_GET['id'] and $_GET['data'])	
{
	$id = $_GET['id'];
	$norek = substr($id,0,10);
	$nobuk = substr($id,10,6);
	$kd_cab = substr($id,0,3);
	$waktu = substr($id,16);
	$data = $_GET['data'];

	//query cek nomor bukti sudah ada atau belum
	 $cek = pg_query("SELECT * FROM t_01_003 where g_000001 = '$kd_cab' and t_000002 = '$data'");

	 if(pg_num_rows($cek)>0){
	 	exit();
	 }else{
		if(pg_query("UPDATE t_01_003 set t_000002 = '$data' where t_000005 = 'CRI' and s_000000 like ('%$norek%') and t_000002 = '$nobuk' and g_000036 = '$waktu'"))
		echo 'success';
	}
}
?>