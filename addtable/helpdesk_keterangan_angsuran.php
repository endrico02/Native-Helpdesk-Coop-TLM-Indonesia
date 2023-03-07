<?php
include '../conn/fungsi.php';
koneksi_db();
// echo '<script>alert("angsuran");</script>';
// exit();
$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
?>
<!DOCTYPE html>
<html>
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
			$query = pg_query("SELECT g_000001 as ktr, t_000013 as cif, a_000057 as nama, s_000000 as ket, g_000036 as waktu, t_000008 as jlh, t_000002 as no_bukti from t_01_003
								where t_000013 in ('$cif') and t_000005 = 'LPD'
								ORDER BY g_000036;");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>CIF</th>
									<th>Nama</th>
									<th>Keterangan</th>
									<th>Trx</th>
									<th>Waktu Posting</th>
								</tr>
						</thead>
						  </tbody>";
				// output data of each row
			while($fetch = pg_fetch_array($query))
			{
				if($i%2==0) $class = 'even'; else $class = 'odd';

				$cif = $fetch['cif'];
				$nobuk = $fetch['no_bukti'];
				$waktu = $fetch['waktu'];
				$norek = "$cif"."$nobuk"."$waktu";
				//$time = substr($norek,16);
				// $norek1 = substr($norek,0,10);
				//$nob = substr($norek,10,6);

				// echo '<script>alert("'.$norek.'");</script>';
				// echo '<script>alert("'.$norek1.'");</script>';
				// echo '<script>alert("'.$nob.'");</script>';


				//exit();
				
				echo'<tr class="'.$class.'">
					<td>'.$fetch['ktr'].'</td>
					<td>'.$fetch['cif'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td><span class= "xedit" id="'.$norek.'">'.$fetch['ket'].'</span></td>
					<td>'.$fetch['jlh'].'</td>
					<td>'.$fetch['waktu'].'</td>
					</tr>';					
			}
							
		} else {
  echo "data tidak ditemukan!";
	}			
			?>
			</tbody>
		</table>
        </div>
		<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 
<script type="text/javascript">
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "addtable/proses_keterangan_angsuran.php?id="+x+"&data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'dana_blokir'){
					$(z).html(y);}
					if(s == 'error') {
					alert('Error Processing your Request2!');}
				},
				error: function(e){
					alert('Error Processing your Request Contact your IT person!');
				}
			});
		});
});
</script>

    </div>
</body>
</html>