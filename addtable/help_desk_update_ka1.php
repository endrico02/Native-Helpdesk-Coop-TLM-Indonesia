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
                        'url': 'addtable/help_desk_no_ka_update.php',
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

$no_ka= isset($_REQUEST['no_ka']) ? $_REQUEST['no_ka']:"kosong";

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
<div class="module_content">    
			<div class="row">

 <?php
		$query = pg_query("select g_000001 as ktr , s_000000 as uraian,l_000043 as no_ka , f_000023 as expired , l_000041 as tgl , l_000000 as namrek from m_02_006 
				where l_000043 in ('$no_ka')");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>Nama Rekening</th>
									<th>Nomor KA</th>
									<th>Uraian</th>
									<th>Tanggal Akhir KA</th>
									<th>Tanggal Pakai KA</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_object($query)) {
			echo '
				<tr> 
				<td>'.$result->ktr.'</td>
				<td>'.$result->namrek.'</td>
				<td>'.$result->no_ka.'</td>
				<td>'.$result->uraian.'</td>
				<td>'.$result->expired.'</td>
				<td>'.$result->tgl.'</td>

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
<input type="submit" value='UPDATE NOMOR KA'/>
<input name="no_ka" type="hidden" class="form-control" value="<?php echo $no_ka?>">

<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>