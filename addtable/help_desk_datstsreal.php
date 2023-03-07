<?php
include '../conn/fungsi.php';
koneksi_db();
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
			$query = pg_query("		SELECT 	
											m_01_002.g_000001 as ktr,
											m_01_002.c_000001 as cif, 
											m_01_002.a_000057 as nama,
											m_01_002.a_000001 as status2, 
											m_01_001.a_000001 as status1,
											m_00_007.a_000003 as status3, 
											m_01_002.f_000004 as pokok, 
											m_01_002.g_000011 as tgl2,
											m_01_001.f_000021 as tgl1,
											m_00_007.g_000007 as tgl7,
											m_00_007.p_000002 as produk,
											m_00_007.f_000061 as plafond
											
									from 	m_01_002,m_01_001,m_00_007 
									where 	m_01_002.g_000001 = m_01_001.g_000001
									and 	m_00_007.g_000001 = m_01_002.g_000001
									and 	m_01_002.c_000001 = m_01_001.c_000001
									and 	m_01_002.c_000001 = m_00_007.c_000001
									and 	m_00_007.a_000003 not in ('86')
									and 	trim(m_01_002.c_000001) in ('$cif')
									and 	m_00_007.f_000061 in (select max(f_000061) from m_00_007 where c_000001 in ('$cif'))
									and	m_00_007.g_000007 in (select max(g_000007) from m_00_007 where c_000001 in ('$cif'))
									order by nama");
			$i=0;
			$num_rows = pg_num_rows($query);
			if ($num_rows > 0) {
				echo "<br><table class= 'table table-striped table-bordered table-hover'>
						  <thead> 
							<thead>
								<tr>
									
									<th width='5px'>CIF</th>
									<th width=''>Nama Anggota</th>
									<th width='5px'>Approve</th>
									<th>Tgl 1</th>
									<th>Tgl 2</th>
									<th>Produk</th>
									<th>Plafond</th>
									<th>Piutang</th>
									<th>Status 1</th>
									<th>Status 2</th>

								</tr>
						</thead>
						  </tbody>";
				// output data of each row
			while($fetch = pg_fetch_array($query))
			{
				
				
				echo'<tr>
					
					<td>'.$fetch['cif'].'</td>
					<td>'.$fetch['nama'].'</td>
					<td>'.$fetch['status3'].'</td>
					<td>'.$fetch['tgl1'].'</td>
					<td>'.$fetch['tgl2'].'</td>
					<td>'.$fetch['produk'].'</td>
					<td>'.$fetch['plafond'].'</td>
					<td><span class= "xedit1" id1="'.$fetch['cif'].'">'.$fetch['pokok'].'</span></td>
					<td><span class= "xedit2" id2="'.$fetch['cif'].'">'.$fetch['status1'].'</span></td>
					<td><span class= "xedit3" id3="'.$fetch['cif'].'">'.$fetch['status2'].'</span></td>

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
        $('.xedit1').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id1');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "addtable/help_desk_datstsreal_update1.php?id="+x+"&data="+y,
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
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit2').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id2');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "addtable/help_desk_datstsreal_update2.php?id="+x+"&data="+y,
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
jQuery(document).ready(function() {  
        $.fn.editable.defaults.mode = 'popup';
        $('.xedit3').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id3');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "addtable/help_desk_datstsreal_update3.php?id="+x+"&data="+y,
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