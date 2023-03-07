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
                        'url': 'addtable/help_desk_setoran_melebihi_kewajiban.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#kewajiban').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Edit Setoran Melebihi Kewajiban</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="prov" method="post">
							<input class="col-lg-8"  name="no_cif" placeholder="masukan no_cif" required></input>
							<input type="submit" value='panggil'/>
							<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="kewajiban"></div>
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
<p style="text-align:center;"><font size="2">1.  Paste CIF </font></p>
<p style="text-align:center;"><font size="2">2.  Copy Nilai Jasa di Excell Kemudian beri angka 00 pada Jasa</font></p>
<p style="text-align:center;"><font size="2">3.  Di Excell Hapus nilai koma (.00) </font></p>
<p style="text-align:center;"><font size="2">4.  Minta Cabang Input Nilai</font></p>
<p style="text-align:center;"><font size="2">5a. Paste kembali nilai dari excell</font> <strong><font color="red" size="3">(Jika Cabang Input di Jaminan)</font></strong></p>
<p style="text-align:center;"><font size="2">5b. Tambahkan nilai hasil inputan cabang dengan nilai dari Excell </font><strong><font color="red" size="3">(Jika Cabang Input di pokok/jasa)</font></strong> Kemudian Paste</p>
</section>

