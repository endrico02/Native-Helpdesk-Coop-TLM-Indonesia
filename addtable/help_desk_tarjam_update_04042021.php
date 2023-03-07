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
		<td>NAMA</td>
		<td >STATUS</td>
		<td>PIUTANG</td>
		<td>JAMINAN</td>
	</tr>
</thead>
  </tbody>
 <?php
						$query2 = pg_query("update m_01_002 set a_000001 = 9
											where trim(c_000001) in ('$cif');");
						$query = pg_query("select m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, CASE
            WHEN m_01_002.a_000001 = '9' THEN 'TARJAM'
            ELSE 'BELUM DISET TARJAM'
        	END AS status, m_01_002.f_000004 as piutang, abs(m_03_001.f_000054) as jaminan from m_01_002,m_03_001
											where  m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif')
											order by m_01_002.a_000057");
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->status</td>
								<td>$result->piutang</td>
								<td>$result->jaminan</td>
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