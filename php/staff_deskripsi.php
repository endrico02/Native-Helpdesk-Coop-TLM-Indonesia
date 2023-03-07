
<?php
include ("dbconn.php");

if(isset($_GET["nomor_ao"])){
$nomor=$_GET["nomor_ao"];
}else{
$nomor="?";
}

/*query */
$result = pg_query ("select kd_cabang, nama_ao, kode_ao from y_nomi_evaluasi
where kode_ao = '".$nomor."'"); //query ke postgres database
$call= ($result); //membuat variabel yang menagkap hasil query diatas
$row = pg_fetch_array($call); //?
?>
