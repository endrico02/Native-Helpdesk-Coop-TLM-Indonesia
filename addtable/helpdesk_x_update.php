<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$no_takop= isset($_REQUEST['no_takop']) ? $_REQUEST['no_takop']:"kosong";

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
 if ($no_takop !="kosong") {
   $query2 = pg_query("update m_06_001 set f_600074 = f_000004+f_600004 where f_000000 in ('$no_takop');");
   
   $query = pg_query("select g_000001 as ktr,c_000001 as cif,a_000057 as nama,f_000000 as no_takop,f_000004 as pokok,f_600004 as 				wajib,f_600074 as total from m_06_001 where f_000000 in ('$no_takop') ORDER BY a_000057;");
       		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>CIF</th>
									<th>Nama</th>
									<th>Nomor Takop</th>
									<th>Pokok</th>
									<th>Wajib</th>
									<th>Total</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_array($query)) {
			echo '
				<tr> 
				    <td>'.$result['ktr'].'</td>
					<td>'.$result['cif'].'</td>
					<td>'.$result['nama'].'</td>
					<td>'.$result['no_takop'].'</td>
					<td>'.$result['pokok'].'</td>
					<td>'.$result['wajib'].'</td>
					<td>'.$result['total'].'</td>
				</tr> 
				';
						
	} 

   
}
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>



 <!-- <?php
					// 	$query2 = pg_query("update m_01_002 set a_000001 = 1
					// // 					   where trim(c_000001) in ('$cif');");
					// 	$query = pg_query("select c_000001 as cif, a_000057 as nama, a_000001 as status, f_000004 as piutang from m_01_002 
					// 			where trim(c_000001) in ('$cif');");
					// 	while ($result = pg_fetch_object($query)) {
					// 		echo "
					// 			<tr> 
					// 			<td>$result->cif</td>
					// 			<td>$result->nama</td>
					// 			<td>$result->status</td>
					// 			<td>$result->piutang</td>
					// 			</tr> 
					// 			";
										
					// } $num_rows = pg_num_rows($query);
					//  echo "$num_rows Rows\n";
?> -->