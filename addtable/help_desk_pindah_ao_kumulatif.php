<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#aidi').submit(function(e){
                    e.preventDefault();
					$('#tampil').html('<img src="images/loading_2.gif"/>');
					$('#tampil').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pindah_ao_kumulatif_proses.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil').html(html);
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
$kode_ao= isset($_REQUEST['kode_ao']) ? $_REQUEST['kode_ao']:"kode_ao kosong";
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

 <?php
		$ao = pg_query ("select s_000000 from s_00_006 where a_000012 = '$kode_ao'");
		$ao_baru = pg_fetch_object($ao);
		$nama_aobaru = $ao_baru->s_000000;
		$query = pg_query("select m_00_001.g_000001, c_000001 as cif, a_000057 as nasabah, m_00_001.a_000012 as kode_ao, s_00_006.s_000000 as ao from m_00_001, s_00_006
							where s_00_006.a_000012 = m_00_001.a_000012 AND c_000001 in ('$cif');");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
						<tr>
							<th>Cabang</th>
							<th>CIF</th>
							<th>nama nasabah</th>
							<th>AO saat ini</th>
							<th>pindah ke AO</th>
						</tr>
					</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_object($query)) {
			echo '
				<tr> 
				<td>'.$result->g_000001.'</td>
				<td>'.$result->cif.'</td>
				<td>'.$result->nasabah.'</td>
				<td>'.$result->kode_ao.' - '.$result->ao.'</td>
				<td>'.$kode_ao.' - '.$nama_aobaru.'</td>
				</tr> 
				';
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>

<form id="aidi" method="post">
<input type="submit" value='proses pindah'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
 <input name="kode_ao" type="hidden" class="form-control" value="<?php echo $kode_ao?>">
<div id="tampil"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>