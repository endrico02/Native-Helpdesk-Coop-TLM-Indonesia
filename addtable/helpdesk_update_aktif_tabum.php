<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
//$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
//$status= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
//echo $cabang.$cif.$status;
//exit;

//echo '<script>alert("'.$cif.'");</script>';

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

<table style="width:100%">
  <caption><h2></h2></caption>
  <thead> 
	<tr>
		<td>No</td>
		<td>CIF</td>
		<td>nama</td>
		<td>No Tabum</td>
		<td>Status</td>
	</tr>
</thead>
  </tbody>
 <?php
$ubah = pg_query("UPDATE m_05_001 set a_000003 = '1' where f_000000 in ('$cif')");

$query = pg_query("SELECT * from m_05_001 where f_000000 in ('$cif')");
$no = 1;
						while ($result = pg_fetch_object($query)) {
							if($result->a_000003 == 1){
								$stat = 'Aktif';
							}elseif($result->a_000003 == 9){
								$stat = 'Tidak Aktif';
							}

							echo "
								<tr> 
								<td>$no</td>
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->f_000000</td>
								<td>$stat</td>
								</tr> 
								";
								$no++;
										
					} $num_rows = pg_num_rows($query);
					 echo "$num_rows Rows\n";
					 unset($cif);
					 unset($ubah);
					 unset($stat);
					 unset($query);
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