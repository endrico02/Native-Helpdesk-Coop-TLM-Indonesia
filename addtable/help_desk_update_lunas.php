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
                        'url': '',
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
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <title></title>   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
	<style>
			table, td, th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			
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
		
		tr:hover{background-color:#f5f5f5}
	</style>
</head>
<body>

 <?php
		$query = pg_query("select m_01_002.g_000001 as cbg,o_00_002.s_000000 as namacabang , m_01_002.c_000001 as cif, m_01_002.a_000057 as nama, m_03_001.f_000054 as jaminan , m_01_002.f_000004 as piutang
		from m_01_002, o_00_002, m_03_001
		where m_01_002.g_000001 = o_00_002.o_000001 and m_01_002.c_000001 = m_03_001.c_000001 
		and trim(m_01_002.c_000001) in ('$cif') order by m_01_002.g_000001");

		$i=0;
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th>No.</th>
									<th>Kantor</th>
									<th>Nama Cabang</th>
									<th>CIF</th>
									<th>Nama</th>
									<th>Jaminan</th>
									<th>Piutang</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row

					   $no     = 1;

		while ($fetch = pg_fetch_array($query)) {
				if($i%2==0) $class = 'even'; else $class = 'odd';
				
				echo'<tr class="'.$class.'">
					<td>'.$no.'</td>
					<td>'.$fetch['cbg'].'</td>
					<td>'.$fetch['namacabang'].'</td>
					<td>'.$fetch['cif'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td>'.$fetch['jaminan'].'</td>
					<td>'.$fetch['piutang'].'</td>
					</tr>';	
					 $no++;						
			}
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>

<form id="Input2" method="post">

<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>