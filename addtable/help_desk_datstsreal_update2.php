<?php
include '../conn/fungsi.php';
koneksi_db();

if(isset($_GET['id']) and isset($_GET['data']))
{
	$id2 = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_01_001 set a_000001 = '$data' where c_000001 = ('$id2');"))
	echo 'success';
}
?>