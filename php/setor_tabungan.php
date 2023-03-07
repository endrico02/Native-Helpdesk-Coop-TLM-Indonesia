<?php
$result = pg_query ("SELECT sum(t_000008) as transaksi_setoran      
FROM public.t_01_003  
WHERE  t_000005 = 'SCD'
"); //query ke postgres database
$pendapatan= ($result); /*membuat variabel yang menagkap hasil query diatas*/
$callpendapatan = pg_fetch_row($pendapatan);
echo ("Rp ".number_format (ABS($callpendapatan[0]), 0, ',', '.'));
?>



 