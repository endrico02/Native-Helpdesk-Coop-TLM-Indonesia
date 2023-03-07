<?php
include '../conn/fungsi.php';
koneksi_db();


$sql=	pg_query("INSERT INTO t_01_003
		(t_000017,g_000001,p_000001,p_000002,t_000003,t_000004,t_000002,t_000005,t_000013,a_000057,s_000000,t_000008,t_000006,t_000023,t_000026,t_000029,
		t_000030,t_000012,t_000016,g_000039,g_000040,g_000041,g_000033,g_000043,g_000036,g_000037,g_000038,g_000016,s_000076,g_000032,g_000059,	a_000025,
		c_000001)
		(SELECT 
				'12345' as t_000017,
				g_000001,
				'01',
				p_000002,
				h_00_001.h_000001 as t_000003,
				h_00_001.h_000001 as t_000004,
				'AUTODEBET' as t_000002,
				'AD' as t_000005,
				f_000000,
				a_000057,
				'Autodebet an.' ||tbl_debet_jambek.a_000057 || tbl_debet_jambek.f_000000 as s_000000,
				 t_000030 as t_000008,
				'K' as t_000006,
				t_000023 as t_000023,
				t_000026 as t_000026,
				 0 as t_000029,
				 t_000030 as t_000030,
				 0 as t_000012,
				'TC' as t_000016,
				'E' as g_000039,
				'B' as g_000040,
				'B' as g_000041,
				'AP02' as g_000033,
				CURRENT_TIMESTAMP as g_000043,
                                CURRENT_TIMESTAMP as g_000036,
                                CURRENT_TIMESTAMP as g_000037,
                                CURRENT_TIMESTAMP as g_000038,
				'LN0001' as g_000016,
				'E' as s_000076,
				'100' as g_000032, 
				CURRENT_TIMESTAMP as g_000059,
			      --  'IDR' as f_000022,
			      --  'IDR' as t_000070,
				0 as a_000025,
				f_000000
				FROM tbl_debet_jambek, h_00_001
			        WHERE t_000030  > 0 AND t_000003 = h_00_001.h_000001  and tbl_debet_jambek.status = '5')");

$sql= pg_query("UPDATE tbl_debet_jambek
       set status =  '6',
    t_000003 = h_00_001.h_000001
       from h_00_001
  WHERE  tbl_debet_jambek.t_000003 = h_00_001.h_000001 AND tbl_debet_jambek.status = '5'");


if($sql){
    echo" <script> alert('Data Telah Berhasil Diupdate');
    window.location.href='index.php?content=processall';
    </script>";
}else{
    echo" <script> alert('data gagal diupdate');
    window.location.href='index.php?content=process6;
    </script>";
}


?>