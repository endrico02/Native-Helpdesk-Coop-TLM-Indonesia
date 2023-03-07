<?php
$result = pg_query ("SELECT sum(t_000008) as penarikan_tabungan      
FROM public.t_01_003  
WHERE  t_000005 = 'SCW'
"); //query ke postgres database
$pendapatan= ($result); /*membuat variabel yang menagkap hasil query diatas*/
$callpendapatan = pg_fetch_row($pendapatan);
$x = (ABS($callpendapatan[0]));

if ($x == 0) {
    echo "-";
} else {
    echo ("Rp ".number_format (ABS($callpendapatan[0]), 0, ',', '.'));
}
?>