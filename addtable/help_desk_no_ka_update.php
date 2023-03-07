<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$no_ka= isset($_REQUEST['no_ka']) ? $_REQUEST['no_ka']:"kosong";

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
 if ($no_ka !="kosong") {
   $query2 = pg_query("update m_02_006 set l_000041 = h_00_001.h_000001 from h_00_001 where m_02_006.l_000043 in ('$no_ka');");
	printf ("Updated records: %d\n", pg_affected_rows($query2));
    
}ELse{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>