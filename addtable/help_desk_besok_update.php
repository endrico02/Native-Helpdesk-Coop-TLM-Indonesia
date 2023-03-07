<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

//$no_ka= isset($_REQUEST['no_ka']) ? $_REQUEST['no_ka']:"kosong";

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
 
 $query2 = pg_query("		UPDATE 		mobile_absen set server_date = (select h_000003 from h_00_001), 
   								   		usr_insert_ts = (select h_000003 from h_00_001)
							where  		server_date = (select h_000001 from h_00_001) 
										and usr_insert in (select kdstaf from tagihan_kelompok_tbl
										where 
										ktr in ('024','031','035','036','038','039','040','040','041','042',
										'043','044') 
										and substr(tgl_tagih,1,1)::double precision = 
										(SELECT date_part('dow',h_000001) from h_00_001)
										and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 
										where mobile_cashier_trx.trx_date = h_00_001.h_000001)
							group by 	kdstaf
							order by 	kdstaf);");

   $query2 = pg_query("		UPDATE 		mobile_ao_setoran set trx_date = 
   										(select h_000003 from 
   										h_00_001), usr_insert_ts = (select h_000003 from h_00_001)
							where 		trx_date = (select h_000001 from h_00_001) and usr_insert in (
										select kdstaf from tagihan_kelompok_tbl 
										where 
										ktr in ('024','031','035','036','038','039','040','040','041','042',
										'043','044') 
							 			and substr(tgl_tagih,1,1)::double precision = 
							 			(SELECT date_part('dow',h_000001) from h_00_001)
										and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 
										where mobile_cashier_trx.trx_date = h_00_001.h_000001)
							group by 	kdstaf
							order by 	kdstaf);");

   	$query2 = pg_query("	UPDATE 		mobile_ao_trx set server_date = 
   										(select h_000003 from 	
   										h_00_001), usr_insert_ts = (select h_000003 from h_00_001), absen_ts =
   										(select h_000003 from h_00_001), sesama_ts = 
   										(select h_000003 from h_00_001) 
   							where 		server_date = (select h_000001 from h_00_001) 
   										and usr_insert in (select kdstaf from tagihan_kelompok_tbl
										where 
										ktr in ('024','031','035','036','038','039','040','040','041','042',
										'043','044')  
										and substr(tgl_tagih,1,1)::double precision = 
										(SELECT date_part('dow',h_000001) from h_00_001)
										and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 
										where mobile_cashier_trx.trx_date = h_00_001.h_000001)
							group by 	kdstaf
							order by 	kdstaf);");

   	$query2 = pg_query("	UPDATE 		mobile_setoran_sesama set trx_date = 
   										(select h_000003 from h_00_001), usr_insert_ts = 
   										(select h_000003 from h_00_001)
							where 		trx_date = (select h_000001 from h_00_001) 
										and usr_insert in (select kdstaf from tagihan_kelompok_tbl 
										where 
										ktr in ('024','031','035','036','038','039','040','040','041','042',
										'043','044') 
										and substr(tgl_tagih,1,1)::double precision = 
										(SELECT date_part('dow',h_000001) from h_00_001) 
										and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 
										where mobile_cashier_trx.trx_date = h_00_001.h_000001)
							group by 	kdstaf
							order by 	kdstaf);");



   if($query2) {
	printf ("Updated records: %d\n Anggota", pg_affected_rows($query2));
    }
    else {echo"Tidak Ada Data Yang di Update";

}

	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>