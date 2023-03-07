<?php
include '../conn/fungsi.php';
koneksi_db();

if($_GET['id'] and $_GET['data'])
{
	$id = $_GET['id'];
	$data = $_GET['data'];
	if(pg_query("update m_02_006 set l_000041 = h_00_001.h_000001 from h_00_001 where m_02_006.l_000043 = ('$id');"))
	echo 'success';
}
?>