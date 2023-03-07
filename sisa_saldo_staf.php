<!DOCTYPE html>
<html>
<head>
	<title>Hapus Sisa Saldo Staf Lapangan</title>
	<script src="jquery.min.js"></script>
</head>	 
<body>
    <h2>Hapus Sisa Saldo Staf Lapangan</h2>
    <div id="lihat">
      <br>
      <label for="kd_cab">Masukan Kode Cabang :</label>
      <input type="text" name="kd_cab" id="kd_cab" autofocus><br>
      <input type="submit" name="tampil" value="tampil" id="tampil" autofocus><br>
    </div>

		<div id="result"></div>

		<br><br><br>

    <div id="result2"></div>
	<script>  
       $(document).ready(function(){  
          $('#tampil').click(function(){  
               var kd_cab = $('#kd_cab').val();                 
               $.ajax({  
                    url:'proses_tampil_sisa_saldo_staf.php',  
                    type:'POST',  
                    data:'kd_cab=' +kd_cab,  
                    success:function(response){  
                         $('#result').html(response);  
                    }  
               });  
          });  
     });    
   </script> 

   <script>  
       $(document).ready(function(){  
          $('#tampil2').click(function(){  
               var norek = $('#norek').val();  
               alert('norek masuk');
               $.ajax({  
                    url:'proses_tampil_cif.php',  
                    type:'POST',  
                    data:'norek=' +norek,  
                    success:function(response){  
                         $('#result').html(response);  
                    }  
               });  
          });  
     });    
   </script> 

   <script>  
       $(document).ready(function(){  
          $('input[type="radio"]').click(function(){  
               var pilih = $(this).val();  
               // alert(nama_stok);
               $.ajax({  
                    url:'tampil_hrts.php',  
                    type:'POST',  
                    data:'pilih=' + pilih,  
                    success:function(response){  
                         $('#lihat').html(response);  
                    }  
               });  
          });  
     });    
   </script>
</body>
</html>