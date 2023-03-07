<!DOCTYPE html>
<html>

<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

session_start();

$cbg= isset($_REQUEST['cbg']) ? $_REQUEST['cbg']:"kosong";
$kdao= isset($_REQUEST['kdao']) ? $_REQUEST['kdao']:"kosong";
$nama= isset($_REQUEST['nama']) ? $_REQUEST['nama']:"kosong";

$sub_kdao = substr($kdao,0,3);

if($cbg!=$_SESSION['kd_cbg']){
    echo '<script>
            alert("Sorry Cin, Kode Cabang Tidak Sesuai");
            history.go(-1);  
        </script>';
        exit();
}elseif ($sub_kdao!=$_SESSION['kd_cbg']) {
     echo '<script>
            alert("Sorry Cin, Kode AO Tidak Sesuai");
            history.go(-1);
        </script>';
        exit();
}

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

 if ($cbg !="kosong" || $nama !="kosong" || $kdao !="kosong" ) {
  $input    = "INSERT INTO s_00_006 (g_000001,a_000012,s_000000,g_000003,g_000004,a_000009) 
    VALUES ('$cbg','$kdao','$nama','4f43e560f7d095835e3b15b27278ae83','1','1')";
    $query_input =pg_query($input);
    if ($query_input) {
    //Jika Sukses
    ?>
        <script language="JavaScript">
        alert('Input Data Berhasil berhasil syantikk!!!');
        document.location='index.php?content=tambah_ao';
        </script>
    <?php
    }
    else {
    //Jika Gagal
    echo "Input Data Gagal!, Silahkan diulangi syantikk!";
    }
}
	
	?>
	<div class="clear"></div>
						
				</div>


</body>
</html>


