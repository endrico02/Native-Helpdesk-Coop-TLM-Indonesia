<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#Input2').submit(function(e){
                    e.preventDefault();
					$('#content2').html('<img src="images/loading.gif"/>');
					$('#content2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht25_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content2').html(html);
                        }
                    });
                });
            });
			
        </script>
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
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

 <?php
 
 //g_000001 not in ('031','036','035','019','044','047','046','048','049')
 
		$query = pg_query("select
m_01_001.c_000001 as cif,
m_01_002.a_000057 as nama,
m_01_002.f_000074 as plafond, 
m_01_002.f_000069 as hak_tarik, 
m_01_001.f_000037 as provisi, 
(m_01_002.f_000074*2.5/100):: numeric(15,0) as provisi_new,
abs((m_01_002.f_000074*2.5/100):: numeric(15,2) - m_01_002.f_000074) as ht_new

from m_01_001, m_01_002, h_00_001
where m_01_001.f_000021 = h_00_001.h_000001 and m_01_001.c_000001 = m_01_002.c_000001 and m_01_001.g_000001 not in ('007','009','011','014','015','018','022','023','024','026','027','028','029','030','034','041','042','043','045','046','047','048','049','050','031','036','035','019','044') 
and m_01_001.a_000001 = '6' and m_01_001.p_000002 = '18'
and m_01_001.a_000001 = m_01_002.a_000001
and abs((m_01_002.f_000074*2.5/100):: numeric(15,2) - m_01_002.f_000074) <> m_01_002.f_000069
and (m_01_002.f_000074*2.5/100):: numeric(15,0) <> m_01_001.f_000037
and m_01_001.c_000001 not in (select norek from tagihan_kelompok_tbl where sts_diskon = '1')
order by m_01_001.c_000001
;");
		$num_rows = pg_num_rows($query);
		echo "$num_rows Rows";
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
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
					  </tbody>";
			// output data of each row
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
						
	} 
?>
					
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
<form id="Input2" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<div id="content2"> klik untuk menampilkan data </div>
</form>
<?php } else {
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>