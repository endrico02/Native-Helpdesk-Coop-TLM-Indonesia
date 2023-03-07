<?php
include '../conn/fungsi.php';
koneksi_db();

?>
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
                        'url': 'addtable/help_desk_laporupdate.php',
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
<div></div>
    <div class="module_content">    
			<div class="row">
                    
			<?php
			$query = pg_query("	SELECT 	
										t_01_003.g_000001 as cab, t_01_003.a_000012 as kd_ao, 
										s_00_006.s_000000 as nama , sum (t_01_003.t_000008) as total from t_01_003,s_00_006

								WHERE 	
										t_01_003.s_000000 like ('%Mobile%') and t_01_003.t_000005 in ('SCM','LPD','SCD') and 
										t_01_003.g_000001 in ('024','031','035','036','038','039','040','041','042','043','044','045','047')
										and t_01_003.g_000001 = s_00_006.g_000001
										and t_01_003.a_000012 = s_00_006.a_000012 
										and t_000002 is null and t_000014 is null

								GROUP BY 
										t_01_003.g_000001,  t_01_003.a_000012, s_00_006.s_000000

								ORDER BY 
										kd_ao;");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th width='100px'>Cabang</th>
									<th width='200px'>AO</th>
									<th width='300px'>Nama AO</th>
									<th>Total Setoran</th>
								</tr>
						</thead>
						  </tbody>";
				// output data of each row
			while($fetch = pg_fetch_array($query))
			{
				if($i%2==0) $class = 'even'; else $class = 'odd';
				
				echo'<tr class="'.$class.'">
<td><strong><p style="text-align:center;"><font color="green">'.$fetch['cab'].'</font></p></strong></td>
<td><strong><p style="text-align:center;"><font color="green">'.$fetch['kd_ao'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['nama'].'</font></p></strong></td>
<td><strong><p style="text-align:center;"><font color="green" >Rp. '.number_format($fetch['total']).'
</font></p></strong></td>
					</tr>';							
			}
							
		} else {
  echo "data tidak ditemukan!";
	}
			
			?>
				
				</tbody>
				<div class="clear"></div>
				</table> 
				
				

<form id="Input2" method="post">
<input type="submit" value='UPDATE LAPORAN'/>
<div id="content2"></div>
</div>
</form>
</body>
</html>