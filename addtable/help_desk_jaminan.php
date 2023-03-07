<?php
include '../conn/fungsi.php';
koneksi_db();
date_default_timezone_set('Asia/Makassar');
?>
<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">

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
                    <table class= "table table-striped table-bordered table-hover">
						  <thead> 
							<thead>
								<tr>
									<th width='5px'>No</th>
									<th width='10px'>Cabang</th>
									<th>Nominatif</th>
									<th>Neraca</th>
									<th width='200px'>Selisih</th>
									<th width='200px'>Waktu</th>
								</tr>
						</thead>
						  </tbody>
			<?php
			$query = pg_query("		SELECT m_03_001.g_000001 as cbg, 
									SUM(f_000054) as nominatif, 
									l_000032 as neraca, 
									l_000032 - SUM(f_000054)  as cek  
									FROM m_01_002, m_02_001, m_03_001 
									WHERE l_000026 = '2000177' and
									trim(m_01_002.c_000001) = trim(m_03_001.c_000001)    
									and m_01_002.p_000002 in ('18') and m_03_001.g_000001 = m_02_001.g_000001 
									GROUP BY m_03_001.g_000001,l_000032 
									ORDER BY m_03_001.g_000001");

		$no     = 1;
		while($fetch = pg_fetch_array($query))
		{
		?>
		<tr>
		<td><?php echo $no++; ?></td>
		<td><strong><p style="text-align:center;"><?php echo $fetch['cbg'];?></p></strong></td>
		<td><strong><p style="text-align:center;"><?php echo "".number_format($fetch['nominatif'],0,",",".")."";?></p></strong></td>
		<td><strong><p style="text-align:center;"><?php echo "".number_format($fetch['neraca'],0,",",".")."";?></p></strong></td>
		<td>
		<?php
			if($fetch['cek']=="0"){
								echo ''.number_format($fetch['cek']).'';
			}else if($fetch['cek']!="0"){
								echo '<strong><font color="red">'.number_format($fetch['cek'],0,",",".").'</font></strong>';							}							
		?>
		</td>
		<td><strong><?php echo "" .date('d-m-Y H:i:s'). "" ?></p></strong></td>
		</tr>		
<?php } ?>
</tbody>
</table> 			
</body>
</html>