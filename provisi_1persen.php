<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$().ready(function(){
                
				$('#Input1').submit(function(e){
                    e.preventDefault();
					$('#content1').html('<img src="images/loading.gif"/>');
					$('#content1').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht1_persen.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content1').html(html);
                        }
                    });
                });


                $('#Input2').submit(function(e){
                    e.preventDefault();
					$('#content2').html('<img src="images/loading.gif"/>');
					$('#content2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_pdht25_persen.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content2').html(html);
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

<body>
	<div class="container">
	<article class="module width_full">
	<header><h3 class="tabs_involved">Provisi Dan Hak Tarik 1% 24 Cabang</h3></header>
	<div class="row">
	<div class="panel-body"  style="width:100%;">
	<div class="table-responsive">

<div class="col-lg-12">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#pdht1_palu" data-toggle="tab">ProvHT 1% 24 Cabang</a></li>
                            <li><a href="#pdht25_palu" data-toggle="tab">ProvHT 2.5% 20 Cabang</a></li>

                        </ul>

                        <div id="myTabContent" class="tab-content">
                            
                            <div class="tab-pane fade" id="pdht1_palu">
							ProvHT 1% 24 Cbg
                                <p><form id="Input1">
									<input class="col-lg-8" name="cif" required>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content1"></div>
								</p>
                            </div>

                            <div class="tab-pane fade" id="pdht25_palu">
							ProvHT 2.5% 20 Cbg
                                <p><form id="Input2">
									<input class="col-lg-8" name="cif" required>
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content2"></div></p>
                            </div>
                           
                        </div>
                    </div>
                </div>   
            </div>
        </div>
    </div>
	</article>


<br><br><br>


<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-5">
<div class="jumbotron">
  <h2 class="display-4">ProvHT 1% 24 Cabang</h2>
  <hr class="my-4">
  <p class="lead" align="center">Nagekeo, Alor, Baa, Maronge,Praya, Sumbawa, Wewewa , Borong , Lembor, Bajawa, Waingapu, Melolo, Kapan, Panite, Kefa1, Halilulik, Kalukku, Insana, Lewa, Ruteng, Wolowaru, Lembata, Camplong dan Soa
</p>
  <hr class="my-4">
  <p class="lead"><h2 align="center" class="display-4">(Realisasi Agg Lanjutan)</h2></p>
</div>

</div>


<div class="col-md-5">
<div class="jumbotron">
  <h2 class="display-4">ProvHT 2.5% 20 Cabang</h2>
  <hr class="my-4">
  <p class="lead" align="center">Nagekeo, Alor, Baa, Wewewa , Borong , Lembor, Bajawa, Waingapu, Melolo, Kapan, Panite, Kefa1, Halilulik, Insana, Lewa, Ruteng, Wolowaru, Lembata, Camplong dan Soa
</p>
  <hr class="my-4">
  <p class="lead"><h2 align="center" class="display-4">(Realisasi Agg Baru)</h2></p>
</div>

</div>

</div>
</div>

<br><br>

	</body>


<p style="text-align:center;"><strong><font color="red" size="5"><u>Petunjuk Penggunaan :</u></font></strong></p>
<p style="text-align:center;"><font size="2">1.  Masukan Cif</font></p>
<p style="text-align:center;"><font size="2">2.  Klik Tombol "Panggil Data"</font></p>
<p style="text-align:center;"><font size="2">3.  Tunggu Sampai Data Ditampilkan</font></p>
<p style="text-align:center;"><font size="2">4.  Jika Data Sudah Ditampilkan, Klik Tombol "Proses"</font></p>
			</section>



</section>

