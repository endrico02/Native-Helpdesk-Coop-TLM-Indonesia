<?php
function koneksi_db(){
    $host = "localhost";
    $dbname = "postgres";
    $user = "postgres";
    $password = "kutukupret";
    $port = "5432";
    $con = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$password);
 
    
if($con){
    
}else{
    echo "<script> window.location.href='errorpage/errorpage.html';
    </script>";
}
    
}

?>