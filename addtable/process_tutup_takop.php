<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_06_001 set f_600074 = '$data' where f_000000 = ('$id');"))
	echo 'success';
}
?>