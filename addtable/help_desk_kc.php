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
                        'url': 'addtable/helpdesk_kc_update.php',
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
		$query = pg_query("select m_00_007.g_000001 as kantor,
m_00_007.c_000001 as cif,
m_00_007.a_000057 as nama,
m_00_007.c_000014 as m00_007,
m_00_009.c_000014 as m00_009
from m_00_007, m_00_009
where m_00_007.c_000001 = m_00_009.c_000001 and m_00_007.g_000001 = m_00_009.g_000001  
and length (m_00_007.c_000014) > 10 and m_00_007.a_000003 = '97' ;");
		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>No.</th>
									<th>Kantor</th>
									<th>CIF</th>
									<th>Nasabah</th>
									<th>m_00_007</th>
									<th>m_00_009</th>								
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
					    $no     = 1;
		while ($result = pg_fetch_array($query)) {
			echo "
				<tr>
					<td>".$no."</td> 
				    <td>".$result['kantor']."</td>
					<td>".$result['cif']."</td>
					<td>".$result['nama']."</td>
					<td>".$result['m00_007']."</td>
					<td>".$result['m00_009']."</td>
				</tr> 
				";
				$no++;
                
        
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>
<form id="Input2" method="post">
<input type="submit" value='UPDATE DATA'/>
<div id="content2"></div>
</div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>