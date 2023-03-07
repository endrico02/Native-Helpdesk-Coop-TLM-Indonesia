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
                        'url': 'addtable/help_desk_update_lunas.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#lunas').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Cek Pelunasan Dini</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="prov" method="post">
							<input class="col-lg-8"  name="cif" placeholder="Masukan Nomor CIF" required></input>
							<input type="submit" value='panggil'/>
							<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="lunas"></div>
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
</section>

