<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();



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

 $sql =     pg_query("	UPDATE tagihan_kelompok_tbl set kd_kel = m_00_001.a_000060, 
 						nama_kelompok = m_00_002.a_000061
						from m_00_001, m_00_002
						where tagihan_kelompok_tbl.kd_kel is null and m_00_001.a_000060 = m_00_002.a_000060 and 
						m_00_001.c_000001 = tagihan_kelompok_tbl.norek; ");


			if($sql){printf("Updated records: %d\n", pg_affected_rows($sql));
    
}else{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>