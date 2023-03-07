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
</head>
<body>
<div></div>
    <div class="">    
			<div class="row">
                    
                        <?php
						$query = pg_query("select m_00_001.g_000001, c_000001 as CIF, a_000057 as nama, m_00_001.a_000012 as kode_ao, s_00_006.s_000000 as ao from m_00_001, s_00_006
										   where s_00_006.a_000012 = m_00_001.a_000012 AND c_000001 in ('$cif')
											ORDER BY a_000057;");
						$i=0;
						$num_rows = pg_num_rows($query);
						if ($num_rows > 0) {
							echo "<table class= 'table table-striped table-bordered table-hover'>
									  <thead> 
										<thead>
											<tr>
												<th colspan='1' rowspan='1'  tabindex='0'>Cabang</th>
												<th colspan='1' rowspan='1'  tabindex='0'>NAMA</th>
												<th colspan='1' rowspan='1'  tabindex='0'>CIF</th>
												
												<th colspan='1' rowspan='1'  tabindex='0'>KODE AO</th>
												<th colspan='1' rowspan='1'  tabindex='0'>AO</th>
											</tr>
									</thead>
									  </tbody>";
							// output data of each row
						while($fetch = pg_fetch_array($query))
						{
							if($i%2==0) $class = 'even'; else $class = 'odd';
							
							echo'<tr class="'.$class.'">
								<td>'.$fetch['g_000001'].'</td>
								<td>'.$fetch['nama'].'</td>
								<td>'.$fetch['cif'].'</td>
								<td><span class= "edit" id="'.$fetch['cif'].'">'.$fetch['kode_ao'].'</span></td>
								<td>'.$fetch['ao'].'</td>
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
        //$.fn.editable.defaults.mode = 'none';
        $('.edit').editable();		
		$(document).on('click','.editable-submit',function(){
			var x = $(this).closest('td').children('span').attr('id');
			var y = $('.input-sm').val();
			var z = $(this).closest('td').children('span');
			$.ajax({
				url: "addtable/process_pindah_ao.php?id="+x+"&data="+y,
				type: 'GET',
				success: function(s){
					if(s == 'kd_kel'){
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