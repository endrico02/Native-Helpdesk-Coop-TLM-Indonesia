<html>
</head>
<section id="main" class="column">
<h4 class="alert_success"><?php include ("php/tgl.php"); ?> </h4>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script>
			$(document).ready(function(){ 
				$('#takop1').submit(function(e){
					//alert("masuk");
                    e.preventDefault();
					$('#content_takop').html('<img src="images/loading.gif"/>');
					$('#content_takop').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/tampil_tutup_takop.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content_takop').html(html);
                        }
                    });
                });


		$('#noagg').submit(function(e){
					//alert("masuk");
                    e.preventDefault();
					$('#content_takop').html('<img src="images/loading.gif"/>');
					$('#content_takop').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/tampil_tutup_takop.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content_takop').html(html);
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
<header><h3 class="tabs_involved">Bagi Pokok Wajib (Tutup Takop)</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body>
<div class="col-lg-12">
<a target="_blank" href="cabang_tutup_takop.php"><button type="button" class="btn btn-danger" >Lihat Cabang Tutup Takop</button></a>
<a href="download1.php"><button type="button" class="btn btn-danger" >Cetak Tutup Takop Sebelum</button></a>
<a target="_blank" href="cek_neraca.php"><button type="button" class="btn btn-danger" >Cek Neraca</button></a>

    <br><br>
	<b>Masukan Kode Cabang</b>
        <p><form id="takop1">
			<input class="col-lg-8" name="kd_cbg" required  autofocus></input>
			<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
			<button type="reset" onClick="location.reload()">Reset</button>
			</form>
			<div id="content_takop"></div></p>
  </div>
</body>
	
</div>
</section>
</div>
</div>
</article>

