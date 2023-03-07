<!doctype html>
<html lang="en">
  
</head>
<body>
  <form>
      <div class="side-by-side clearfix">
		<div>
			  
			  <select data-placeholder="choose your account offixer" style="width:350px;" id="ddw" name="nama_ao" class="chosen-select" tabindex="5">
				<option value=""></option>
				<?php
					 include ("dbconn.php");
					 
					 /*query */
					$result = pg_query ("select kd_cabang, nama_ao, kode_ao, nama_cabang from y_nomi_evaluasi where status_ao = '1'  order by kd_cabang, nama_ao ;"); //query ke postgres database
					$call= ($result); //membuat variabel yang menagkap hasil query diatas
					$row = pg_fetch_array($call); //?
					
					$group = array();
					
					while ($row = pg_fetch_assoc($result))
						 {
							 $kode_cabang[$row['nama_cabang']][$row['kode_ao']] = $row;
							 
						 }
						 foreach ($kode_cabang as $key => $group_ao)
						
						 {
							 echo '<optgroup label="'.$key.'">';
							 foreach ($group_ao as $nama_ao) 
							 {
								 echo '<option > '.$nama_ao['kode_ao'].' - '.$nama_ao['nama_ao'].'</option>';
							 }
							 echo '</optgroup>';
						 }
							
					?>

				<input type="submit" value="Submit">
			 </select>
		 </div>
	  

    </div>
  </div>
  <script src="jquery.min.js" type="text/javascript"></script>
  <script src="chosen.jquery.js" type="text/javascript"></script>
  <script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>
  
  </form>
  
</body>
</html>