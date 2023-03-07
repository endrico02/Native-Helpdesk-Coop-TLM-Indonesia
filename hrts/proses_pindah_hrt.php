<?php
	include "fungsiLogin.php";

	if(isset($_POST['hari_tagih'])){
		
		$hari_tagih = $_POST['hari_tagih'];
		$kode_kel = $_POST['kode_kel'];

		$update = pg_query("UPDATE tagihan_kelompok_tbl SET tgl_tagih = '$hari_tagih' WHERE kd_kel = '$kode_kel'");

		if($update){
			echo '<script>
						alert("Berhasil");
				</script>';	

				$selek = pg_query("SELECT * FROM tagihan_kelompok_tbl WHERE kd_kel = '$kode_kel'");				
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

		                            	if(pg_num_rows($selek)==0){
		                            		//echo "Tidak ada data";
		                            	}else{
		                            		while ($result = pg_fetch_object($selek)) {

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
				<?php
				unset($hari_tagih);
				unset($kode_kel);
				unset($update);
				exit();
		}else{
			echo '<script>
						alert("Gagal");
						window.location = "index.php";
				</script>';
				unset($hari_tagih);
				unset($kode_kel);
				unset($update);
				exit();
		}
	}
	?>