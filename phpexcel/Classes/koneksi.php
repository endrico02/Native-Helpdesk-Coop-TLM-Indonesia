<?php

    $host = "localhost";
    $dbname = "surat";
    $user = "postgres";
    $password = "maluku";
    $port = "5432";
    $koneksi = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);
 
    
if($koneksi){
    echo "berhasil konek";
}else{
    echo "Error in connecting to database.";
}

?>