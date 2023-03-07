<!DOCTYPE html>
<html>


<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Import Excel To Mysql Database Using PHP </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Import Excel File To MySql Database Using php">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/bootstrap-custom.css">


<style type='text/css'>
table td { font-size: 12px; padding: 4px 6px; background-color: #fffff; border:1px solid #ffffff;}
table tr:nth-child(odd) td { background-color: #f2f2f2; }



<?php
//include ("conn/dbconn_online.php");
include '../conn/fungsi.php';
koneksi_db();

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
    height: 50px;
}
td {
    padding: 5px;
}
.even{
 background-color:#333;
}
.odd{
 background-color:#666;
}
</style>

<body>


  <?php

//memanggil file excel_reader
require "excel_reader.php";

//jika tombol import ditekan
if(isset($_POST['submit'])){

    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel tbl_debet_jambek
             $truncate ="TRUNCATE TABLE tbl_debet_jambek";
             pg_query($truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)

  $g_000001 = $data->val($i, 1);
  $f_000000 = $data->val($i, 2);
  $a_000057 = $data->val($i, 3);
  $p_000002 = $data->val($i, 4);
  $t_000003 = $data->val($i, 5);
  $t_000030 = $data->val($i, 6);
  $t_000023 = $data->val($i, 7);
  $t_000026 = $data->val($i, 8);

      

//      setelah data dibaca, masukkan ke tabel tbl_debet_jambek sql
      $query = "INSERT INTO tbl_debet_jambek(
            g_000001, f_000000, a_000057, p_000002, t_000003, t_000030, t_000023, 
            t_000026,status)
    VALUES ('$g_000001','$f_000000','$a_000057','$p_000002','$t_000003','$t_000030','$t_000023','$t_000026','0')";
      $hasil = pg_query($query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(pg_error());
      }else{
//          jika impor berhasil
          echo" <script> alert('Data Telah Berhasil Diupdate');
    window.location.href='../index.php?content=process1';
    </script>";
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}

?>

<form name="myForm" id="myForm" onSubmit="return validateForm()" action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filepegawaiall" name="filepegawaiall" />
    <input type="submit" name="submit" class="btn btn-primary button-loading" data-loading-text="Loading..." value="Proses" /><br/>
    
</form>

<h1 style="text-align:center;">PERHATIAN!!!</h1>
<p style="text-align:center;"><font size="6">1.  Pastikan Panjang Karakter CIF = </font> 
                                                 <strong><font color="red" size="6">10 Karakter</font></strong></p>
<p style="text-align:center;"><font size="6">2.  Nama Nasabah Tidak Boleh Mengandung</font> 
                                                 <strong><font color="red" size="6">Tanda Baca</font></strong></p>
<p style="text-align:center;"><font size="6">3.  Sebelum Insert Data , Silahkan Cek Dulu Data Pelunasan di </font>
                                                 <strong><font color="red" size="6">CEK PELUNASAN</font></strong></p>
<p style="text-align:center;"><font size="6">4.  Pastikan Data Excel yang dimasukan format </font>
                                                 <strong><font color="red" size="6">.xls (Excel 97-2003 Workbook)</font></strong></p>
<p style="text-align:center;"><font size="6">5.  Pastikan Tanggal Autodebet di Excell Sama Dengan</font>
                                                 <strong><font color="red" size="6">Tanggal Hari Ini</font></strong></p>
<p style="text-align:center;"><font size="6">7.  Format Tanggal Autodebet (Format Cells) di Excell Adalah</font>
                                                 <strong><font color="red" size="6">Afrikaans</font></strong></p>                                              
<p style="text-align:center;"><font size="6">8.  Jika Semua Kriteria Dipenuhi, Silahkan Masukan Data</font></p>


<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }

        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script>




</body>
</html>

