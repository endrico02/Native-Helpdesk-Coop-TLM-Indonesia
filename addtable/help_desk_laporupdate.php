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

 $sql =     pg_query("	update 
 							t_01_003 set t_000001 = '0', t_000002 = 'MSCM00',t_000014='3000015', g_000034 = '0000', 
 							g_000043 = current_timestamp, g_000037 = current_timestamp, g_000038 = current_timestamp

						where 
							s_000000 like ('%Mobile%') and t_000005 = 'SCM' and g_000001 in 
							('024','031','035','036','038','039','040','041','042','043','044','045','047') and t_000002 is null and t_000014 is null;");

			pg_query("	update 
							t_01_003 set t_000001 = '0', t_000002 = 'MLPD00',t_000014='1000251', 
							t_000033 = '4000085', t_000036 = '4000086', t_000032 = '2000177', g_000034 = '0000', 
							g_000043 = current_timestamp, g_000037 = current_timestamp, g_000038 = current_timestamp

						where 
							s_000000 like ('%Mobile%') and t_000005 = 'LPD' and g_000001 in
							 ('024','031','035','036','038','039','040','041','042','043','044','045','047') and t_000002 is null and t_000014 is null ;");

			pg_query("	update 
							t_01_003 set t_000002 = 'M00000',t_000014='2000036'

						where 
							s_000000 like ('%Mobile%') and t_000005 = 'SCD' and g_000001 in ('024','031','035','036','038','039','040','041','042','043','044','045','047')  and 
							t_000002 is null and t_000014 is null;");

			if($sql){printf("Updated records: %d\n", pg_affected_rows($sql));
    
}else{
    echo "kosong!";
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>