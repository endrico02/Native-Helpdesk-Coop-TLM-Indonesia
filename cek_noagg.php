<!DOCTYPE html>
<section id="main" class="column">
<h4 class="alert_success">
	<form class="navbar-search">
	<?php include ("php/tgl.php"); ?>
	<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#Input3').submit(function(e){
                    e.preventDefault();
					$('#pindah_ao').html('<img  src="images/loading.gif"/>');
					$('#pindah_ao').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pindah_aoss.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#pindah_ao').html(html);
                        }
                    });
                });
			});
			
        </script>
</form></h4>
<article class="module width_full">
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           <b> TRANSAKSI SIMPANAN - PENARIKAN </b>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
								<table id="autohide" class="display responsive nowrap" cellspacing="0" width="100%">
									<thead> 
										<tr> 
											<th>Cabang</th>
											<th>CIF</th>
											<th>tglReal</th>
											<th>rek.Agg</th> 
											<th>produk</th> 
											<th>hr.tgh</th>
											<th>AO</th> 
											<th>Klpmk</th>
											<th>Plafond</th>
											<th>sisapiut</th> 
											<th>jkw</th> 
											<th>bunga</th>
											<th>rek.Tab</th>
											<th>mgCcl</th>
										</tr> 
									</thead> 
									<tbody> 
									<?php
									//include ("conn/fungsi.php");
									//koneksi_db();
									$query = pg_query("SELECT ktr, namacabang, view_kartu_setoran_sesama_baru.norek as nrk, nama, 			    tgltagih,namastaf,nama_kelompok, plafond, produk, sisapi, jkwkt, 
											       sukubunga, tglreal,mgccl, norektab,m_01_002.no_agg as no_agg
											  FROM view_kartu_setoran_sesama_baru,m_01_002
											  WHERE m_01_002.c_000001 = view_kartu_setoran_sesama_baru.norek AND m_01_002.no_agg is null"); 
										while ($result = pg_fetch_object($query)) { 
										echo "<tr> 
											<td>$result->namacabang</td> 
											<td><a href='index.php?content=cek_noagg' onclick='javascript:void window.open('addtable/100.php','1452052199801','width=700,height=300,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=0,top=120,left=500,botom=100');return false;'>$result->nrk</a></td>
											<td>".date("d-m-Y", strtotime($result->tglreal))."</td>
											<td align='center'><a href='#'>".$asl = "";
													 if(empty($result->no_agg)) {
													 $asl = "<font color='red'><i>empty</i></font>";
													 }else {
													$asl = "<font color='green'>$result->no_agg</font>";
													};
													echo $asl."</a>
											</td>
											<td>$result->produk</td>
											<td>$result->tgltagih</td>
											<td>$result->namastaf</td>
											<td>$result->nama_kelompok</td>
											<td align='right'>".number_format(ABS($result->plafond), 0, ',', '.')."</td>
											<td align='right'>".number_format(ABS($result->sisapi), 0, ',', '.')."</td>
											<td>$result->jkwkt</td>
											<td>$result->sukubunga</td>
											<td align='center'>".$asla= "";
													 if(empty($result->norektab)) {
													 $asla = "<font color='red'><i>empty</i></font>";
													 }else {
													$asla = "<font color='green'>$result->norektab</font>";
													};
													echo $asla."
											</td>
											<td>$result->mgccl</td>
											";
												
                            } ?>
									</tbody> 
								</table>
                            </div> 
                            <!-- /.table-responsive -->   

                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        <!-- /#page-wrapper -->    
     </div>
    <!-- /#wrapper -->
   
</body>
<!--a href="export_penarikan.php">export</a-->
</article>
	<div class="spacer"></div>
</section>
</html>                	
                                        
                                        

                                   
                                        
                                        
                                        
                                        
                                       
                                        
                                    
            
     

