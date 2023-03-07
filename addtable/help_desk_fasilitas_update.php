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

						$query3 = pg_query("UPDATE m_01_001 set a_000001 = 9
											where trim(c_000001) in (SELECT c_000001 FROM m_01_002 where c_000001 in ('$cif') and a_000001 <> '8')");

						$query = pg_query("SELECT c_000001 as cif, a_000057 as nama, a_000001 as status, p_000002 as produk,f_000004 as piutang from m_01_002
						where trim(c_000001) in ('$cif') and a_000001<>'8'");
						$num_rows = pg_num_rows($query);

						$query4 = pg_query("SELECT c_000001 as cif, a_000057 as nama, a_000001 as status, p_000002 as produk,f_000004 as piutang from m_01_002
						where trim(c_000001) in ('$cif') and a_000001='8'");
						$num_rows4 = pg_num_rows($query4);

						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->status</td>
								<td>$result->piutang</td>
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