<?php
include ("dbconn.php");

/*query untuk jasa hari ini*/
$result = pg_query ("select  sum (t_000026) from t_01_003 where g_000039 = 'E'"); //query ke postgres database
$jasa= ($result); //membuat variabel yang menagkap hasil query diatas
$calljasa = pg_fetch_row($jasa);
echo ("Rp.".number_format($calljasa[0]));
     

	
?>
