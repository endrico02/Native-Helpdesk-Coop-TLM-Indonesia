<html>
</head>
 <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <title></title>   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
	<style>
	body{background-image:url(logo37.gif); background-size:20%;}
			table, td, th {
			border: 1px solid black;
		}

		table {
			border-collapse: collapse;
			width: 80%;
			
		}

		th {
			height: 50px;
			background-color:#4CAF50;
			text-align: center;
			color: white;
		}
		td {
			padding: 10px;
		}
		
		tr:hover{background-color:#f5f5f5}
		
		
.blink {
  animation: blink-animation 1s steps(5, start) infinite;
  -webkit-animation: blink-animation 1s steps(5, start) infinite;
}
@keyframes blink-animation {
  to {
    visibility: hidden;
  }
}
@-webkit-keyframes blink-animation {
  to {
    visibility: hidden;
  }
}		
		
	</style>
	
<section id="main" class="column">

<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
       
        <?php
error_reporting (E_ALL ^ E_DEPRECATED);
$host="192.168.21.212";
$dbname="postgres20";
$user="postgres";
$password="s3p3d@";
$port="5432";
$link= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");

/*query*/
$query = pg_query ("SELECT 100 as kantor,
					   m_02_001.l_000017 as gl1,
					   s_02_008.l_000000 as nama1,
					   s_02_008.l_000014 as kd_analisa,
					   s_02_005.s_000000 as analisa,
					   s_02_010.l_000013 as klp_gl,
					   h_00_001.h_000001 as tanggal,
					   SUM(m_02_001.l_000029) as sld_kemarin, 
					   SUM(m_02_001.l_000032) as sld_akhir
				  FROM m_02_001, s_02_010, s_02_008, s_02_005, h_00_001
				 WHERE m_02_001.l_000012 = '1' AND m_02_001.l_000017 in ('199') AND
					   m_02_001.l_000025 = s_02_010.l_000019 AND
					   m_02_001.l_000017 = s_02_008.l_000017 AND
					   s_02_008.l_000014 = s_02_005.l_000014 AND
					   m_02_001.G_000001 <> '800' 
				GROUP BY 
					   m_02_001.l_000017,
					   s_02_008.l_000000,
					   s_02_008.l_000014,
					   s_02_005.s_000000,
					   s_02_010.l_000013,
					   h_00_001.h_000001
				 ORDER BY m_02_001.l_000017;"); //query ke postgres database
$result= ($query); //membuat variabel yang menagkap hasil query diatas
$panggil = pg_fetch_object($result);
$sld_akhir199=$panggil->sld_akhir;
$query299 = pg_query ("SELECT 100 as kantor,
					   m_02_001.l_000017 as gl1,
					   s_02_008.l_000000 as nama1,
					   s_02_008.l_000014 as kd_analisa,
					   s_02_005.s_000000 as analisa,
					   s_02_010.l_000013 as klp_gl,
					   h_00_001.h_000001 as tanggal,
					   SUM(m_02_001.l_000029) as sld_kemarin, 
					   SUM(m_02_001.l_000032) as sld_akhir
				  FROM m_02_001, s_02_010, s_02_008, s_02_005, h_00_001
				 WHERE m_02_001.l_000012 = '1' AND m_02_001.l_000017 in ('299') AND
					   m_02_001.l_000025 = s_02_010.l_000019 AND
					   m_02_001.l_000017 = s_02_008.l_000017 AND
					   s_02_008.l_000014 = s_02_005.l_000014 AND
					   m_02_001.G_000001 <> '800' 
				GROUP BY 
					   m_02_001.l_000017,
					   s_02_008.l_000000,
					   s_02_008.l_000014,
					   s_02_005.s_000000,
					   s_02_010.l_000013,
					   h_00_001.h_000001
				 ORDER BY m_02_001.l_000017;"); //query ke postgres database
  $result299= ($query299); //membuat variabel yang menagkap hasil query diatas
									  $panggil299 = pg_fetch_object($result299);
                                      $sld_akhir299=$panggil299->sld_akhir;
 if($sld_akhir199+$sld_akhir299==0){
 	echo '<span class="blink"><td><p style="text-align:center; "><strong><font color="#65000b" size = "9">&#9733; BALANCE &#9733; </font><font color="#65000b" size = "6"></font></strong></p></td></span>';}
 	else{echo '<td><p style="text-align:center;"><strong><font color="red" size = "9"><span class="blink">&#128123;</span> OMG SELISIH '.number_format($sld_akhir199+$sld_akhir299).' <span class="blink">&#128123;</span></font></strong></p></td>';}        

?>
<div style="width:100%;">
	
	<section>
	 <div class="table-responsive">
	 	<div align="center"> 
                    <table>
                                     <thead>
                                    <th><font color='#65000b'>RAK AKTIVA</font></th>
									<th><font color='#65000b'>RAK PASIVA</font></th>
									
                                    </thead>
                                    <tbody>
                                     <?php
                                       
                                    
                                           
                                                                      
                                         echo "<tr>
                                    
                <td><strong><font color='#65000b'><p style='text-align:center;'>".number_format($sld_akhir199)."</p></font><strong></td>
                <td><strong><font color='#65000b'><p style='text-align:center;'>".number_format(ABS($sld_akhir299))."</p></font><strong></td>
                                           
                                           
                                             
				                   
                                        </tr>"; 
                                           
                
        
                                            ?>
                                    </tbody>
                                
                                </table>
                                </div>
                                 </div>




<script src="assets/js/jquery.min.js"></script> 
		<script src="assets/js/bootstrap.min.js"></script>             
				</article>
					</div>
					<!---->
					
		<!---->
	
					<!---->
				<!-- /.table-responsive -->  
	
</body>
</section>

