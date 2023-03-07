<?php
include '../conn/fungsi.php';
koneksi_db();


if(isset($_GET['id']) and isset($_GET['data']))
{
	$id3 = $_GET['id'];
	$data = $_GET['data'];
	
	if(pg_query("update m_01_002 set a_000001 = '$data' where c_000001 = ('$id3');"))
	echo 'success';
}
?>