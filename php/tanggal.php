<?php
include ("./conn/dbconn_online.php");
/*query jumlah nasabah deposito*/
$result = pg_query ("SELECT h_000001 from h_00_001"); //query ke postgres database
$jasa= ($result); //membuat variabel yang menagkap hasil query diatas
$calljasa = pg_fetch_row($jasa);
echo (number_format($calljasa[0])." "."nasabah");
 /*$tanggal= mktime(date("m"),date("d"),date("Y"));
echo "Tanggal : <b>".date("d-M-Y", $tanggal)."</b> ";*/
?>