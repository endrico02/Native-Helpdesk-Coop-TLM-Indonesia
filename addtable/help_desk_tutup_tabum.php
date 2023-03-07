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
                        'url': 'addtable/help_desk_tutup_tabum_update.php',
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
		$query = pg_query("select g_000001 as ktr,c_000001 as cif,f_000000 as rek,a_000057,a_000018 as tgl_penempatan, a_000031 as pajak, a_000056 as bunga,f_000004 as saldo,a_000038 as dana_blokir from m_05_001
							where f_000000 in ('$cif');");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
						<tr>
							<th>Cabang</th>
							<th>CIF</th>
							<th>#rekening</th>
							<th>nama</th>
							<th>tgl.penempatan</th>
							<th>Pajak</th>
							<th>Bunga</th>
							<th>saldo</th>
							<th>blokir</th>
						</tr>
					</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_object($query)) {
			echo '
				<tr> 
				<td>'.$result->ktr.'</td>
				<td>'.$result->cif.'</td>
				<td>'.$result->rek.'</td>
				<td>'.$result->a_000057.'</td>
				<td>'.date('d-m-Y', strtotime($result->tgl_penempatan)).'</td>
				<td>'.$result->pajak.'</td>
				<td>'.$result->bunga.'</td>
				<td align="right">'.ABS(number_format($result->saldo, 2, ',', '.')).'</td>
				<td>'.$result->dana_blokir.'</td>
				</tr> 
				';
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>

<form id="Input2" method="post">
<input type="submit" value='proses tutup'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
<input name="cabang" type="hidden" class="form-control" value="<?php echo $cabang?>">
<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>