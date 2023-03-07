<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];

	//cek apakah kode ao yang dimasukan ada ditabel ao
	$cek = pg_query("SELECT * FROM s_00_006 WHERE a_000012 = '$data'");
	if(pg_num_rows($cek)<=0){
		echo '<script>
				alert("Silahkan masukan ulang Kode AO!! Kode AO tidak ada dalam daftar AO");
				history.go(-1);
			</script>';
			exit();
	}else{
		pg_query("update m_01_001 set a_000012 = '$data' where c_000001 in ('$id')");
	    pg_query("update m_00_001 set a_000012 = '$data' where c_000001 in ('$id')");
	
	    echo 'success';
	    exit();
	}
}
?>