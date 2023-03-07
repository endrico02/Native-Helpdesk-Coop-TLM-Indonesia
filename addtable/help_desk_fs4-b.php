<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#proses_set_fs4-b').submit(function(e){
                    e.preventDefault();
					$('#tampil_fs4-b').html('<img src="images/loading.gif"/>');
					$('#tampil_fs4-b').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_update_fs4-b.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil_fs4-b').html(html);
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
//$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
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
		$query = pg_query("SELECT * From tagihan_kelompok_tbl where norek in ('$cif') and sts_relak = '2' and sts_cetak = '0'");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <caption><h2></h2></caption>
					  <thead> 
						<tr>
							<td>No</td>
							<td>Cabang</td>
							<td>CIF</td>
							<td>Nama</td>
							<td>Status Cetak FS4</td>
							<td>Status FS4-b</td>
							<td>Frekuensi Bayar</td>
						</tr>
					</thead>
					  </tbody>";
					  $no = 1;
			// output data of each row
		while ($result = pg_fetch_object($query)) {
				$cetak = $result->sts_cetak;
				$topup = $result->sts_topup;
				$frek = $result->sts_relak;

				if($cetak == '0'){
					$sts_c = 'Tidak';
				}else{
					$sts_c = 'Cetak';
				}

				if($topup == '0'){
					$sts_t = 'Tidak';
				}else{
					$sts_t = 'Cetak';
				}

				if($frek == '1'){
					$sts_f = 'Per Minggu';
				}elseif($frek == '2'){
					$sts_f = '2 Mingguan';
				}else{
					$sts_f = '';
				}

			echo "
				<tr> 
				<td>$no</td>
				<td>$result->namacabang</td>
				<td>$result->norek</td>
				<td>$result->nama</td>
				<td>$sts_c</td>
				<td>$sts_t</td>
				<td>$sts_f</td>
				</tr> 
				";	
				$no++;				
	}
	echo "$num_rows Rows\n";
?>
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
<form id="proses_set_fs4-b" method="post">
<input type="hidden" class="col-lg-8" name="cif" value="<?=$cif;?>" required></input>
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<div id="tampil_fs4-b"> klik untuk menampilkan data </div>
</form>
<?php } else {
			  echo "Data Tidak Ditemukan! Status Nasabah Frekuensi Bayar Per Minggu atau Tercetak di FS4 ;-(";
				} ?>
</body>
</html>