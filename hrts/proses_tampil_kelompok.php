<?php
	include "fungsiLogin.php";

	if(isset($_POST["kd_kel"])){
		
		$kd_kel = $_POST['kd_kel'];

		$query = pg_query("SELECT * FROM tagihan_kelompok_tbl WHERE kd_kel = '$kd_kel'");

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

				               var hari_tagih = $('#hari_tagih').val(); 
				               var kode_kel = $('#kode_kel').val();	
				               $.ajax({  

				                    url:'proses_pindah_hrt.php',  
				                    type:'POST',  
				                    data:'hari_tagih='+hari_tagih+'&kode_kel='+kode_kel,  
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
		                                <th>Cif</th>
		                                <th>Nama</th>
		                                <th>Kd Kel</th>
		                                <th>Nama Kel</th>
		                                <th>Hari Tagih</th>
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
													<td>".$result->namacabang."</td>
													<td>".$result->norek."</td>
													<td>".$result->nama."</td>
													<td>".$result->kd_kel."</td>
													<td>".$result->nama_kelompok."</td>
													<td>".$result->tgl_tagih."</td>
													</tr>";
													$no++;
												}
		                            	}
		                            	?>

								</tbody>

							</table><br><br>
							<hr>
							<label for="hari_tagih">Pilih hari tagih :</label>
							<select name="hari_tagih" id="hari_tagih">
								<option value="1. SENIN">SENIN</option>
								<option value="2. SELASA">SELASA</option>
								<option value="3. RABU">RABU</option>
								<option value="4. KAMIS">KAMIS</option>
								<option value="5. JUMAT">JUMAT</option>
							</select>
							<input type="hidden" name="kode_kel" id="kode_kel" value="<?=$kd_kel;?>">
							<input type="submit" onClick="return confirm('Apakah anda yakin akan memproses data ini?')" name="proses" id="proses" value="proses">
							<br><br>
							<div id="result2"></div>														 
							
				</body>
			</html>
			
		<?php
	}else{
		echo'<script>alert("Tidak jadi");</script>';
		echo '
				<script>
					history.go(0);
				</script>
			';
	}
?>