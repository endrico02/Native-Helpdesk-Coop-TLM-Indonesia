<?php
	session_start();
	include 'limit_session.php';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>HELP DESK</title>
	<link rel="shortcut icon" type="image/ico" href="images/gl.gif"> <!--icon-->
	<link rel="stylesheet" href="dist/css/Lobibox.min.css"/><!--untuk  content noti box-->
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!--baru-->
	<script src="js/jquery-1.5.2.min.js" type="text/javascript"></script>
	<script src="js/hideshow.js" type="text/javascript"></script>
	<script src="js/jquery.tablesorter.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="js/jquery.equalHeight.js"></script>
	<script type="text/javascript">
    $(function(){
        $('.column').equalHeight();
    });
	</script>
	<!-- untuk tabels Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/layout.css" type="text/css" media="screen" />
    <!-- MetisMenu CSS -->
    <link href="css/plugins/metisMenu/metisMenu.min.css" rel="stylesheet">
    <!-- DataTables CSS -->
    <link href="css/plugins/dataTables.bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/sb-admin-2.css" rel="stylesheet">
	<!-- akhir untuk tabels Bootstrap Core CSS -->
</head>


<body>	<!--INPUT TYPE="button" onClick="location.reload()" VALUE="RELOAD PAGES"-->
	
	<header id="header">
		<hgroup>
			<h1 class="site_title"><a href="index.php"><img src="images/saving.png" width="215" height="35" title="" alt=""/> </a></h1> 
			<h2 class="section_title"><i></i></h2><div class="btn_view_site" onClick="location.reload()"><a href="#"><font color="#00ff00">REFRESH</font></a></div>
		</hgroup>
	</header> <!-- end of header bar -->
	<section id="secondary_bar">
		<div class="user">
			<p>Koperasi TLM <a href="#"></a></p>
			<!-- <a class="logout_user" href="#" title="Logout">Logout</a> -->
		</div>
		<div class="breadcrumbs_container">
			
		</div>
	</section><!-- end of secondary bar -->
	
	<aside id="sidebar" class="column">
		
		<hr/>
		<h3><a href="index.php">Update status</a></h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="index.php#ao" data-toggle="tab">Aktif</a></li>
			<li class="icn_edit_article"><a href="index.php#profile" data-toggle="tab">Tarik Jaminan</a></li>
			<li class="icn_categories"><a href="index.php#cabang" data-toggle="tab">Ulang Permohonan</a></li>
			<li class="icn_tags"><a href="index.php#fasilitas" data-toggle="tab">Masih memiliki fasilitas</a></li>
                        <li class="icn_edit_article"><a href="index.php?content=set_fs4_b">Set. FS4-b</a></li>
		</ul>
		<h3>Tabungan</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="index.php?content=tutup_takop">Tutup Tab. Koperasi</a></li>
			<li class="icn_folder"><a href="index.php?content=tutup_tabum">Tutup Tab.Umum</a></li>
			<li class="icn_folder"><a href="index.php?content=blokir_tabum">Blokir/Buka blokir Tabungan</a></li>
			<li class="icn_folder"><a href="index.php?content=rak">Cek RAK</a></li>
			<li class="icn_folder"><a href="index.php?content=konsol">Konsol Nominatif vs Neraca</a></li>
					
		</ul>
		<h3>Realisasi baru</h3>
		<ul class="toggle">
			<li class="icn_view_users"><a href="index.php?content=prov">Update Provisi & Hak Tarik (Kumulatif)</a></li>
			<!--<li class="icn_view_users"><a href="index.php?content=provdisc">Provisi & Hak Tarik Disc.50%</a></li>
			<li class="icn_view_users"><a href="index.php?content=provdisc_sulawesi">Provisi & Hak Tarik Sulawesi Disc.50%</a></li>-->
			<li class="icn_edit_article"><a href="index.php?content=provisi">Update Provisi (Manual)</a></li>
			<li class="icn_edit_article"><a href="index.php?content=hak_tarik">Update Hak tarik (Manual)</a></li>
			<li class="icn_edit_article"><a href="index.php?content=provisi_sulawesi">Update Provisi, Hak Tarik Area Sulawesi & NTB</a></li>
			<li class="icn_edit_article"><a href="index.php?content=provisi_1persen">Update Provisi, Hak Tarik 1% 24 Cabang</a></li>
			<li class="icn_edit_article"><a href="index.php?content=neraca">Neraca</a></li>
			<li class="icn_edit_article"><a href="index.php?content=gl_akhir_bulan">GL Akhir Bulan</a></li>
			<li class="icn_edit_article"><a href="jurnal/">Jurnal</a></li>
		</ul>
		<h3>Pindah-Pindah</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="index.php?content=pindah_kelompok">Pindah kelompok</a></li>
			<li class="icn_view_users"><a href="index.php?content=pindah_ao">Pindah AO</a></li>
			<li class="icn_add_user"><a href="index.php?content=pindah_ao_kumulatif">Pindah AO<strong> (KUMULATIF)</strong></a></li>
		</ul>
			<!--<h3>Mobile</h3>
		<ul class="toggle">
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=lunasdini"><font size = '2'>Lunas Dini/Meninggal</font></a></li>
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=salah_setor"><font size = '2'>Salah Setor Nasabah</font></a></li>
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=laporan"><font size = '2'>Update No.Bukti Mobile</font></a></li>
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=datmob"><font size = '2'>Maintanance Data Mobile</font></a></li>
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=hrt_mobile"><font size = '2'>Data Titipan Mobile</font></a></li>
<li class="fa fa-hand-peace-o" style="font-size:20px;"><a href="index.php?content=mobile"><font size = '2'>Cek Kasir</font></a></li>
			
		</ul>-->

		
			<!--<h3>Autodebet/Pelunasan Dini</h3>
		<ul class="toggle">	
			<li class="icn_view_users"><a href="index.php?content=lunas">CEK PELUNASAN</a></li>
			<li class="icn_add_user"><a href="upsert/index.php">Insert Data</a></li>
			<li class="icn_view_users"><a href="index.php?content=process">Proses Pelunasan</a></li>
		</ul>-->
			
		<h3>Admin</h3>
		<ul class="toggle">
			<!--<li class="icn_settings"><a href="index.php?content=apkc">Error Approve KC</a></li>-->
			<li class="icn_settings"><a href="index.php?content=datnas">Maintanance Data Agg</a></li>
			<li class="icn_settings"><a href="http://upsert.ksp.org">Pindah Hari Tagih</a></li>
			<li class="icn_settings"><a href="index.php?content=update_ka">Nomor KA</a></li>
			<!--<li class="icn_settings"><a href="index.php?content=update_str">Update Kartu Setoran</a></li>-->
			<li class="icn_settings"><a href="index.php?content=tambah_ao">Create AO Baru</a></li>
			<li class="icn_settings"><a href="index.php?content=nama">Update Nama</a></li>
			<li class="icn_settings"><a href="index.php?content=setoran_melebihi_kewajiban">Setoran/Jasa Melebihi Kewajiban</a></li>
			<!--<li class="icn_settings"><a href="http://hrts.ksp.org">Pindah Hari Tagih Sementara</a></li>-->
			<li class="icn_settings"><a href="sisa_saldo_staf.php">Hapus Sisa Saldo Staf Lapangan</a></li>
			<li class="icn_settings"><a href="index.php?content=aktif_takop_umum">Aktif Takop dan Tab Umum</a></li>
    			<li class="icn_settings"><a href="index.php?content=nomor_bukti">Reversal (Edit Nomor Bukti Angsuran, Asuransi & Pembulatan)</a></li>
                        <li class="icn_settings"><a href="index.php?content=bagi_pokok_wajib">Bagi Pokok Wajib (Tutup Takop)</a></li>
     			<li class="icn_settings"><a href="index.php?content=edit_keterangan">Edit Keterangan (Angsuran dan Asuransi)</a></li>
			<li class="icn_settings"><a href="index.php?content=update_nominal">Update NOminal KA (KA Approve tapi Nominal Nol)</a></li>
			
			<li class="icn_settings"><a href="index.php?content=dataentry">Cek Data Entry</a></li>

			<!--<li class="icn_settings"><a href="index.php?content=bukacabang">Buka Cabang</a></li>
			<li class="icn_settings"><a href="index.php?content=isi2">Kontrol Anggota</a></li>
			<li class="icn_settings"><a href="index.php?content=cek_noagg">Cek no_agg</a></li>
			<li class="icn_settings"><a href="index.php?content=dataentry">Cek Data Entry</a></li>
			<li class="icn_settings"><a href="index.php?content=mobile">Mobile</a></li>
			li class="icn_folder"><a href="index.php?content=rekagg">Update No Anggota</a></li>
			<li class="icn_security"><a href="#">Security</a></li>
			<li class="icn_jump_back"><a href="#">Logout</a></li>-->
		</ul>
		
		<footer>
			<hr />
			<p><strong>&copy; 2020 IT team :) Be Brave :)</strong></p>
			<p>Theme by <a href="http://www.medialoot.com">MediaLoot</a></p>
		</footer>
	</aside><!-- end of sidebar -->
	
	<!--MAIN CONTENT-->
	<?php
      $tengah = isset($_GET['content']) ? $_GET['content'].".php": "isi.php";
      include "$tengah";
      ?>
	<!--MAIN CONTENT-->

	
		
		<script>
		$('#popupPromptBasic').click(function () {
                Lobibox.prompt('text', {
                    title: 'Please enter username',
                    attrs: {
                        placeholder: "Username"
					}
                });
            });
		</script>
		
		 <!-- jQuery untuk tabels -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="js/plugins/metisMenu/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="js/plugins/dataTables/dataTables.bootstrap.js"></script>
	<!--script src="js/plugins/dataTables/jquery-1.11.1.min.js"></script-->
	<script src="js/plugins/dataTables/test.js"></script>
	<!-- Custom Theme JavaScript -->
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
	<!-- akhir jQuery untuk tabels -->
	<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="media/css/jquery.dataTables.min2.css"><!--ok-->
<link rel="stylesheet" type="text/css" href="media/css/responsive.dataTables.min.css"><!--ok-->
<script type="text/javascript" language="javascript" src="media/js/jquery.js"></script><!--ok-->
<script type="text/javascript" language="javascript" src="media/js/jquery.dataTables.js"></script><!--ok-->
<script type="text/javascript" language="javascript" src="media/js/dataTables.responsive.js"></script><!--ok-->
<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#autohide').DataTable();
	} );
</script>
<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#autohidex').DataTable();
	} );
</script>
</body>

</html>