<!DOCTYPE html>
<html>
<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }
</style>
		<script>
			$().ready(function(){
                $('#ulang').submit(function(e){
                    e.preventDefault();
					$('#ulangs').html('proses...');
					$('#ulangs').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_ulang_permohonan_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#ulangs').html(html);
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
						$query = pg_query("select * from m_00_007
											where trim(c_000001) in ('$cif');");
						$num_rows = pg_num_rows($query);
						echo "$num_rows Rows";
						if ($num_rows > 0) {
							echo "<table style='width:100%'>
									  <caption><h2></h2></caption>
									  <thead> 
										<tr>
											<td >Cabang</td>
											<td>CIF</td>
											<td >Nasabah</td>
											<td>status I</td>
											<td>status II</td>
										</tr>
									</thead>
									  </tbody>";
							// output data of each row
						while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->g_000001</td>
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->a_000003</td>
								<td>$result->s_000076</td>
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
<form id="ulang" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif ?>" />
<input name="cabang" type="hidden" class="form-control" value="<?php echo $cabang?>">
<div id="ulangs"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>