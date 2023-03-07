<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#Input10').submit(function(e){
                    e.preventDefault();
					$('#content10').html('<img src="images/loading.gif"/>');
					$('#content10').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_besok_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content10').html(html);
                        }
                    });
                });
            });
			
        </script>
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";
$cabang= isset($_REQUEST['cabang']) ? $_REQUEST['cabang']:"cabang kosong";
//echo $cabang.$cif;
//exit;


?>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
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
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
tr:hover{background-color:#f5f5f5}
</style>
</head>
<body>

 <?php
$query = pg_query("	SELECT 	kd_cab, kd_ao, 	a.s_000000 as ao,		
					sum(trx_amount) as angsuran,
					sum(trx_tab) :: numeric(15,0) as tabungan,
					abs(sum(trx_amount) + sum(trx_tab) :: numeric(15,0)) as total,
					count(no_rek) as anggota from mobile_setoran_sesama, s_00_006 a
					where trx_date = (select h_000001 from h_00_001) and a.a_000012 = kd_ao
					and usr_insert in (select kdstaf from tagihan_kelompok_tbl 
	where ktr in ('024','031','035','036','038','039','040','040','041','042','043','044') 
					and substr(tgl_tagih,1,1)::double precision = 
					(SELECT date_part('dow',h_000001) from h_00_001)
					and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 where 
					mobile_cashier_trx.trx_date = h_00_001.h_000001)
					group by kdstaf
					order by kdstaf)
					group by kd_ao,kd_cab, a.s_000000
					order by kd_cab,kd_ao ;");

				if (!$query) {
    			die ('SQL Error: ' . pg_error($koneksi));
							}

?>
<style>
		table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
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
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
tr:hover{background-color:#f5f5f5}
	</style>


<article class="module width_full">
<header><h3 class="tabs_involved">Data Titipan Mobile</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	 <div class="table-responsive">
	 	<div align="center"> 
                    <table>
					  <thead> 
						<tr>
									<th width="90px">No</th>
                                    <th width="100px">Kantor</th>
                                	<th width="100px">Kode AO</th>
                                	<th width="600px">Nama AO</th>
									<th width="100px">Angsuran</th>
									<th width="100px">Tabungan</th>
									<th width="100px">Total Titipan</th>
									
						</tr>
					</thead>
					  </tbody>
 <?php
                                        $no     = 1;
                                          

                                        while ($row = pg_fetch_assoc($query))
                                                    {
                                                                      
                                        echo "<tr>
                                        <td>".$no."</td>
                                        <td>".$row['kd_cab']."</td>
                                        <td>".$row['kd_ao']."</td>
                                        <td>".$row['ao']."</td>
                                        <td>".number_format($row['angsuran'])."</td>
                                        <td>".number_format($row['tabungan'])."</td>
                                        <td>".number_format($row['total'])."</td>
                                       
                                               
                                             
				                   
                                        </tr>"; 
                                            $no++;
                
        
                                            }?>
                                    </tbody>

                                </table>
                                </div>
                                 </div>
 								</div>
                                 </div>
<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 
                    </article>

<br><form id="Input10" method="post">
<input class="btn btn-default btn-sm btn-xs" type="submit" value="update" onclick = " return confirm ('Anda Yakin Memproses Data?');") /><br>
<br>
<div id="content10"> Klik "Update" Untuk Proses Data </div></br>
</form></br>

</body>
<p style="text-align:center;"><font size="2">1.  Sebelum "UPDATE" Pastikan Data Titipan Benar</font></p>
<p style="text-align:center;"><font size="2">2.  Data Titipan Benar Jika <strong> </font><font color="red" size="3">Nilai Setoran, Jumlah Anggota, Tanggal Titipan Dan Tanggal Tujuan Adalah Benar</font></strong></p>
<p style="text-align:center;"><font size="2">3.  Data Titipan Harus Dipindahkan Segera (Tanggal Berjalan) Setelah Semua Cabang Mobile Telah Melakukan Titipan</font></p>
<p style="text-align:center;"><font size="2">4.  Jika Data Titipan Tidak Benar Jangan Pernah Klik "Update"</font></p>
<p style="text-align:center;"><font size="2">5. Pastikan Data Titipan Benar Baru Boleh Klik "Update"</font> </p>
</html> 