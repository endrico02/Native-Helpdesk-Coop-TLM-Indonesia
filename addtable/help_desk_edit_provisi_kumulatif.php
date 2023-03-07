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
                        'url': 'addtable/help_desk_edit_provisi_kumulatif_proses.php',
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
$pprovisi= isset($_REQUEST['pprovisi']) ? $_REQUEST['pprovisi']:"kode_ao kosong";
//echo $pprovisi.$cif;
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
		//$ao = pg_query ("select s_000000 from s_00_006 where a_000012 = '$kode_ao'");
		//$ao_baru = pg_fetch_object($ao);
		$query = pg_query("SELECT m_01_002.g_000001,m_01_002.c_000001, m_01_002.a_000057,m_01_002.f_000074, m_01_002.f_000069, m_01_001.f_000037
			FROM m_01_002,m_01_001
			WHERE  m_01_002.c_000001 = m_01_001.c_000001 AND m_01_001.c_000001  in ('$cif');");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
						<tr>
							<th>Cabang</th>
							<th>CIF</th>
							<th>nama nasabah</th>
							<th>Plafon</th>
							<th>hak tarik</th>
							<th>provisi</th>
						</tr>
					</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_object($query)) {
			echo '
				<tr> 
				<td>'.$result->g_000001.'</td>
				<td>'.$result->c_000001.'</td>
				<td>'.$result->a_000057.'</td>
				<td>'.$result->f_000074.'</td>
				<td>'.$result->f_000069.'</td>
				<td>'.$result->f_000037.'</td>
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
<input type="submit" value='proses potong'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
 <input name="pprovisi" type="hidden" class="form-control" value="<?php echo $pprovisi?>">
<div id="tampil"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>