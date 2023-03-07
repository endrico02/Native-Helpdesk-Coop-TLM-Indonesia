<?php

/*query untuk deposito hari ini*/
$result = pg_query ("SELECT sum(l_000032),sum(l_000045) FROM m_02_001 WHERE  l_000017 in ('204') and l_000032 <> 0 AND g_000001 not in ('700','800')"); //query ke postgres database
$deposito= ($result); //membuat variabel yang menagkap hasil query diatas
$calldeposito = pg_fetch_row($deposito);
echo ("Rp"." ".number_format (ABS($calldeposito[0]), 0, ',', '.'));

?>