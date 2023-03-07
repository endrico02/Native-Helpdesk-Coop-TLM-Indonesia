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
                        'url': 'addtable/help_desk_str_update1.php',
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
$query = pg_query("SELECT g_000001,a_000057, c_000001,p_000002,f_000061,c_000003, g_000007 from m_00_007 where c_000001  in ('$cif') and a_000003 = '87' order by f_000061,a_000057 ");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>No.</th>
									<th>Kantor</th>
									<th>Nasabah</th>
									<th>CIF</th>
									<th>Produk</th>
									<th>Pinjaman</th>
									<th>Persen Pinjaman</th>
									<th>Tgl Permohonan</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
					    $no     = 1;
		while ($result = pg_fetch_array($query)) {
			echo "
				<tr> 
				<td>".$no."</td>
				<td>".$result['g_000001']."</td>
				<td>".$result['a_000057']."</td>
				<td>".$result['c_000001']."</td>
				<td>".$result['p_000002']."</td>
				<td>".$result['f_000061']."</td>
				<td>".$result['c_000003']."</td>
				<td>".$result['g_000007']."</td>

				</tr> 
				";
				 $no++;
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>

<form id="Input2" method="post">
<input type="submit" value='UPDATE KARTU SETORAN'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">

<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>