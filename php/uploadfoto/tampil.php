<?php
//koneksi ke postgresql
$host="localhost";
$dbname="Test";
$user="postgres";
$password="kutukupret";
$port="5432";
$conn= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");
	if(isset($_GET["nomor_ao"])){
		$nama_ao=$_GET["nomor_ao"];
		}else{
		$nama_ao="?";
		}
$data = pg_query($conn,"SELECT img  FROM y_picture where imgname = '".$nama_ao."'");

while($d = pg_fetch_array($data)){
    echo "<img src=\"".$d['img']."\"><br>";
    //echo $d['imgname']."<p>\n";
}
?>
