<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update o_00_002 set a_000004 = '$data' where o_000001 = ('$id');"))
	echo 'success';
}
?>