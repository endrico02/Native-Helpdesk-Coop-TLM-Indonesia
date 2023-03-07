<?php
	include "fungsiLogin.php";

	if(isset($_POST['kd_cab'])){
		
		$kd_cab = $_POST['kd_cab'];
		

		$query = pg_query("SELECT * FROM s_00_006 WHERE g_000001 = '$kd_cab'");

		if(pg_num_rows($query)==0){
			echo '<script>
						alert("Data Tidak Ada di dalam database");
						history.go(-1);
				</script>';
				exit();
		}
	?>

			<html>
				<head>
					<script src="jquery.min.js"></script>
					<script>  
				       $(document).ready(function(){  
				       
				          $('#proses').click(function(){  
				               var kode_cab = $('#kode_cab').val();	
				               $.ajax({  

				                    url:'proses_hapus_saldo_staf.php',  
				                    type:'POST',  
				                    data:'kode_cab='+kode_cab,  
				                    success:function(response){  
				                         $('#result2').html(response);  
				                    }  
				               });  
				          });  
				     });    
				   </script> 
				</head>
				<body>

							<table width="100%" cellspacing="0" cellpadding="0" border="1">
		                        <hr>
		                        <thead>
		                            <tr>
		                                <th>No</th>
		                                <th>Cabang</th>
		                                <th>Kode AO</th>
		                                <th>Nama</th>
		                                <th>Sisa Saldo</th>
									</tr>
		                        </thead>
		                        <tbody>
		                        	<?php
		                            	$no = 1;	

		                            	if(pg_num_rows($query)==0){
		                            		//echo "Tidak ada data";
		                            	}else{
		                            		while ($result = pg_fetch_object($query)) {

											echo "<tr> 
													<td>".$no."</td>
													<td>".$result->g_000001."</td>
													<td>".$result->a_000012."</td>
													<td>".$result->s_000000."</td>
													<td>".$result->f_000004."</td>
													</tr>";
													$no++;
												}
		                            	}
		                            	?>

								</tbody>

							</table><br><br>
							<hr>							
							<input type="hidden" name="kode_cab" id="kode_cab" value="<?=$kd_cab;?>">
							<input type="submit" onClick="return confirm('Apakah anda yakin akan memproses data ini?')" name="proses" id="proses" value="proses">
							<br><br>
							<div id="result2"></div>
							
				</body>
			</html>
			
		<?php
		unset($kd_cab);
		unset($query);
	}else{
		echo'<script>alert("Tidak jadi");</script>';
		echo '
				<script>
					history.go(0);
				</script>
			';
	}
?>