<!DOCTYPE html>
<html>
<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/custom.css" rel="stylesheet" type="text/css">
<script>
			$().ready(function(){
                $('#Input2').submit(function(e){
                    e.preventDefault();
					$('#content2').html('<img src="images/loading.gif"/>');
					$('#content2').slideDown('slow');
                    $.ajax({
                        'type': 'POST',
                        'url': 'addtable/help_desk_tamu.php',
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
<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

$cbg= isset($_REQUEST['cbg']) ? $_REQUEST['cbg']:"kosong";

session_start();

$_SESSION['kd_cbg'] = $cbg;

//echo $cabang.$cif;
//exit;


?>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 35px;
	background-color:#4CAF50;
	text-align: center;
	color: white;
}
td {
    padding: 10px;
}
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
tr:hover{background-color:#f5f5f5}
</style>
</head>
<body>

 <?php
			$query = pg_query("select g_000001 as cbg,a_000012 as kdao,s_000000 as nama,a_000009 as status from s_00_006
								where g_000001 in ('$cbg')
								ORDER BY a_000012;");

		$num_rows = pg_num_rows($query);
		if ($num_rows > 0) {
			$query2 = pg_query("SELECT MAX(a_000012) as max FROM s_00_006 WHERE g_000001 = '$cbg'");
			$result2 = pg_fetch_array($query2);
			$kdao_a = $result2['max']+1;
			if(strlen($kdao_a)==4){
				$kdao_now = "00".$kdao_a;
			}elseif (strlen($kdao_a)==5) {
				$kdao_now = "0".$kdao_a;	
			}

			echo "<table style='width:100%'>
					  <div style='overflow-x:auto;'>
					  <thead> 
							<thead>
								<tr>
									<th>Kantor</th>
									<th>kdao</th>
									<th>Nama</th>
									<th>status</th>
								</tr>
						</thead>
					  </tbody>";
			// output data of each row
		while ($result = pg_fetch_array($query)) {
			echo '
				<tr> 
				    <td>'.$result['cbg'].'</td>
					<td>'.$result['kdao'].'</td>
					<td>'.$result['nama'].'</td>
					<td>'.$result['status'].'</td>

					</tr> 
				';
						
	} 
?>
					
				</tbody>
				<div class="clear"></div>
				</table> 
				</div>
				<hr>

<form id="Input2" method="post">
	   <style type="text/css" media="screen">
        table {font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 11px;}
        input {font-family: Verdana, Arial, Helvetica, sans-serif;font-size: 11px;height: 20px;}
    </style>
</head>
<body>
<div style="border:0; padding:10px; width:760px; height:auto;">
<form action="data.php" method="POST" name="form-input-data">
    <table width="760" border="0" align="center" cellpadding="0" cellspacing="0">
       
        <tr height="46">
            <td>Cabang</td>
            <td><input type="" name="cbg" value="<?=$_SESSION['kd_cbg'];?>" size="35" maxlength="6" readonly /></td>
        </tr>
        <tr height="46">
            <td>Kode AO baru</td>
            <td><input type="" name="kdao" value="<?=$kdao_now;?>" size="50" maxlength="30" readonly/></td>
         </tr>
        <tr height="46">
             <td>Nama</td>
            <td><input type="text" name="nama" size="50" maxlength="30" /></td>
        </tr>
        
            
    </table>
      
<input type="submit" value='proses'/>
<input name="no_ka" type="hidden" class="form-control" value="<?php echo $cbg?>">

<div id="content2"></div>
</form>
<?php } else {
			  echo "data tidak ditemukan ";
				} ?>
</body>
</html>