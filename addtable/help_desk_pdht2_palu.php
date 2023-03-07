<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#proses2_palu').submit(function(e){
                    e.preventDefault();
					$('#tampil2_palu').html('<img src="images/loading.gif"/>');
					$('#tampil2_palu').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht2_update_palu.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil2_palu').html(html);
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
		$query = pg_query("select
m_01_001.c_000001 as cif,
m_01_002.a_000057 as nama,
m_01_002.f_000074 as plafond, 
m_01_002.f_000069 as hak_tarik, 
m_01_001.f_000037 as provisi, 
(m_01_002.f_000074*2/100):: numeric(15,0) as provisi_new,
abs((m_01_002.f_000074*2/100):: numeric(15,2) - m_01_002.f_000074) as ht_new

from m_01_001, m_01_002, h_00_001
where m_01_001.f_000021 = h_00_001.h_000001 and m_01_001.c_000001 = m_01_002.c_000001 and m_01_001.g_000001 in ('031','044','047','046','048','049')
and m_01_001.a_000001 = m_01_002.a_000001
and m_01_001.c_000001 in ('$cif')

and abs((m_01_002.f_000074*2/100):: numeric(15,2) - m_01_002.f_000074) <> m_01_002.f_000069
and (m_01_002.f_000074*2/100):: numeric(15,0) <> m_01_001.f_000037
order by m_01_001.c_000001
;");
		$num_rows = pg_num_rows($query);
		echo "$num_rows Rows";
		$no = 1;
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <caption><h2></h2></caption>
					  <thead> 
						<tr>
							<td>No</td>
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
				<td>$no</td>
				<td>$result->cif</td>
				<td>$result->nama</td>
				<td>$result->plafond</td>
				<td>$result->hak_tarik</td>
				<td>$result->provisi</td>
				<td>$result->ht_new</td>
				<td>$result->provisi_new</td>
				</tr> 
				";	
				$no++;					
	} 
?>
				</tbody>
				<div class="clear"></div>
				</table> 
				<hr>
		</div>

</table>
<form id="proses2_palu" method="post">
<input type="hidden" class="col-lg-8" name="cif" value="<?=$cif;?>" required></input>
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<div id="tampil2_palu"> klik untuk menampilkan data </div>
</form>
<?php } else {
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>