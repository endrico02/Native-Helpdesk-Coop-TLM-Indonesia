<?php
/*query untuk tabungan sampai dengan hari ini*/
$result = pg_query ("select  sum (f_000004) from m_05_001"); //query ke postgres database
$tabungan= ($result); //membuat variabel yang menagkap hasil query diatas
$calltabungan = pg_fetch_row($tabungan);
//echo "<br>$calltabungan[0]";
echo ("Rp"." ".number_format(abs($calltabungan[0]), 0, ',', '.'));
     

	
?>
