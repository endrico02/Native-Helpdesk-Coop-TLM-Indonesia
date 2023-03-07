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

 $sql =     pg_query("	UPDATE tagihan_kelompok_tbl set kdstaf = m_00_001.a_000012, nama_staff = s_00_006.s_000000
						from m_00_001, s_00_006
						where tagihan_kelompok_tbl.ktr = m_00_001.g_000001 
						and m_00_001.g_000001 in 
						('024','031','035','036','038','039','040','041','042','043','044') and
						tagihan_kelompok_tbl.kdstaf <> m_00_001.a_000012 
						and m_00_001.a_000012 = s_00_006.a_000012 
						and m_00_001.c_000001 = tagihan_kelompok_tbl.norek;");


			if($sql){printf("Updated records: %d\n", pg_affected_rows($sql));
    
}else{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>