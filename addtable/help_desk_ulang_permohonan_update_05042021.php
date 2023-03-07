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

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"cif kosong";
$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
//echo $cabang.$cif;
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
		<td>cabang</td>
		<td >nama</td>
		<td>status I</td>
		<td>status II</td>
	</tr>
</thead>
  </tbody>
 <?php
						$query2 = pg_query("UPDATE m_00_007 set a_000003 = 99, s_000076 = 'Z'
											where trim(c_000001) in (SELECT c_000001 from m_01_002 where trim(c_000001) in ('$cif') and a_000001<>'8')");

						$query = pg_query("SELECT DISTINCT(c_000001) from m_00_007
										   where trim(c_000001) in (SELECT c_000001 from m_01_002 where trim(c_000001) in ('$cif') and a_000001<>'8')");
						$num_rows = pg_num_rows($query);

						$query3 = pg_query("SELECT * from m_00_007
										   where trim(c_000001) in (SELECT c_000001 from m_01_002 where trim(c_000001) in ('$cif') and a_000001 <> '8') ORDER BY c_000001, g_000007");
						$num_rows3 = pg_num_rows($query3);

						$query4 = pg_query("SELECT DISTINCT(c_000001) from m_00_007
										   where trim(c_000001) in (SELECT c_000001 from m_01_002 where trim(c_000001) in ('$cif') and a_000001 = '8')");
						$num_rows4 = pg_num_rows($query4);

						$query5 = pg_query("SELECT * from m_00_007
										   where trim(c_000001) in (SELECT c_000001 from m_01_002 where trim(c_000001) in ('$cif') and a_000001 = '8')");
						$num_rows5 = pg_num_rows($query5);

						
						while ($result = pg_fetch_object($query3)) {
							echo "
								<tr> 
								<td>$result->g_000001</td>
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->a_000003</td>
								<td>$result->s_000076</td>
								</tr> 
								";
										
					}
					if($num_rows>0){
							echo "$num_rows Data diproses ( <i>$num_rows4 Data tidak diproses, karna merupakan nasabah lari</i> ) ;-(";
					}else{
							echo "$num_rows Data diproses";
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