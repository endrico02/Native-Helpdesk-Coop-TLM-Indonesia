<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$kode_ao= isset($_REQUEST['kode_ao']) ? $_REQUEST['kode_ao']:"kode_ao kosong";
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
 if ($cif !="kosong") {
   $query2 = pg_query("update m_00_001 set a_000012 = '$kode_ao'
					   where c_000001 in ('$cif');");
   $query  = pg_query("update m_01_001 set a_000012 = '$kode_ao'
					   where c_000001 in ('$cif');");
	
	printf ("Updated m_01_001 records: %d\n", pg_affected_rows($query2));
	echo "<br>";
	printf ("Updated m_00_001 records: %d\n", pg_affected_rows($query));
    
}ELse{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>