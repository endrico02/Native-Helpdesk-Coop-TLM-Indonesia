<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
//echo $cabang.$cif;




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
   $query2 = pg_query("update m_05_001 set a_000031 = 0, a_000056 = 0 ,a_000030 = 0
	where f_000000 in ('$cif');");
	printf ("Updated records: %d\n", pg_affected_rows($query2));
    
}ELse{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>