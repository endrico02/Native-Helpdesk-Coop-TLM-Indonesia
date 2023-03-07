
<?php
include '../conn/fungsi.php';
koneksi_db();

//echo "masuk";

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$cbg = substr($id,0,3);
	$nobuk = substr($id,3,6);
	$waktu = substr($id,9);

	// echo '<script>alert("'.$cbg.'");</script><br>';
	// echo '<script>alert("'.$nobuk.'");</script><br>';
	// echo '<script>alert("'.$waktu.'");</script><br>';

	// exit();

	$data = $_GET['data'];

	//query cek nomor bukti sudah ada atau belum
	 $cek = pg_query("SELECT * FROM t_01_003 where g_000001 = '$cbg' and t_000002 = '$data'");

	 if(pg_num_rows($cek)>0){
	 	echo '<script>window.location="alert.php"</script>';
	 	//echo "$waktu";
	 	exit();
	 }else{
	 	if(pg_query("UPDATE t_01_003 set t_000002 = '$data' where g_000001 = '$cbg' and t_000005 = 'CRI' and s_000000 like('%bulat%') and t_000002 = '$nobuk' and g_000036 = '$waktu'"))
		echo 'success';
	 }
	
}

// and g_000036 = '$waktu'
?>