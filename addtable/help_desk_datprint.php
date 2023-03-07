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
                        'url': 'addtable/help_desk_pindah_datprint_update.php',
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

$cbg= isset($_REQUEST['cbg']) ? $_REQUEST['cbg']:"kosong";
$tgl= isset($_REQUEST['tgl']) ? $_REQUEST['tgl']:"tgl kosong";
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



<article class="module width_full">


	<section>
	 <div class="table-responsive">
	
 <?php
		
		$query = pg_query("	SELECT a_000057 as nama, t_000013 as notab , a_000025 as flag, t_000003 as tgl from m_05_005
							where g_000001 in ('$cbg') and t_000003 < '$tgl' and a_000025 = '0'
							group by nama,notab,flag,tgl 
							order by tgl,nama;");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
						<tr>
							<th width='5px'>No</th>
							<th>Nasabah</th>
							<th>No. Tabum</th>
							<th>Status</th>
							<th>Tanggal</th>
						</tr>
					</thead>
					  </tbody>";

					    $no     = 1;
			// output data of each row
		while ($result = pg_fetch_object($query)) {
			echo '
				<tr>
				<td>'.$no.'</td> 
				<td>'.$result->nama.'</td>
				<td>'.$result->notab.'</td>
				<td>'.$result->flag.'</td>
				<td>'.$result->tgl.'</td>
				</tr> 
				';
				$no++;
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				</div>
				</div>
				</div>
				</div>
		
<br>
<form id="aidi" method="post">
<input type="submit" value='UPDATE TANGGAL'/>
<input name="cbg" type="hidden" class="form-control" value="<?php echo $cbg?>">
 <input name="tgl" type="hidden" class="form-control" value="<?php echo $tgl?>">
<div id="tampil"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
<p style="text-align:center;"><font size="2">1.  Data Print Buku Mobile </font></p>
<p style="text-align:center;"><font size="2">2.  Masukan Kode Cabang dan Tanggal Yang Diminta Cabang </font></p>
</html>