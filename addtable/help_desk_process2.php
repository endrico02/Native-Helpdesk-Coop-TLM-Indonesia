<?php
include '../conn/fungsi.php';
koneksi_db();


$sql=	pg_query("UPDATE m_02_001 a 
       set l_000030 =  (l_000031 + jambek), l_000032 = (l_000032 + jambek)
FROM (
       SELECT 
           tbl_debet_jambek.g_000001,
           sum(tbl_debet_jambek.t_000030) as jambek
        FROM public.tbl_debet_jambek, h_00_001
	WHERE  public.tbl_debet_jambek.t_000003 = h_00_001.h_000001 AND tbl_debet_jambek.p_000002 in ('18') and tbl_debet_jambek.status = '1'
	GROUP BY tbl_debet_jambek.g_000001
       ) AS subquery
       WHERE a.g_000001 = subquery.g_000001 AND a.l_000026 = '2000171'");

$sql= pg_query("UPDATE tbl_debet_jambek
       set status =  '2',
    t_000003 = h_00_001.h_000001
       from h_00_001
  WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001 AND tbl_debet_jambek.status = '1'");

if($sql){
    echo" <script> alert('Data Telah Berhasil Diupdate');
    window.location.href='index.php?content=process3';
    </script>";
}else{
    echo" <script> alert('data gagal diupdate');
    window.history.go(-1);
    </script>";
}



?>