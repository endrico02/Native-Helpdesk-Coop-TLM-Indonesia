<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#Input40').submit(function(e){
                    e.preventDefault();
					$('#content40').html('<img src="images/loading.gif"/>');
					$('#content40').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_datststakopupdate.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content40').html(html);
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
                    
			<?php
			$query = pg_query("	SELECT 		m_00_001.g_000001 as ktr,
											m_00_001.c_000001 as cif,
											m_00_001.a_000057 as nama,
											m_00_001.c_100025 as status
											
											
								
                                
								FROM 		m_00_001
								where m_00_001.c_000001 in ('$cif') order by status,nama;");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>CIF</th>
									<th>Nama</th>
									<th>Status</th>
									
									
								</tr>
						</thead>
						  </tbody>";
				// output data of each row
			while($fetch = pg_fetch_assoc($query))
			{
				if($fetch['status']=='1'){
					$status = 'Anggota Biasa';
				}elseif($fetch['status']=='2'){
					$status = 'Pendiri';
				}

			
				echo'<tr>
					<td>'.$fetch['ktr'].'</td>
					<td>'.$fetch['cif'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td>'.$fetch['status'].'</td>
					
					</tr>';							
			}
							
		
			
			?>
		</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>
<form id="Input40" method="post">
<input type="submit" value='Proses Data'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">

<div id="content40"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>