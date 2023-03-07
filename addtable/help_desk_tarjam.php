<!DOCTYPE html>
<html>
<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }
</style>
		<script>
			$().ready(function(){
                $('#tarjam').submit(function(e){
                    e.preventDefault();
                    $('#tarik').html('<img src="images/loading2.gif"/>');
					$('#tarik').slideDown('slow');
					$.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_tarjam_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tarik').html(html);
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
 						$query = pg_query("SELECT * FROM m_01_002 WHERE trim(c_000001) in ('$cif') and a_000001 = '8'");
 						$num_rows = pg_num_rows($query);

 						$query2 = pg_query("SELECT * FROM m_01_002 WHERE trim(c_000001) in ('$cif') and a_000001 <> '8'");
 						$num_rows2 = pg_num_rows($query2);
						// $query = pg_query("SELECT m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, m_01_002.a_000001 as status, m_01_002.f_000004 as piutang, m_03_001.f_000054 from m_01_002,m_03_001
						// 					where m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif') and m_01_002.a_000001 = '8'
						// 					order by m_01_002.a_000057");
						// $num_rows = pg_num_rows($query);

						// $query2 = pg_query("SELECT m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, m_01_002.a_000001 as status, m_01_002.f_000004 as piutang, m_03_001.f_000054 from m_01_002,m_03_001
						// 					where m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif') and m_01_002.a_000001 <> '8'
						// 					order by m_01_002.a_000057");
						// $num_rows2 = pg_num_rows($query2);

											
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
											<td >CIF</td>
											<td>Nama</td>
											<td>Status</td>
											<td>Piutang</td>
										</tr>
									</thead>
									  </tbody>";
							// output data of each row
							while ($result = pg_fetch_object($query2)) {
							echo "
								<tr> 
								<td>$result->c_000001</td>
								<td>$result->a_000057</td>
								<td>$result->a_000001</td>
								<td>$result->f_000004</td>
								</tr> 
								";
							}
						
						pg_close ();
						
?>				
						</tbody>
						<div class="clear"></div>
						</table> 
						<hr>
				</div>

</table>
<form id="tarjam" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value='update'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
<input name="cabang" type="hidden" class="form-control" value="<?php echo $cabang?>">
 <div id="tarik"> klik untuk proses... </div>
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