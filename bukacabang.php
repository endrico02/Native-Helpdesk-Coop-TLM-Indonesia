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
					'url': 'addtable/help_desk_buka_cabang.php',
					'data': $(this).serialize(),
					'cache': false,
					'async': true,
					'success': function(html){
						$('#buka_cabang').html(html);
					}
				});
			});
		});
	</script>
	<article class="module width_full">
		<header><h3 class="tabs_involved">Edit Buka Cabang</h3></header>
		<div class="row">
			<div class="panel-body"  style="width:100%;">
				<section>
					<div class="table-responsive">
						<body class="dt-example">
							<div class="col-lg-12">
                    			<div class="bs-example">
                        			<form id="prov" method="post">
										<button type="submit" class="btn btn-primary" >Panggil</button>
										<button type="reset" class="btn btn-light" onClick="location.reload()">Reset</button>
									</form>
									<div id="buka_cabang"></div>
								</div>
							</div>
						</body>
					</div>
				</section>
			</div>
		</div>
	</article>
</section>