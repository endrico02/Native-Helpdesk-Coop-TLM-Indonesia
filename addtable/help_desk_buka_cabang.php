<?php
include '../conn/fungsi.php';
koneksi_db();

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
			$query = pg_query("select o_000001 as kd_cabang , s_000000 as nama,a_000004 as status from o_00_002
								where o_000001 not in ('001','003','005','016','020','037','100','700','800','999') ORDER BY a_000004,o_000001;");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									<th>No</th>
									<th>Kode Cabang</th>
									<th>Nama Cabang</th>
									<th>Status</th>
								</tr>
						</thead>
						  </tbody>";
				// output data of each row
								$no     = 1;

			while($fetch = pg_fetch_array($query))
			{
				if($i%2==0) $class = 'even'; else $class = 'odd';
				
				echo'<tr class="'.$class.'">
					<td>'.$no.'</td>
					<td>'.$fetch['kd_cabang'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td><span class= "xedit" id="'.$fetch['kd_cabang'].'">'.$fetch['status'].'</span></td>
					
					
					</tr>';	
						  $no++;
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
				url: "addtable/process_buka_cabang.php?id="+x+"&data="+y,
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