<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                
				$('#Input1_palu').submit(function(e){
                    e.preventDefault();
					$('#content1_palu').html('<img src="images/loading.gif"/>');
					$('#content1_palu').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdhtdisc05_palu.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content1_palu').html(html);
                        }
                    });
                });
				$('#Input2_palu').submit(function(e){
                    e.preventDefault();
					$('#content2_palu').html('<img src="images/loading.gif"/>');
					$('#content2_palu').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdhtdisc1_palu.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content2_palu').html(html);
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
<header><h3 class="tabs_involved">DIKSON PROVISI DAN HAK TARIK AGUSTUS 2021 Area Sulawesi</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#pdht2_palu" data-toggle="tab">Provisi & Hak Tarik 1%</a></li>
                            <li><a href="#pdht1_palu" data-toggle="tab">Provisi & Hak Tarik 0.5%</a></li>
                        </ul>

                        <div id="myTabContent" class="tab-content">
                            
							<div class="tab-pane fade" id="pdht2_palu">
							Discount Provisi & Hak Tarik 1% Area Sulawesi
                                <p><form id="Input2_palu">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content2_palu"></div></p>
                            </div>

                            <div class="tab-pane fade" id="pdht1_palu">
							Discount Provisi & Hak Tarik 0.5% Area Sulawesi
                                <p><form id="Input1_palu">
									<input class="col-lg-8" name="cif" required></input>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content1_palu"></div></p>
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

<p style="text-align:center;"><strong><font color="red" size="5"><u>Petunjuk Penggunaan :</u></font></strong></p>

<p style="text-align:center;"><font size="2">1.  Pilih Tab "Provisi & Hak Tarik 1%" (Untuk Anggota Baru/Sisipan) Dan Tab "Provisi & Hak Tarik 0.5%" (Untuk Anggota Lanjutan) </font></p>
<p style="text-align:center;"><font size="2">2.  Masukan Cif </font></p>
<p style="text-align:center;"><font size="2">3.  Klik Tombol "Panggil Data"</font></p>
<p style="text-align:center;"><font size="2">4.  Tunggu Sampai Data Ditampilkan</font></p>
<p style="text-align:center;"><font size="2">5.  Jika Data Sudah Ditampilkan, Klik Tombol "Proses"</font></p>

</section>

