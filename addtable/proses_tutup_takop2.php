<?php
	include '../conn/fungsi.php';
	koneksi_db();

	if(isset($_POST["kode"])){	

		$kd_cab = $_POST["kode"];
		//echo '<script>alert("test1");</script>';

		//ket : query harus diurutkan

		//Query pertama
		//update wajib
		$update1 = pg_query("UPDATE m_02_001 set 
							l_000030 = (
									select 
									l_000030 + (SELECT ABS(SUM(f_000004) - l_000032) as cek
									FROM m_06_001, m_02_001 
									WHERE l_000026 = '3000014' and m_06_001.g_000001 = m_02_001.g_000001 and m_06_001.g_000001 = '$kd_cab'
									GROUP BY m_06_001.g_000001,l_000032
									) as wajib
									from m_02_001 where
									g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000015')
								    ),

							l_000032 = (
									select
									l_000029 + (l_000030 + (SELECT ABS(SUM(f_000004) - l_000032) as cek
									FROM m_06_001, m_02_001 
									WHERE l_000026 = '3000014' and m_06_001.g_000001 = m_02_001.g_000001 and m_06_001.g_000001 = '$kd_cab'
									GROUP BY m_06_001.g_000001,l_000032
									)) - l_000031 as total_wajib
									from m_02_001 where
									g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000015')
							)
							where
									g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000015')");

		//Query kedua
		//update pokok
		$update2 = pg_query("UPDATE m_02_001 set 
					l_000030 = (
							select 
							l_000030 - (SELECT ABS(SUM(f_000004) - l_000032) as cek
							FROM m_06_001, m_02_001 
							WHERE l_000026 = '3000014' and m_06_001.g_000001 = m_02_001.g_000001 and m_06_001.g_000001 = '$kd_cab'
							GROUP BY m_06_001.g_000001,l_000032
							) as pokok
							from m_02_001 where
							g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000014')
						    ),

					l_000032 = (
							select
							l_000029 + (l_000030 - (SELECT ABS(SUM(f_000004) - l_000032) as cek
							FROM m_06_001, m_02_001 
							WHERE l_000026 = '3000014' and m_06_001.g_000001 = m_02_001.g_000001 and m_06_001.g_000001 = '$kd_cab'
							GROUP BY m_06_001.g_000001,l_000032
							)) - l_000031 as total_pokok
							from m_02_001 where
							g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000014')
					)
					where
							g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000014')");


		//query unutk menampilkan data dari m_02_001
		$query = pg_query("SELECT a.g_000001 as g_000001, a.l_000000 as l_000000, a.l_000029 as l_000029, a.l_000030 as l_000030, a.l_000031 as l_000031, a.l_000032 as l_000032 FROM m_02_001 a WHERE g_000001 in ('$kd_cab') and l_000017 in ('314','315','100') and l_000026 in ('3000014','3000015')
			order by g_000001, l_000017");

		if($query){
	?>

			<html>
				<head>
				</head>
				<body>
							<h3><b>Setelah Proses Tutup Takop</b></h3>
							<table width="100%" cellspacing="0" cellpadding="0" border="1">
		                        <hr>
		                        <thead>
		                            <tr>
		                                <th>No</th>
		                                <th>Cabang</th>
		                                <th>Keterangan</th>
		                                <th>l_000029</th>
		                                <th>l_000030</th>
		                                <th>l_000031</th>
		                                <th>l_000032</th>
									</tr>
		                        </thead>
		                        <tbody>
		                        	<?php
		                            	$no = 1;
		                            	$no2 = 1;
		                            	$cbg = '';	

		                            	if(pg_num_rows($query)==0){
		                            		echo "Tidak ada data";
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
													<td>".$no2."</td>
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

							</table><br><br>
				</body>
			</html>
			
		<?php
		}
	}else{
		echo'<script>alert("Tidak jadi");</script>';
		echo '
				<script>
					history.go(0);
				</script>
			';
	}
?>