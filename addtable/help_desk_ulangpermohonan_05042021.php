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
						$query = pg_query("SELECT m_00_007.g_000001 as g_000001, m_00_007.c_000001 as c_000001, m_00_007.a_000057 as a_000057, m_00_007.a_000003 as a_000003, m_00_007.s_000076 as s_000076 from m_00_007, m_01_002
											where m_00_007.c_000001 = m_01_002.c_000001 and trim(m_00_007.c_000001) in ('$cif') and m_01_002.a_000001 = '8'");
						$num_rows = pg_num_rows($query);

						$query2 = pg_query("SELECT m_00_007.g_000001 as g_000001, m_00_007.c_000001 as c_000001, m_00_007.a_000057 as a_000057, m_00_007.a_000003 as a_000003, m_00_007.s_000076 as s_000076 from m_00_007, m_01_002
											where m_00_007.c_000001 = m_01_002.c_000001 and trim(m_00_007.c_000001) in ('$cif') and m_01_002.a_000001 <> '8' ORDER BY m_00_007.c_000001, m_00_007.g_000007");
						$num_rows2 = pg_num_rows($query2);

						$query3 = pg_query("SELECT DISTINCT(m_00_007.c_000001) from m_00_007, m_01_002
											where m_00_007.c_000001 = m_01_002.c_000001 and trim(m_00_007.c_000001) in ('$cif') and m_01_002.a_000001 <> '8'");
						$num_rows3 = pg_num_rows($query3);

						$query4 = pg_query("SELECT DISTINCT(m_00_007.c_000001) from m_00_007, m_01_002
											where m_00_007.c_000001 = m_01_002.c_000001 and trim(m_00_007.c_000001) in ('$cif') and m_01_002.a_000001 = '8'");
						$num_rows4 = pg_num_rows($query4);

						if ($num_rows2 > 0) {
							if($num_rows>0){
									echo "$num_rows3 Data Ditemukan ( <i>$num_rows4 Data tidak ditampilkan, karna merupakan nasabah lari</i> ) ;-(";
							}else{
									echo "$num_rows3 Data Ditemukan";
							}
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
						while ($result = pg_fetch_object($query2)) {
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
					 if($num_rows>0){
						echo "Data tidak ditemukan ( <i>$num_rows4 Data tidak ditampilkan, karna merupakan nasabah lari</i> ) ;-(";
					}else{
						echo "Data tidak ditemukan ;-(";
					}
			} ?>
</body>
</html>