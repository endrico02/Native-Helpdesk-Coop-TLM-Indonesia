<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
</script>
<script>
			$().ready(function(){
                $('#cek').submit(function(e){
                    e.preventDefault();
					$('#cek2').html('<img  src="images/loading.gif"/>');
					$('#cek2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/isi2.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#cek2').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Query Proses</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="cek" method="post">
									<input type="submit" value='panggil'/>
									<button type="reset" onClick="location.reload()">Reset</button>
						</form>
									<div id="cek2"></div>
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
</body>
</section>
</body>
</section>