<?php
//koneksi ke MySQL
$host="localhost";
$dbname="Test";
$user="postgres";
$password="kutukupret";
$port="5432";
$conn= pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password) or die("Koneksi gagal");

$keterangan = $_POST['keterangan'];
$folder = "gambar";
$tmp_name = $_FILES["file_foto"]["tmp_name"];
$name = $folder."/".$_FILES["file_foto"]["name"];

//kode untuk upload ke folder gambar
move_uploaded_file($tmp_name, $name);

//masukkan datanya ke database
$input = pg_query($conn, "INSERT INTO y_picture VALUES('$keterangan','$name')");

if($input){
    //jika berhasil kita redirect ke halaman untuk menampilkan foto
    header("location: tampil.php");
}else{
    echo "gagal";
}
?>
