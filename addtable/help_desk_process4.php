<?php
include '../conn/fungsi.php';
koneksi_db();


$sql=	pg_query("UPDATE m_01_002 a 
       set f_000004  =  (f_000004 - pokok),
           f_000005  =  (f_000005 - jasa),
           f_000030  =  (f_000030 + jasa)
FROM (
       SELECT 
           tbl_debet_jambek.f_000000,
           tbl_debet_jambek.t_000023 as pokok,
           tbl_debet_jambek.t_000026 as jasa
        FROM public.tbl_debet_jambek, h_00_001
	WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001 and tbl_debet_jambek.status = '3'
       ) AS subquery
       WHERE a.f_000000 = subquery.f_000000");

$sql= pg_query("UPDATE tbl_debet_jambek
       set status =  '4',
    t_000003 = h_00_001.h_000001
       from h_00_001
  WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001 AND tbl_debet_jambek.status = '3'");

if($sql){
    echo" <script> alert('Data Telah Berhasil Diupdate');
    window.location.href='index.php?content=process5';
    </script>";
}else{
    echo" <script> alert('data gagal diupdate');
    window.history.go(-1);
    </script>";
}



?>