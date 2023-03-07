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
						$query = pg_query("select m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, CASE
            WHEN m_01_002.a_000001 = '9' THEN 'TARJAM'
            ELSE 'BELUM DISET TARJAM'
        	END AS status, m_01_002.f_000004 as piutang, abs(m_03_001.f_000054) as jaminan from m_01_002,m_03_001
											where m_03_001.f_000054 < '0' and trim(m_03_001.c_000001)=trim(m_01_002.c_000001) and trim(m_03_001.c_000001) in ('$cif')
											order by m_01_002.a_000057;");
						$num_rows = pg_num_rows($query);
						echo "$num_rows Rows";
						if ($num_rows > 0) {
							echo "<table style='width:100%'>
									  <caption><h2></h2></caption>
									  <thead> 
										<tr>
											<td >CIF</td>
											<td>NAMA</td>
											<td >STATUS</td>
											<td>PIUTANG</td>
											<td>JAMINAN</td>
										</tr>
									</thead>
									  </tbody>";
							// output data of each row
							while ($result = pg_fetch_object($query)) {
							echo "
								<tr> 
								<td>$result->cif</td>
								<td>$result->nama</td>
								<td>$result->status</td>
								<td>$result->piutang</td>
								<td>$result->jaminan</td>
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
			  echo "data tidak ditemukan ;-(";
				} ?>
</body>
</html>