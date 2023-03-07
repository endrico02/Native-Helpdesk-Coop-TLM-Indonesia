<?php

/*query jumlah nasabah deposito*/
$result = pg_query ("SELECT count(f_000004) as nasabah_aktif_tabungan    
FROM public.m_05_001 
WHERE ABS(f_000004) > '0';"); //query ke postgres database
$jasa= ($result); //membuat variabel yang menagkap hasil query diatas
$calljasa = pg_fetch_row($jasa);
echo (number_format($calljasa[0], 0, ',', '.')." "."nasabah");
	
?>











