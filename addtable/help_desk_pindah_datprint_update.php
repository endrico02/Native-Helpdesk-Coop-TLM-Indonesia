<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();


$cbg= isset($_REQUEST['cbg']) ? $_REQUEST['cbg']:"kosong";
$tgl= isset($_REQUEST['tgl']) ? $_REQUEST['tgl']:"tgl kosong";
//echo $kode_ao.$cif;
//exit;




?>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 35px;
	background-color:#4CAF50;
	text-align: center;
	color: white;
}
td {
    padding: 10px;
}
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
tr:hover{background-color:#f5f5f5}
</style>
</head>
<body>


 <?php
 if ($cbg !="kosong") {
   $query2 = pg_query("		UPDATE m_05_005 set a_000025 = '1'
							where g_000001 in ('$cbg') and t_000003 < '$tgl' and a_000025 = '0';");
   
	
	printf ("Updated m_05_005 records: %d\n", pg_affected_rows($query2));
	
}eLse{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>