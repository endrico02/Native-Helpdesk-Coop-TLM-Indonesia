<?php
	include "conn/fungsi.php";
	koneksi_db();

	if(isset($_POST["kode_cab"])){

		$kode_cab = $_POST['kode_cab'];
		
		$update = pg_query("UPDATE s_00_006 SET f_000004 = '0' WHERE g_000001 = '$kode_cab'");

		if($update){
			echo '<script>
						alert("Berhasil");
				</script>';	

				$selek = pg_query("SELECT * FROM s_00_006 WHERE g_000001 = '$kode_cab'");				
				?>
				<html>
				<head>
					 
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

		                            	if(pg_num_rows($selek)==0){
		                            		echo "Tidak ada data";
											echo "test";
		                            	}else{
		                            		while ($result = pg_fetch_object($selek)) {

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
				<?php
				unset($selek);
				unset($hari_tagih);
				unset($kode_cab);
				unset($update);
				exit();
		}else{
			echo '<script>
						alert("Gagal");
						window.location = "sisa_saldo_staf.php";
				</script>';
				unset($selek);
				unset($hari_tagih);
				unset($kode_cab);
				unset($update);
				exit();
		}
	}
	?>