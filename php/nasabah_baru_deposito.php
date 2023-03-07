<?php

$result = pg_query ("select count(a_000057) from m_07_001, h_00_001
where a_000003 = '1' and a_000018 = h_00_001.h_000001;"); //query ke postgres database
$jasa= ($result); //membuat variabel yang menagkap hasil query diatas
$nsd = pg_fetch_row($jasa);
$x = (ABS($nsd[0]));
if ($x == 0) {
    echo "-";
} else {
   echo (($nsd[0])." "."nasabah");
}
	
?>


