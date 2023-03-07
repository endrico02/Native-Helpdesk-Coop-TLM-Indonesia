<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_05_001 set a_000038 = '$data' where f_000000 in ('$id');"))
	echo 'success';
}
?>