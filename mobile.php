<html>
</head>
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
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
       
        <?php
error_reporting (E_ALL ^ E_DEPRECATED);

		$host="192.168.21.212";
$dbname="postgres21";
$user="postgres";
$password="s3p3d@";
$port="5432";
    $link = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);

$result = pg_query("select mobile_cashier_trx.kd_cab as cab,mobile_cashier_trx.kd_cashier as ksr,mobile_cashier_trx.kd_ao as ao,s_00_006.s_000000 as nama,
							mobile_cashier_trx.trx_date as date, mobile_cashier_trx.trx_amount as setor, mobile_cashier_trx.trax_timestamp as times
							from mobile_cashier_trx,h_00_001,s_00_006 where mobile_cashier_trx.trx_date = h_00_001.h_000001 
							and s_00_006.a_000012 = mobile_cashier_trx.kd_ao
							order by kd_cab, trax_timestamp");    

if (!$result) {
    die ('SQL Error: ' . pg_error($link));
}

?>
<article class="module width_full">
<header><h3 class="tabs_involved">Mobile Cashier Trax</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	 <div class="table-responsive">
	 	<div align="center"> 
                    <table>
                                             <thead>
                                             	          <th>No</th>
                                     <th width="100px">Kantor</th>
									
									<th width="100px">Kode AO</th>
									<th width="400px">Nama AO</th>
									
									<th width="300px">Jumlah Setoran</th>
									<th width="500px">Detail Trax Times</th>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $no     = 1;
                                          

                                            while ($row = pg_fetch_array($result))
                                                    {
                                                                      
                                         echo "<tr>
                                          <td>".$no."</td>
                                         <td>".$row['cab']."</td>
                                          

                                            <td>".$row['ao']."</td>
                                            <td>".$row['nama']."</td>
                                             
                                              <td>".number_format($row['setor'])."</td>
                                               <td>".$row['times']."</td> 
                                             
				                   
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

        <?php
error_reporting (E_ALL ^ E_DEPRECATED);

		$host="192.168.21.212";
$dbname="postgres21";
$user="postgres";
$password="s3p3d@";
$port="5432";
    $link = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);

$result = pg_query("select ktr, kdstaf, nama_staff from tagihan_kelompok_tbl
where ktr in ('024','031','035','036','038','039','040','041','042','043','044','045','047') and substr(tgl_tagih,1,1)::double precision = (SELECT date_part('dow',h_000001) from h_00_001)
and kdstaf not in (select kd_ao from mobile_cashier_trx,h_00_001 where mobile_cashier_trx.trx_date = h_00_001.h_000001)
group by ktr,kdstaf,nama_staff
order by kdstaf;
");    

if (!$result) {
    die ('SQL Error: ' . pg_error($link));
}

?>






<article class="module width_full">
<header><h3 class="tabs_involved">Belum Melakukan Mobile Cashier Trax</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	 <div class="table-responsive">
	 	<div align="center"> 
                    <table>
                                             <thead>
                                    <th width="50px">No</th>
                                    <th width="50px">Kantor</th>
									<th width="100px">Kode AO</th>
									<th width="400px">Nama AO</th>
									
                                    </thead>
                                    <tbody>
                                     <?php
                                        $no     = 1;
                                          

                                        while ($row = pg_fetch_array($result))
                                                    {
                                                                      
                                        echo "<tr>
                                        <td>".$no."</td>
                                        <td>".$row['ktr']."</td>
                                        <td>".$row['kdstaf']."</td>
                                        <td>".$row['nama_staff']."</td>
                                               
                                             
				                   
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



					</div>
					<!---->
					</div>
					</div>
					</div>
					</div>
				</div>
		<!---->
		<hr>
					<!---->
				<!-- /.table-responsive -->  
	
</body>
</section>

