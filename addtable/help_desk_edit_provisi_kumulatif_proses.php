<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$pprovisi= isset($_REQUEST['pprovisi']) ? $_REQUEST['pprovisi']:"pprovisi kosong";
//echo $pprovisi.$cif;
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
   $query2 = pg_query("UPDATE m_01_001 a 
       				   set f_000037 =  ('$pprovisi' * plafon)
							FROM (
							       SELECT 
							           m_01_002.c_000001,m_01_002.f_000074 as plafon
							        FROM m_01_002
								WHERE  c_000001 in ('$cif')
							       ) AS subquery
							       WHERE a.c_000001 in ('$cif');");
   $query  = pg_query("UPDATE m_01_002 a 
				       set f_000069 =  plafon - ('$pprovisi' * plafon)
							FROM (
							       SELECT 
							           m_01_002.c_000001,m_01_002.f_000074 as plafon
							        FROM m_01_002
								WHERE  c_000001 in ('$cif')
							       ) AS subquery
							       WHERE a.c_000001 in ('$cif');");
	
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