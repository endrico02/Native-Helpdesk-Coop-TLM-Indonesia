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
                $('#Input10').submit(function(e){
                    e.preventDefault();
					$('#content10').html('<img src="images/loading.gif"/>');
					$('#content10').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_datkelupdate.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content10').html(html);
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
			$query = pg_query("		SELECT 	namacabang,norek,nama,tgl_tagih,nama_staff,kd_kel,nama_kelompok 
									from 	tagihan_kelompok_tbl,m_00_001,m_00_002
									where 	 tagihan_kelompok_tbl.ktr = m_00_001.g_000001 and m_00_001.g_000001 in ('024','031','035','036','038','039','040','041','042','043','044')  and tagihan_kelompok_tbl.kd_kel <> m_00_002.a_000060 
											and m_00_001.a_000060 = m_00_002.a_000060 
											and m_00_001.c_000001 = tagihan_kelompok_tbl.norek;");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th width='5px'>No</th>
									<th width=''>Cabang</th>
									<th width=''>Norek</th>
									<th width=''>Nasabah</th>
									<th>Hari Tagih</th>
									<th>AO</th>
									<th width='10px'>Kode Kelompok</th>
									<th>Kelompok</th>
								</tr>
						</thead>
						  </tbody>";
				// output data of each row
						  $no     = 1;
			while($fetch = pg_fetch_array($query))
			{
				if($i%2==0) $class = 'even'; else $class = 'odd';
				
				echo'<tr class="'.$class.'">
				 <td>'.$no.'</td>
<td><strong><p style="text-align:center;"><font color="green">'.$fetch['namacabang'].'</font></p></strong></td>
<td><strong><p style="text-align:center;"><font color="green">'.$fetch['norek'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['nama'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['tgl_tagih'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['nama_staff'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['kd_kel'].'</font></p></strong></td>
<td><strong><p style="text-align:left;"><font color="green">'.$fetch['nama_kelompok'].'</font></p></strong></td>


					</tr>';			

$no++;

			}
							
		} else {
  echo "data tidak ditemukan!";
	}
			
			?>
				
				</tbody>
				<div class="clear"></div>
				</table> 
				
				

<form id="Input10" method="post">
<input type="submit" value='PROSES PINDAH' onclick = "return confirm ('Anda Yakin Memproses Data?');")/>
<div id="content10"></div>
</div>
</form>
</body>
<p style="text-align:center;"><font size="2">1.  Data Pindah Kelompok Mobile </font></p>
<p style="text-align:center;"><font size="2">2.  Pindah Kelompok Mobile Dilakukan Setelah Dari Kepatuhan Telah Melakukan Pindah Kelompok</font></p>
</html>