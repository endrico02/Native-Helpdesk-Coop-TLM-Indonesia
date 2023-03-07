<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_01_001 set f_000037 = '$data' where c_000001 = ('$id');"))
	echo 'success';
}
?>