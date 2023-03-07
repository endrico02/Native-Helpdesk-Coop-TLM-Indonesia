<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#pinaoku').submit(function(e){
                    e.preventDefault();
					$('#pindah_ao_kumulatif').html('<img  src="images/loading_2.gif"/>');
					$('#pindah_ao_kumulatif').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_salahsetor.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#pindah_ao_kumulatif').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Salah Setor Anggota</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="pinaoku" method="post">
							<input class="col-lg-8"  name="kd_ao" placeholder="Masukan Kode AO" required></input>
							<input class="col-lg-2"  name="kd_kel" placeholder="Masukan Kode Kelompok" required></input>
							<button type="submit" value='panggil'> Panggil</button>
							<button type="reset" onClick="location.reload()">Reset</button>
						</form>
						<br>
						<div id="pindah_ao_kumulatif"></div>
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
<p style="text-align:center;"><strong><font size="5" color="green">*  Pastikan Tanggal Setor Benar </font></strong></p>
<p style="text-align:center;"><strong><font size="5" color="green">*  Pastikan Kode Kelompok Benar</font></strong></p>
<p style="text-align:center;"><strong><font size="5" color="green">*  Pastikan Jumlah Anggota Benar</font></strong></p>
<p style="text-align:center;"><strong><font size="5" color="green">*  Pastikan Nama dan CIF Nasabah Benar</font></strong></p>
</section>

