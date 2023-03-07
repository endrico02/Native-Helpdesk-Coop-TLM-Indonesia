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
		<td>nama</td>
		<td >status</td>
		<td>piutang</td>
	</tr>
</thead>
  </tbody>
 <?php
						$query2 = pg_query("update m_01_002 set a_000001 = 9
											where trim(c_000001) in ('$cif')");
						$query3 = pg_query("update m_01_001 set a_000001 = 9
											where trim(c_000001) in ('$cif')");
						$query = pg_query("select c_000001 as cif, a_000057 as nama, a_000001 as status, p_000002 as produk,f_000004 as piutang from m_01_002
						where trim(c_000001) in ('$cif')");
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->status</td>
								<td>$result->piutang</td>
								</tr> 
								";
										
						} $num_rows = pg_num_rows($query);
						 
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