<?php
/*query jumlah nasabah deposito*/
$result = pg_query ("SELECT count(f_000004) as nasabah_aktif_deposito    
FROM public.m_07_001 
WHERE ABS(f_000004) > '0' and a_000003 = '1';"); //query ke postgres database
$jasa= ($result); //membuat variabel yang menagkap hasil query diatas
$calljasa = pg_fetch_row($jasa);
echo (number_format($calljasa[0])." "."nasabah");
	
?>











