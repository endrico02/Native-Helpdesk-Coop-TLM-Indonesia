<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#Input3').submit(function(e){
                    e.preventDefault();
					$('#process3').html('<img  src="images/loading.gif"/>');
					$('#process3').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_process3',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#process3').html(html);
                        }
                    });
                });
			});
			
        </script>
<article class="module width_full">
<header><h3 class="tabs_involved">Proses Autodebet</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <form id="Input3" method="post">
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='1' disabled/>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='2' disabled/>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='3' />
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='4' disabled/>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='5' disabled/>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='6' disabled/>
									
						</form>
									
									<div id="process3"></div>
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

