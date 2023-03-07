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
                        'url': 'addtable/help_desk_kemarin.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content').html(html);
                        }
                    });
                });
				$('#provht25').submit(function(e){
                    e.preventDefault();
					$('#content3').html('<img src="images/loading.gif"/>');
					$('#content3').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_besok.php',
                        'data': $(this).serialize(),
						'cache': false,
						'async': true,
                        'success': function(html){
                            $('#content3').html(html);
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
<?php
include_once ("conn/fungsi.php"); 
  
$result = "  SELECT h_000003,h_000002 from h_00_001 ";
$result1 = pg_query($result) or die(pg_error()); 
while($row = pg_fetch_assoc($result1)) { 
$bayar  = $row['h_000003'] ; 
$bayar1  = $row['h_000002'] ; 
}


?>


<article class="module width_full">
<header><h3 class="tabs_involved">Provisi Dan Hak Tarik</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
	<section>
	<div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        <ul class="nav nav-tabs" style="margin-bottom: 15px;">
                            <li><a href="#pdht25" data-toggle="tab">Tanggal Tujuan</a></li>
                            <li><a href="#pdht2" data-toggle="tab">Tanggal Asal</a></li>
                           
							

                        </ul>
                        <div id="myTabContent" class="tab-content">
                            <div class="tab-pane fade active in" id="pdht25">
							<font color="green" size="3">Pindah Data Titipan Mobile Ke Tanggal Tujuan <?php
                                                            echo "<font color='green' size='6'><br> $bayar</font>";                  
                                                                            ?> </font>
							<p><form id="provht25" method="post">
									<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
									<button type="reset" onClick="location.reload()">Reset</button>
								</form>
									<div id="content3"></div>
							</p>
							</div>
                            <div class="tab-pane fade" id="pdht2"><font color="green" size="3">Pindah Data Titipan Mobile Ke Tanggal Asal <?php
                                                            echo "<font color='green' size='6'><br> $bayar1</font>";                  
                                                                            ?></font>
							
                                <p><form id="Input">
										<input class="btn btn-default btn-sm btn-xs" type="submit" value='Panggil Data'/>
										<button type="reset" onClick="location.reload()">Reset</button>
									</form>
									<div id="content"></div></p>
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

