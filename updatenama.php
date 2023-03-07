<?php include ("php/tgl.php"); ?>


<?php

$cab= isset($_REQUEST['cab']) ? $_REQUEST['cab']:"kosong";
$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$nama= isset($_REQUEST['nama']) ? $_REQUEST['nama']:"kosong";
$namadepan= isset($_REQUEST['namadepan']) ? $_REQUEST['namadepan']:"kosong";
$namatengah= isset($_REQUEST['namatengah']) ? $_REQUEST['namatengah']:"kosong";
$namabelakang= isset($_REQUEST['namabelakang']) ? $_REQUEST['namabelakang']:"kosong";

$sql =      pg_query("update m_00_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_00_001 set c_000004 = '$namadepan' where c_000001 in ('$cif')");
			pg_query("update m_00_001 set c_000005 = '$namatengah' where c_000001 in ('$cif')");
			pg_query("update m_00_001 set c_000006 = '$namabelakang' where c_000001 in ('$cif')");
			pg_query("update m_01_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_01_002 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_00_007 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_03_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_05_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_06_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
			pg_query("update m_07_001 set a_000057 = '$nama' where c_000001 in ('$cif')");
	
if($sql){
    echo" <script> alert('Nama Telah Berhasil Diubah');
    window.location.href='nama.php';
    </script>";
}else{
    echo" <script> alert('Namam Anggota Gagal diubah');
    window.history.go(-1);
    </script>";
}
?>