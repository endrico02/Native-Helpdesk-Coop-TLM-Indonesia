<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_01_002 set f_000069 = '$data' where c_000001 = ('$id');"))
	echo 'success';
}
?>