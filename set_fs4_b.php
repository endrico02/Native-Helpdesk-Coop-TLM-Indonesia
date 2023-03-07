<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#set').submit(function(e){
                    e.preventDefault();
                    //alert("masuk");
					$('#fs4').html('<img  src="images/loading.gif"/>');
					$('#fs4').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_fs4-b.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#fs4').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Set FS4-b</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="set" method="post">
									<input class="col-lg-8"  name="cif" placeholder="masukan cif" required autofocus></input>
									<input type="submit" value='panggil'/>
									<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="fs4"></div>
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

				<p style="text-align:center;"><strong><font color="red" size="4">Keterangan :</font></strong></p>
				<p style="text-align:center;"><font size="2">1. Masukan CIF </font></p>
				<p style="text-align:center;"><font size="2">2.  Klik panggil</font></p>
				<p style="text-align:center;"><font size="2">3.  Perhatikan Data Nasabah, FS4-b akan Tampil jika Frekuensi Bayar 2 Mingguan dan Tidak Tercetak di FS4 </font></p>
				<p style="text-align:center;"><font size="2">4.  Klik update</font></p>
	
</body>
</section>

