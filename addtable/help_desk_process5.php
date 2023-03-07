<?php
include '../conn/fungsi.php';
koneksi_db();


$sql=	pg_query("UPDATE m_03_001 a 
       set f_000054  =  (f_000054 + jambek)
FROM (
       SELECT 
           tbl_debet_jambek.f_000000,
           tbl_debet_jambek.t_000030 as jambek
           FROM public.tbl_debet_jambek, h_00_001
	WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001  and tbl_debet_jambek.status = '4'
       ) AS subquery
       WHERE a.f_000000 = subquery.f_000000");

$sql= pg_query("UPDATE tbl_debet_jambek
       set status =  '5',
    t_000003 = h_00_001.h_000001
       from h_00_001
  WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001 AND tbl_debet_jambek.status = '4'");

if($sql){
    echo" <script> alert('Data Telah Berhasil Diupdate');
    window.location.href='index.php?content=process6';
    </script>";
}else{
    echo" <script> alert('data gagal diupdate');
    window.history.go(-1);
    </script>";
}



?>