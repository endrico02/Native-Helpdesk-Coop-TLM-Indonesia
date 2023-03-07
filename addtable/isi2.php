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
</head>
<body>
<div></div>
    <div class="">    
			<div class="row">
                    
                        <?php
						$query = pg_query("select
m_01_002.g_000001 as cabang,
m_01_002.c_000001 as no_cif,
m_01_002.cif_lama,
m_01_001.a_000057 as nama,
m_01_002.no_agg as no_agg,
m_01_001.f_000021 as tglreal
from m_01_002,m_06_001,m_01_001,h_00_001
where m_01_002.c_000001 = m_01_001.c_000001 and m_01_002.c_000001 not in (select c_000001 from m_06_001) and m_01_001.f_000021=h_00_001.h_000002
group by m_01_002.g_000001,m_01_002.c_000001,m_01_002.cif_lama,m_01_001.a_000057,m_01_002.no_agg,m_01_001.f_000021;");

							echo "<table class= 'table table-striped table-bordered table-hover'>
									  <thead> 
										<thead>
											<tr>
												<th colspan='1' rowspan='1'  tabindex='0'>Cabang</th>
												<th colspan='1' rowspan='1'  tabindex='0'>No CIF</th>
												<th colspan='1' rowspan='1'  tabindex='0'>CIF Lama</th>
												<th colspan='1' rowspan='1'  tabindex='0'>Nama</th>
												<th colspan='1' rowspan='1'  tabindex='0'>No Agg</th>
												<th colspan='1' rowspan='1'  tabindex='0'>Tgl Real</th>
											</tr>
									</thead>
									  </tbody>";
							// output data of each row
						while($fetch = pg_fetch_array($query))
						{
							
							
							echo'<tr>
								<td>'.$fetch['cabang'].'</td>
								<td>'.$fetch['no_cif'].'</td>
								<td>'.$fetch['cif_lama'].'</td>
								<td>'.$fetch['nama'].'</td>
								<td>'.$fetch['no_agg'].'</td>
								<td>'.$fetch['tglreal'].'</td>
								</tr>';							
						}
					
						
						?>
                        </tbody>
                    </table>
        <!-- </div>
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

    </div> -->
</body>
</html>