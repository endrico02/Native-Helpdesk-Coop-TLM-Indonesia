<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_00_001 set a_000060 = '$data' where trim(c_000001) in ('$id');"))
	echo 'success';
}
?>