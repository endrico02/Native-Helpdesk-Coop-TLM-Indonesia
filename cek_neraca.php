<?php
	include "conn/fungsi.php";
	koneksi_db();

		//query unutk menampilkan data dari m_02_001
		$query = pg_query("select g_000001, sum(l_000032) as selisih from m_02_001 					group by g_000001 order by g_000001---neraca");
	?>

			<html>
				<head>
					<title>Cek Neraca</title>
				</head>
				<body>
							<h3>Cek Neraca</h3>
							<table width="20%" cellspacing="0" cellpadding="0" border="1">
		                        <hr>
		                        <thead>
		                            <tr>
		                                <th>Cabang</th>
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
													<td>".$result->g_000001."</td>
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