<!DOCTYPE html>
<html>
<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }
</style>
<script>
			$().ready(function(){
                $('#satu').submit(function(e){
                    e.preventDefault();
					$('#dua').html('<img src="images/loading2.gif"/>');
					$('#dua').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_fasilitas_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#dua').html(html);
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
						$query = pg_query("SELECT c_000001 as cif, a_000057 as nama, a_000001 as status, f_000004 as piutang from m_01_002 
								where trim(c_000001) in ('$cif') and a_000001 = '8'");
						$num_rows = pg_num_rows($query);

						$query2 = pg_query("SELECT c_000001 as cif, a_000057 as nama, a_000001 as status, f_000004 as piutang from m_01_002 
								where trim(c_000001) in ('$cif') and a_000001 <> '8' ");
						$num_rows2 = pg_num_rows($query2);

						if ($num_rows2 > 0) {
							if($num_rows>0){
									echo "$num_rows2 Data Ditemukan ( <i>$num_rows Data tidak ditampilkan, karna merupakan nasabah lari</i> ) ;-(";
							}else{
									echo "$num_rows2 Data Ditemukan";
							}
							echo "<table style='width:100%'>
									  <caption><h2></h2></caption>
									  <thead> 
										<tr>
											<td>CIF</td>
											<td>Nasabah</td>
											<td>Status</td>
											<td>Sisa Piutang</td>
										</tr>
									</thead>
									  </tbody>";
							// output data of each row
						while ($result = pg_fetch_object($query2)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->status</td>
								<td>$result->piutang</td>
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
<form id="satu" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
 <input name="cabang" type="hidden" class="form-control" value="<?php echo $cabang?>">
<div id="dua"> klik untuk menampilkan data </div>
</form>
<?php } else {
			  if($num_rows>0){
					echo "Data tidak ditemukan ( <i>$num_rows Data tidak ditampilkan, karna merupakan nasabah lari</i> ) ;-(";
				}else{
					echo "Data tidak ditemukan ;-(";
				}
				} ?>
</body>
</html>