<!DOCTYPE html>
<html>
<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }
</style>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
$status= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
//echo $cabang.$cif.$status;
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
    height: 50px;
}
td {
    padding: 5px;
}
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
</style>
</head>
<body>

<table style="width:100%">
  <caption><h2></h2></caption>
  <thead> 
	<tr>
		<td >CIF</td>
		<td>Nama</td>
		<td>Status</td>
		<td>Piutang</td>
	</tr>
</thead>
  </tbody>
 <?php
						$query2 = pg_query("UPDATE m_01_002 set a_000001 = 9
											where trim(c_000001) in ('$cif') and a_000001 <> '8'");

						$query = pg_query("SELECT * FROM m_01_002 WHERE trim(c_000001) in ('$cif') and a_000001 = '8'");
 						$num_rows = pg_num_rows($query);

 						$query3 = pg_query("SELECT * FROM m_01_002 WHERE trim(c_000001) in ('$cif') and a_000001 <> '8'");
 						$num_rows3 = pg_num_rows($query3);

						// $query = pg_query("SELECT m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, m_01_002.a_000001 as status, m_01_002.f_000004 as piutang, m_03_001.f_000054 from m_01_002,m_03_001
						// 					where  m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif') and a_000001 = '8'
						// 					order by m_01_002.a_000057");
						// $num_rows = pg_num_rows($query);

						// $query3 = pg_query("SELECT m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, m_01_002.a_000001 as status, m_01_002.f_000004 as piutang, m_03_001.f_000054 from m_01_002,m_03_001
						// 					where  m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif') and a_000001 <> '8'
						// 					order by m_01_002.a_000057");
						// $num_rows3 = pg_num_rows($query3);

						while ($result = pg_fetch_object($query3)) {
							echo "
								<tr> 
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->a_000001</td>
								<td>$result->f_000004</td>
								</tr> 
								";			
					}
					if($num_rows3>0){
							echo "$num_rows3 Data diproses ( <i>$num_rows Data tidak diproses, karna merupakan nasabah lari</i> ) ;-(";
					}else{
							echo "$num_rows3 Data diproses";
					} 
?>
					
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
</form>
</body>
</html>