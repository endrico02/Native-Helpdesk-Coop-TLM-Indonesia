<!DOCTYPE html>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?></h4>
<article class="module width_full">
<html lang="en">
<body>
			<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <font color="#009900"><b>ENTRY DATA NASABAH</b></font> 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
								<table id="autohide" class="display responsive nowrap" cellspacing="0" width="100%">
									<thead> 
										<tr>
											<th>Kd Cbg</th>
											<th>Cabang</th>
											<th>CIF</th>
											<th>Nama</th>  
											<th>Jenis Kelamin</th>  
											<th>User</th>  
											<th>Tgl. Input</th> 
										
										</tr> 
									</thead> 
									<tbody> 
									<?php
									//include ("conn/fungsi.php");
									//koneksi_db();
									$query = pg_query("select m_00_001.g_000001 as a,
       o_00_002.s_000000 as b,
       m_00_001.c_000001 as c,
       m_00_001.a_000057 as d,
       m_00_001.c_000009 as e,
       m_00_001.g_000003 as f,
       m_00_001.g_000007 as g              
from m_00_001, o_00_002, h_00_001
where pg_catalog.date(m_00_001.g_000007) = h_00_001.h_000001 and o_00_002.o_000001 = m_00_001.g_000001
order by m_00_001.g_000001"); 
										while ($result = pg_fetch_object($query)) { $tiket=$result->e;
										echo "<tr> 
											<td>$result->a</td> 
											<td>$result->b</td>
											<td>$result->c</td>
											<td>$result->d</td>
											<td>".$loti = "";
													if($tiket <= 2) {
													$loti = '<html><span class="label label-primary">Perempuan</span></html>';
													}
													else {
													$loti = '<html><span class="label label-success">Laki-Laki</span></html>';
													};
													echo $loti."</td>
									</td>
											<td>$result->f</td>
											<td>".date("d M y", strtotime($result->g))."</td>
											</tr>";
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