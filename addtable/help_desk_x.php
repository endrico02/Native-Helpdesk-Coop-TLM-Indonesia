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
                        'url': 'addtable/helpdesk_x_update.php',
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

$no_takop= isset($_REQUEST['no_takop']) ? $_REQUEST['no_takop']:"kosong";

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
		$query = pg_query("select g_000001 as ktr,c_000001 as cif,a_000057 as nama,f_000000 as no_takop,f_000004 as pokok,f_600004 as wajib,f_600074 as total from m_06_001
								where f_000000 in ('$no_takop')
								ORDER BY a_000057;");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>CIF</th>
									<th>Nama</th>
									<th>Nomor Takop</th>
									<th>Pokok</th>
									<th>Wajib</th>
									<th>Total</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_array($query)) {
			echo '
				<tr> 
				    <td>'.$result['ktr'].'</td>
					<td>'.$result['cif'].'</td>
					<td>'.$result['nama'].'</td>
					<td>'.$result['no_takop'].'</td>
					<td>'.$result['pokok'].'</td>
					<td>'.$result['wajib'].'</td>
					<td>'.$result['total'].'</td>
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
<input name="no_takop" type="hidden" class="form-control" value="<?php echo $no_takop?>">

<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>