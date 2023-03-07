<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                
				$('#takop1').submit(function(e){
					//alert("masuk");
                    e.preventDefault();
					$('#content_takop').html('<img src="images/loading.gif"/>');
					$('#content_takop').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_aktif_takop.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content_takop').html(html);
                        }
                    });
                });
				$('#tabum1').submit(function(e){
                    e.preventDefault();
					$('#content_tabum').html('<img src="images/loading.gif"/>');
					$('#content_tabum').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/helpdesk_aktif_tabum.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content_tabum').html(html);
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
<header><h3 class="tabs_involved">Aktif Takop dan Tab Umum</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#takop" data-toggle="tab">Takop</a></li>
                            <li><a href="#tabum" data-toggle="tab">Tab Umum</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            
							<div class="tab-pane fade" id="takop">
							TaKop
                                <p><form id="takop1">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content_takop"></div></p>
                            </div>

                            <div class="tab-pane fade" id="tabum">
							TaBum
                                <p><form id="tabum1">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content_tabum"></div></p>
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
<p style="text-align:center;"><strong><font size="6" color = 'green'>Perhatian!!! Baca Petunjuk Dahulu Sebelum Proses!</font></strong></p>	
<p style="text-align:center;"><font size="2">1.  Klik Tab Takop jika mau mengaktifkan Tabungan Koperasi atau Klik Tab Tabum jika mau mengaktifkan Tabungan Umum </font></p>
<p style="text-align:center;"><font size="2">2.  Masukan Nomor Rekening </font></p>
<p style="text-align:center;"><font size="2">3.  Klik Tombol Panggil</font></p>
<p style="text-align:center;"><font size="2">4.  Klik Tombol Proses untuk Mengubah Status Menjadi Aktif</font></p>
</section>

