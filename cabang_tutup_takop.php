<?php
	include "conn/fungsi.php";
	koneksi_db();

		//query unutk menampilkan data dari m_02_001
		$query = pg_query("select m_06_001.g_000001,
					sum(m_06_001.f_000072) as pokok,
					sum(m_06_001.f_600072) as wajib,
					sum(m_06_001.f_000072)+sum(m_06_001.f_600072) as total,
					sum(m_06_001.f_000072)+sum(m_06_001.f_600072) - sum(t_01_003.t_000008) as selisih
					from m_06_001, t_01_003
					where m_06_001.f_000000 = t_01_003.t_000013 and m_06_001.g_000001 = t_01_003.g_000001 and t_01_003.t_000005 = 'SCC'
					group by m_06_001.g_000001
					order by m_06_001.g_000001---bagi pokok Wajib");
	?>

			<html>
				<head>
					<title>Cabang Tutup Takop</title>
				</head>
				<body>
							<h3>Cabang Tutup Takop</h3>
							<table width="100%" cellspacing="0" cellpadding="0" border="1">
		                        <hr>
		                        <thead>
		                            <tr>
		                                <th>No</th>
		                                <th>Cabang</th>
		                                <th>Pokok</th>
		                                <th>Wajib</th>
		                                <th>Total</th>
		                                <th>Selisih</th>
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
													<td>".$result->pokok."</td>
													<td>".$result->wajib."</td>
													<td>".$result->total."</td>
													<td>".$result->selisih."</td>
													</tr>";
												$no++;
												}
		                            	}
		                            	?>

								</tbody>

							</table><br><br>
							
				</body>
			</html>