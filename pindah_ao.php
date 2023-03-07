<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#Input3').submit(function(e){
                    e.preventDefault();
					$('#pindah_ao').html('<img  src="images/loading.gif"/>');
					$('#pindah_ao').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pindah_ao.php',
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
<article class="module width_full">
<header><h3 class="tabs_involved">Pindah AO</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="Input3" method="post">
									<input class="col-lg-8"  name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='panggil'/>
									<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="pindah_ao"></div>
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

