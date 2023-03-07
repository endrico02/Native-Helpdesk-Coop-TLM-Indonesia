<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
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
							<td>CIF</td>
							<td>nama</td>
							<td>plafond</td>
							<td>Hak Tarik</td>
							<td>Provisi</td>
							<td>Hak Tarik Baru</td>
							<td>Provisi Baru</td>
	</tr>
</thead>
  </tbody>
 <?php
						$query2 = pg_query("update m_01_001 set f_000037 = (m_01_002.f_000074*1/100):: numeric(15,0)
from m_01_002, h_00_001
where m_01_001.f_000021 = h_00_001.h_000001 and m_01_001.c_000001 = m_01_002.c_000001 and m_01_001.g_000001 in ('036','035','019','046') 
and m_01_001.a_000001 = '6'
and m_01_001.a_000001 = m_01_002.a_000001
and (m_01_002.f_000074*1/100):: numeric(15,0) <> m_01_001.f_000037


;");

						$query2 = pg_query("update m_01_002 set f_000069 = abs((m_01_002.f_000074*1/100):: numeric(15,2) - m_01_002.f_000074)
from m_01_001, h_00_001
where m_01_001.f_000021 = h_00_001.h_000001 and m_01_001.c_000001 = m_01_002.c_000001 and m_01_001.g_000001 in ('036','035','019','046') 
and m_01_001.a_000001 = '6'
and m_01_001.a_000001 = m_01_002.a_000001
and abs((m_01_002.f_000074*1/100):: numeric(15,2) - m_01_002.f_000074) <> m_01_002.f_000069

;");

						$query2 = pg_query("insert into m_00_006 (g_000001,g_000002,c_000001,a_000057,c_000002)
select g_000001,g_000002,c_000001,a_000057,c_000002
from m_00_001
where g_000001 in ('035','036') and c_000001 not in(select c_000001 from m_00_006 where g_000001 in ('035','036'));");

	$query2 = pg_query("update m_00_006
set c_000059 ='150000', c_000060 = '225000', c_000061 = '725000', c_000062 = '600000', c_000063 ='500000'
where c_000059 is null and g_000001 in ('035','036');");





						$query = pg_query("select
m_01_001.c_000001 as cif,
m_01_002.a_000057 as nama,
m_01_002.f_000074 as plafond, 
m_01_002.f_000069 as hak_tarik, 
m_01_001.f_000037 as provisi, 
(m_01_002.f_000074*1/100):: numeric(15,0) as provisi_new,
abs((m_01_002.f_000074*1/100):: numeric(15,2) - m_01_002.f_000074) as ht_new

from m_01_001, m_01_002, h_00_001
where m_01_001.f_000021 = h_00_001.h_000001 and m_01_001.c_000001 = m_01_002.c_000001 and m_01_001.g_000001 in ('036','035','019','046') 
and m_01_001.a_000001 = '6'
and m_01_001.a_000001 = m_01_002.a_000001
and (m_01_002.f_000074*1/100):: numeric(15,0) = m_01_001.f_000037
and abs((m_01_002.f_000074*1/100):: numeric(15,2) - m_01_002.f_000074) = m_01_002.f_000069

order by m_01_001.c_000001
;");
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->plafond</td>
								<td>$result->hak_tarik</td>
								<td>$result->provisi</td>
								<td>$result->ht_new</td>
								<td>$result->provisi_new</td>
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