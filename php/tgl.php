<?php
/* $tanggal= mktime(date("m"),date("d"),date("Y"));
echo date("d-m-Y", $tanggal)."</b>";
date_default_timezone_set('Asia/Makassar');
$jam=date("H:i:s");
echo ""." ".$jam." ".""; */


//include ("conn/dbconn_online.php");
include 'conn/fungsi.php';
koneksi_db();

echo ("Server: ".gethostname().", ");
//echo ("database:"." ".($dbname).",  ");


date_default_timezone_set('Asia/Makassar');
/*query untuk tanggal hari ini*/
$result = pg_query ("select h_000001, now() from h_00_001;"); //query ke postgres database
$tgl= ($result); //membuat variabel yang menagkap hasil query diatas
$calltgl = pg_fetch_row($tgl);
//echo (gethostname()." ");
echo ("tanggal eFbis"." ".date("d M Y", strtotime($calltgl[0])).".  ");
//echo ("Current date:"." ".date("l jS \of F Y h:i:s A", strtotime($calltgl[1]))."  ");

     
/*date("l jS \of F Y h:i:s A"*/
	
?>


