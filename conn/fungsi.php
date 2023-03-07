<?php
error_reporting (E_ALL ^ E_DEPRECATED);
function koneksi_db(){
$host="192.168.21.212";
$dbname="postgres20";
$user="postgres";
$password="s3p3d@";
$port="5432";
$koneksi= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");
 
    
if($koneksi){
    
}else{
    echo "<script> window.location.href='errorpage/errorpage.html';
    </script>";
}
    
}
?>