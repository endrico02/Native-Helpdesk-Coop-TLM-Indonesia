<?php
$host="localhost";
$dbname="before_17062015";
$user="postgres";
$password="kutukupret";
$port="5432";
$link= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");
 
//if($link) echo "Koneksi sukses";

/*$host="192.168.21.13";
$dbname="postgres1";
$user="root";
$password="maluku";
$port="5432";
$link= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal"); */

//if($link) echo "Koneksi sukses"; 

	
?>
