<!DOCTYPE html>
<html>
<head>
	<title>Pindah Hari Tagih</title>
	<script src="jquery.min.js"></script>
</head>	 
<body>
		<label for="kd_kel">Masukan Kode Kelompok :</label>
		<input type="text" name="kd_kel" id="kd_kel" autofocus><br>
		<input type="submit" name="tampil" id="tampil" value="tampil">
		
		<div id="result"></div>

		<br><br><br>

    <div id="result2"></div>
	<script>  
       $(document).ready(function(){  
          $('#tampil').click(function(){  
               var kd_kel = $("#kd_kel").val();  
               
               $.ajax({  
                    url:'proses_tampil_kelompok.php',  
                    type:'POST',  
                    data:'kd_kel=' + kd_kel,  
                    success:function(response){  
                         $('#result').html(response);  
                    }  
               });  
          });  
     });    
   </script> 
</body>
</html>