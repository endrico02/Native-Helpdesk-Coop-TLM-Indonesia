<!DOCTYPE html>
<html>
 <meta charset="utf-8">
     
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
                        'url': 'addtable/help_desk_lunasdini_proses.php',
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
include '../conn/fungsi.php';
koneksi_db();
$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";



?>
<head>
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
	

 <div class="module_content">    
			<div class="row">
                    
			<?php
			$query = pg_query("select * from tagihan_kelompok_tbl  
				where trim(norek) in ('$cif');");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									
									<th>Cabang</th>
									<th>Nama</th>
									<th>Cif</th>
									</tr>
						</thead>
						  </tbody>";
				// output data of each row
			while($fetch = pg_fetch_array($query))
			{
				 
				if($i%2==0) $class = 'even'; else $class = 'odd';
				
				echo'<tr class="'.$class.'">
					
					<td>'.$fetch['ktr'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td>'.$fetch['norek'].'</td>
					

					</tr>';	
					

										
			}
							
		} else {
  echo "data tidak ditemukan!";
	}
			
			?>
			</tbody>
		</table>
        </div>


<form id="Input2" method="post">
<input type="submit" value='Proses'/>
<input name="cif" type="hidden" class="form-control" value="<?php echo $cif?>">
<div id="content2"></div>
</body>
</html>