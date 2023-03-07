<!DOCTYPE html>
<html>
<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }
</style>
<script>
			$().ready(function(){
                $('#Input2').submit(function(e){
                    e.preventDefault();
					$('#content2').html('proses...');
					$('#content2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pindah_kelompok_update.php',
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
						$query = pg_query("select c_000001 as CIF, a_000057 as nama, a_000060 as kd_kel from m_00_001
											where trim(c_000001) in ('$cif');");
						$num_rows = pg_num_rows($query);
						echo "$num_rows Rows";
						if ($num_rows > 0) {
							echo "<table style='width:100%'>
									  <caption><h2></h2></caption>
									  <thead> 
										<tr>
											<td>CIF</td>
											<td>nama</td>
											<td >kd_kel</td>
											<td >kd_kel</td>
										</tr>
									</thead>
									  </tbody>";
							// output data of each row
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->kd_kel</td>
								<td><input name='cabang' class='form-control' value=''></td>
								</tr> 
								";
										
					} 
?>
					
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
<form id="Input2" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<input name="cif" type="hidden" class="form-control" value="<?=$cif?>">
<div id="content2"> klik untuk menampilkan data </div>
</form>
<?php } else {
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>