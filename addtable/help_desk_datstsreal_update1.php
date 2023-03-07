<?php
include '../conn/fungsi.php';
koneksi_db();


if(isset($_GET['id']) and isset($_GET['data']))
{
	$id1 = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_01_002 set f_000004 = '$data' where c_000001 = ('$id1');"))
	echo 'success';
}
?>