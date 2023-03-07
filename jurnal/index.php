<!DOCTYPE html>
<html>
<head>
	<title>Download Jurnal</title>
	<script src="jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha256-916EbMg70RQy9LHiGkXzG8hSg9EdNy97GazNG/aiY1w=" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha256-siyOpF/pBWUPgIcQi17TLBkjvNgNQArcmwJB8YvkAgg=" crossorigin="anonymous" />

</head>	 
<body>
	<div class="container">
		<br>
		<form action="download.php" method="post">
		<div class="panel panel-default">
		    <div class="panel-heading">
		    	<div class="row">
		    		<div class="col-md-6"><h2>Download Jurnal</h2></div>
		    		<div class="col-md-6">
		    			<div class="row">
		    				<div class="col-md-4"></div>
		    				<div class="col-md-4"></div>
		    				<div class="col-md-4">
		    					<h4><a class="btn btn-success" href="../">Kembali</a></h4>
		    				</div>
		    			</div>
		    		</div>
		    	</div>
		    	<br>
		    </div>
		    <div class="panel-body">
		    	<div class="row">
					<div class="col-md-3"><label>Masukan Range Tanggal </label></div>
					<div class="col-md-3">
						<input type="text" class="form-control datepicker" id="date" name="date1" placeholder="Tanggal Awal" required autocomplete="off"> 
					</div>
					<div class="col-md-1">
						Sampai
					</div>
					<div class="col-md-3">
						<input type="text" class="form-control datepicker" id="date" name="date2" placeholder="Tanggal Akhir" required autocomplete="off"> 
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-md-3"><label>Masukan Kode GL </label></div>
					<div class="col-md-3">
						<input class="form-control" name="gl" type="text" placeholder="Masukan Kode GL">
					</div>
				</div>
		    </div>
		    <div class="panel-footer">
		    	<div id="lihat">
			      <button class="btn btn-primary" type="submit" name="download">Download</button><br>
			    </div>
		    </div>
		  </div>
		</form>
	</div>

    <!-- ambil jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

<!-- ambil bootstrap-datepicker -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha256-bqVeqGdJ7h/lYPq6xrPv/YGzMEb6dNxlfiTUHSgRCp8=" crossorigin="anonymous"></script>

	<script>
	  $(function(){
	    $(".datepicker").datepicker({
	      format: 'yyyy-mm-dd',
	      autoclose: true,
	      todayHighlight: true,
	    });
	  });
	</script>
</body>
</html>