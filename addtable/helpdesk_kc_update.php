<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");

include '../conn/fungsi.php';
koneksi_db();

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


 					$sql =      pg_query("update 
 												m_00_007 set c_000014 = substring (c_000014 , 1,9) 
										  where 
										  		length (c_000014) > 10 and a_000003 = '97' ;");

								pg_query("update 
												m_00_009 set c_000014 = substring (c_000014 , 1,9) 
										  where 
										  		length (c_000014) > 10 ;");
			printf ("Updated records: %d\n", pg_affected_rows($sql));
	
	?>
			
	<div class="clear"></div>
						
				</div>

 <?php
?>
</body>
</html>


  