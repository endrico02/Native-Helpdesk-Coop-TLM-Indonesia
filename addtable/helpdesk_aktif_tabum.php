<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#proses_aktif_takop').submit(function(e){
                    e.preventDefault();
					$('#tampil1_takop').html('<img src="images/loading.gif"/>');
					$('#tampil1_takop').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/helpdesk_update_aktif_tabum.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil1_takop').html(html);
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
		$query = pg_query("SELECT * from m_05_001 where f_000000 in ('$cif')");
		$num_rows = pg_num_rows($query);
		echo "$num_rows Rows";
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
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
					  </tbody>";
					  $no = 1;
			// output data of each row
		while ($result = pg_fetch_object($query)) {

			if($result->a_000003 == 1){
				$stat = 'Aktif';
			}elseif($result->a_000003 == 9){
				$stat = 'Tidak Aktif';
			}elseif($result->a_000003 == 7){
				$stat = 'Jatuh Tempo';
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
	} 
?>
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
<form id="proses_aktif_takop" method="post">
<input type="hidden" class="col-lg-8" name="cif" value="<?=$cif;?>" required></input>
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<div id="tampil1_takop"> klik untuk memproses data </div>
</form>
<?php } else {
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>