<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                $('#Input').submit(function(e){
                    e.preventDefault();
					$('#content').html('<img src="images/loading.gif"/>Loading..');
					$('#content').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_tarjam.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content').html(html);
                        }
                    });
                });
				$('#Input2').submit(function(e){
                    e.preventDefault();
					$('#content2').html('Loading ...');
					$('#content2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_ulangpermohonan.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content2').html(html);
                        }
                    });
                });
				$('#Input3').submit(function(e){
                    e.preventDefault();
					$('#content3').html('<img src="images/loading.gif"/>');
					$('#content3').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_aktiv.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content3').html(html);
                        }
                    });
                });
				$('#Input4').submit(function(e){
                    e.preventDefault();
					$('#content4').html('<img src="images/loading.gif"/>');
					$('#content4').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_fasilitas.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content4').html(html);
                        }
                    });
                });
            });
			
        </script>
<script type="text/javascript">
	
	$(document).ready(function() 
    	{ 
      	  $(".tablesorter").tablesorter(); 
   	 } 
	);
	$(document).ready(function() {

	//When page loads...
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content

	//On Click Event
	$("ul.tabs li").click(function() {

		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content

		var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active ID content
		return false;
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
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#ao" data-toggle="tab">AKTIF</a></li>
                            <li><a href="#profile" data-toggle="tab">TARJAM</a></li>
                            <li ><a  href="#cabang" data-toggle="tab">ULANG PERMOHONAN</a></li>
							<li ><a  href="#fasilitas" data-toggle="tab">FASILITAS</a></li>
                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="ao">
							AKtiF
							<p><form id="Input3" method="post">
									<input class="col-lg-8"  name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='panggil'/>
									<button type="reset" onClick="location.reload()">Reset</button>
								</form>
									<div id="content3"></div>
							</p>
							</div>
                            <div class="tab-pane fade" id="profile">
							TARJAM
                                <p><form id="Input">
									<input class="col-lg-8" name="cif" required></input>
										<input class="btn btn-default btn-sm btn-xs" type="submit" value='panggilinput'/>
										<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content"></div></p>
                            </div>
							<div class="tab-pane fade" id="cabang">
							ULANG PERMOHONAN
                                <p><form id="Input2">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='pilih cabang'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content2"></div></p>
                            </div>
							<div class="tab-pane fade" id="fasilitas" method="post">
							FASILITAS
                                <p><form id="Input4">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='pilih cabang'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content4"></div></p>
                            </div>
                        </div>
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

