<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";

//echo $cabang.$cif;



?>
<head>
<style>
			table, td, th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			
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
		
		tr:hover{background-color:#f5f5f5}
	</style>
</head>
<body>


 <?php

 $sql =     pg_query("	UPDATE m_00_001 set c_100025 = '1' where c_000001 in ('$cif') ;");


			if($sql){printf("Updated records: %d\n Anggota", pg_affected_rows($sql));
    
}else{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>