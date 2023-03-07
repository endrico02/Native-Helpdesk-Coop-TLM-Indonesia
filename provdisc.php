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
                        'url': 'addtable/help_desk_pdhtdisc_1.php',
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
					$('#content20').html('Loading ...');
					$('#content20').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht1.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content20').html(html);
                        }
                    });
                });
				$('#provht125').submit(function(e){
                    e.preventDefault();
					$('#content3').html('<img src="images/loading.gif"/>Loading..');
					$('#content3').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht_125.php',
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
                        'url': 'addtable/help_desk_pdhttopup.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content4').html(html);
                        }
                    });
                });
            });
            	$().ready(function(){
                $('#prov').submit(function(e){
                    e.preventDefault();
					$('#provisi').html('<img  src="images/loading.gif"/>');
					$('#provisi').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_provisi.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#provisi').html(html);
                        }
                    });
                });
			});
			$().ready(function(){
                $('#hak').submit(function(e){
                    e.preventDefault();
					$('#htarik').html('<img  src="images/loading.gif"/>');
					$('#htarik').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_hak_tarik.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#htarik').html(html);
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
<header><h3 class="tabs_involved">Dikson Provisi Dan Hak Tarik Agustus 2021</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#pdht_125" data-toggle="tab">Discount 1.25%</a></li>
                            <li><a href="#pdht_1" data-toggle="tab">Discount 1%</a></li>
                            <!-- <li ><a  href="#pdht1" data-toggle="tab">ProvHT SERTAmu</a></li>
							<li ><a  href="#topup" data-toggle="tab">ProvHT Top Up</a></li> -->
							

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="pdht_125">
							Discount Provisi & Hak Tarik  1.25% Area NTT
							<p><form id="provht125" method="post">
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
								</form>
									<div id="content3"></div>
							</p>
							</div>
                            <div class="tab-pane fade" id="pdht_1">
							Discount Provisi & Hak Tarik 1% Area Bali & NTB
                            <p><form id="Input">
										<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
										<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content"></div></p>
                            </div>
							<!-- <div class="tab-pane fade" id="pdht_1">
							ProvHT SERTAmu
							<p><form id="Input2">
										<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
										<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content20"></div></p>
                            </div>
							<div class="tab-pane fade" id="topup">
							ProvHT TOP UP
                                <p><form id="Input4">
										<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
										<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content4"></div></p>
                            </div> -->
                            <!-- <div class="tab-pane fade" id="prov" method="post">
                           Provisi (Manual)
                                <p><form id="prov">
									<input class="col-lg-8"  name="cif" placeholder="masukan cif" required></input>
									<input type="submit" value='panggil'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="provisi"></div></p>
                            </div>
                            <div class="tab-pane fade" id="hak" method="post">
							Hak Tarik (Manual)
                                <p><form id="hak">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="htarik"></div></p>
                            </div> -->


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

