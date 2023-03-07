<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#prov').submit(function(e){
                    e.preventDefault();
					$('#provisi').html('<img  src="images/loading.gif"/>');
					$('#provisi').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_update_str.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#provisi').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Update Kartu Setoran</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="prov" method="post">
							<input class="col-lg-8"  name="cif" placeholder="Masukan CIF : " required></input>
							<input type="submit" value='panggil'/>
							<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="provisi"></div>
                    </div>
                </div>
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
<p style="text-align:center;"><strong><font size="6" color = 'green'>Perhatian!!! Baca Petunjuk Dahulu Sebelum Proses!</font></strong></p>	
<p style="text-align:center;"><font size="2">1.  Pastikan Persen Pinjaman 2.50 </font></p>
<p style="text-align:center;"><font size="2">2.  Jika Tidak 2.50 Jangan Di Update</font></p>
<p style="text-align:center;"><font size="2">3.  Lihat Tanggal Permohonan</font></p>
<p style="text-align:center;"><font size="2">4.  Jika Tanggal Permohonan Bukan Hari Ini Boleh Di Update</font></p>
</section>