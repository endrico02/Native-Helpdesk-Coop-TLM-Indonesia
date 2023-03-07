<?php
    
     $host = "192.168.21.212";
    $dbname = "postgres22";
    $user = "postgres";
    $password = "s3p3d@";
    $port = "5432";
    $koneksi = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);
 
    
        if($koneksi){
             //echo "Berhasil Koneksi";
        }else{
            echo "Error in connecting to database.";
        }

        echo "<br />";
            
?>