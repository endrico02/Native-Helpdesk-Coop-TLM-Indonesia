<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#aidi').submit(function(e){
                    e.preventDefault();
					$('#tampil').html('<img src="images/loading_2.gif"/>');
					$('#tampil').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_salahsetor_update.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#tampil').html(html);
                        }
                    });
                });
            });
			
        </script>
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$kd_kel= isset($_REQUEST['kd_kel']) ? $_REQUEST['kd_kel']:"kosong";
$kd_ao= isset($_REQUEST['kd_ao']) ? $_REQUEST['kd_ao']:"kode_ao kosong";
//echo $cabang.$cif;
//exit;
$query = pg_query("	SELECT 	tagihan_kelompok_tbl.nama as nama , mobile_absen.no_rek as norek,
							tagihan_kelompok_tbl.nama_kelompok as namkel, mobile_absen.kd_kel as kdkel,
							tagihan_kelompok_tbl.nama_staff as ao, mobile_absen.usr_insert as kdao, 
							mobile_absen.server_date as tgl_hari_ini 

					FROM 	tagihan_kelompok_tbl , mobile_absen
					WHERE 	mobile_absen.no_rek = tagihan_kelompok_tbl.norek and 
							mobile_absen.kd_kel = tagihan_kelompok_tbl.kd_kel and 
							mobile_absen.usr_insert =  tagihan_kelompok_tbl.kdstaf and
							mobile_absen.server_date = (select h_000001 from h_00_001) and 
							mobile_absen.usr_insert = '$kd_ao' and mobile_absen.kd_kel = '$kd_kel' 
	order by tagihan_kelompok_tbl.nama;");

$result =pg_query ("SELECT 	
							tagihan_kelompok_tbl.nama_kelompok as namkel, mobile_absen.kd_kel as kdkel,
							tagihan_kelompok_tbl.nama_staff as ao, mobile_absen.usr_insert as kdao

					FROM 	tagihan_kelompok_tbl , mobile_absen
					WHERE 	mobile_absen.no_rek = tagihan_kelompok_tbl.norek and 
							mobile_absen.kd_kel = tagihan_kelompok_tbl.kd_kel and 
							mobile_absen.usr_insert =  tagihan_kelompok_tbl.kdstaf and
							mobile_absen.server_date = (select h_000001 from h_00_001) and 
							mobile_absen.usr_insert = '$kd_ao' and mobile_absen.kd_kel = '$kd_kel' 
		group by 			tagihan_kelompok_tbl.nama_kelompok, mobile_absen.kd_kel, tagihan_kelompok_tbl.nama_staff, 
							mobile_absen.usr_insert;");
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

<header><h3 class="tabs_involved"><strong><font color="green" size="2" > 
	<?php
  						while ($row = pg_fetch_array($result)){
                        echo"".$row['namkel']." (".$row['kdkel'].") / ".$row['ao']." (".$row['kdao'].") "; }                  
                        ?></font></strong></h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	 <div class="table-responsive">
	 	<div align="center"> 
                    <table>
                          <thead>
                           <th width="50px">No</th>
                            <th width="400px">Nama</th>
							 <th width="100px">CIF</th>
							   <th width="300px">Tanggal Setor</th>
                                      </thead>
                                    <tbody>
                                     <?php
                                        $no     = 1;
                                          

                                            while ($row = pg_fetch_array($query))
                                                    {
                                                                      
                                         echo "<tr>
                                          <td>".$no."</td>
                                         	<td>".$row['nama']."</td>
                                             <td>".$row['norek']."</td>
                                                <td>".$row['tgl_hari_ini']."</td> 
                                             
				                   
                                        </tr>"; 
                                            $no++;
                
        
                                            }?>
                                    </tbody>

                                </table>
                                </div>
                                 </div>
                                  </div>
                               
<form id="aidi" method="post">
<input type="submit" value='PROSES'/>
<input name="kd_ao" type="hidden" class="form-control" value="<?php echo $kd_ao?>">
 <input name="kd_kel" type="hidden" class="form-control" value="<?php echo $kd_kel?>">
<div id="tampil"></div>
</form>

				<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-editable.js" type="text/javascript"></script> 
                    
				
</body>
</html>