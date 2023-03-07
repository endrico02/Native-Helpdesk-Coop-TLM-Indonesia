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
						$query2 = pg_query("update m_00_007 set a_000003 = 99, s_000076 = 'Z'
											where trim(c_000001) in ('$cif');");
						$query = pg_query("select * from m_00_007
										   where trim(c_000001) in ('$cif')");
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->g_000001</td>
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->a_000003</td>
								<td>$result->s_000076</td>
								</tr> 
								";
										
					} $num_rows = pg_num_rows($query);
					 echo "$num_rows Rows\n";
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