<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#proses_aktif_takop').submit(function(e){
                    e.preventDefault();
					$('#tampil1_takop').html('<img src="images/loading.gif"/>');
					$('#tampil1_takop').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/helpdesk_update_aktif_takop.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil1_takop').html(html);
                        }
                    });
                });
            });			
        </script>
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$kd_cbg = isset($_REQUEST['kd_cbg']) ? $_REQUEST['kd_cbg']:"kosong";

if(isset($_POST["kd_cbg"])){

		$kd_cab = $_POST['kd_cbg'];

		//aturan 1: selisih neraca dan nominatif tidak boleh = 0
		$cek = pg_query("SELECT m_06_001.g_000001 as cbg, 
									SUM(f_000004) as nominatif, 
									l_000032 as neraca, 
									SUM(f_000004) - l_000032 as cek  
									FROM m_06_001, m_02_001 
									WHERE l_000026 = '3000014' and m_06_001.g_000001 = m_02_001.g_000001 and m_06_001.g_000001 = '$kd_cab'
									GROUP BY m_06_001.g_000001,l_000032 
									ORDER BY m_06_001.g_000001");

		if(pg_num_rows($cek)!=0){
				$cari1 = pg_fetch_assoc($cek);
				$selisih_pokok = abs($cari1['cek']);
			//echo'<script>alert("'.$selisih.'");</script>';
			if($selisih_pokok==0){
				echo '<script>
						alert("Tutup takop sudah selesai / cabang tidak melakukan tutup takop pada hari ini");
						window.location = "index.php?content=bagi_pokok_wajib";
				</script>';
				exit();
			}
		}

		//query unutk menampilkan data dari m_02_001
		$query = pg_query("SELECT a.g_000001 as g_000001, a.l_000000 as l_000000, a.l_000029 as l_000029, a.l_000030 as l_000030, a.l_000031 as l_000031, a.l_000032 as l_000032 FROM m_02_001 a WHERE l_000017 in ('314','315') 
			and g_000001 in (SELECT m_06_001.g_000001
					from m_06_001, t_01_003
					where m_06_001.f_000000 = t_01_003.t_000013 and m_06_001.g_000001 = t_01_003.g_000001 and t_01_003.t_000005 = 'SCC' and t_01_003.g_000001 = '$kd_cab' 
					group by m_06_001.g_000001
					order by m_06_001.g_000001)
			order by g_000001, a.l_000017");

?>
<head>
	<script src="jquery.min.js"></script>
					<script>  
				       $(document).ready(function(){  
				          $('#proses_tutup').click(function(){ 
				          		$('#result3').html('Sedang Memproses... <img src="loading4.gif">');
                				$('#result3').slideDown('slow'); 
				               var kode = $("#kd_cab").val();
				               //alert(kode);
				               $.ajax({  
				                    url:'addtable/proses_tutup_takop2.php',  
				                    type:'POST',  
				                    data:'kode=' +kode,  
				                    success:function(response){  
				                         $('#result3').html(response);  
				                    }  
				               });  
				          });    
				     });    
				   </script> 
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
							<table cellpadding="0" cellspacing="0">
		                        <hr>
		                        <thead>
		                            <tr>
		                                <!-- <th>No</th> -->
		                                <th>Cabang</th>
		                                <th>Keterangan</th>
		                                <th>Saldo Awal</th>
		                                <th>l_000030</th>
		                                <th>l_000031</th>
		                                <th>Saldo Akhir</th>
									</tr>
		                        </thead>
		                        <tbody>
		                        	<?php
		                            	$no = 1;
		                            	$no2 = 1;
		                            	$cbg = '';	

		                            	if(pg_num_rows($query)==0){
		                            		//echo "Tidak ada data";
		                            	}else{
		                            		while ($result = pg_fetch_object($query)) {

		                            			//script nemampilkan nomor urut
		                            			if($cbg == $result->g_000001){
		                            				$no2 = '';
		                            				$no = $no-1;
		                            			}else{
		                            				$no2 = $no;
		                            			}

											echo "<tr> 
													
													<td>".$result->g_000001."</td>
													<td>".$result->l_000000."</td>
													<td>".$result->l_000029."</td>
													<td>".$result->l_000030."</td>
													<td>".$result->l_000031."</td>
													<td>".$result->l_000032."</td>
													</tr>";

													$cbg = $result->g_000001;
													$no++;
												}
		                            	}
		                            	?>
								</tbody>
							</table>
							<hr>
							<input type="hidden" name="kd_cab" id="kd_cab" value="<?=$cbg;?>">
							 <input type="submit" name="proses_tutup" id="proses_tutup" value="Proses">
							<br><br>
							<div id="result3"></div>
<?php } else {
			 echo'<script>alert("Tidak jadi");</script>';
			echo '
				<script>
					history.go(0);
				</script>
			';
				} ?>
</body>
</html>