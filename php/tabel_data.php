
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<body>

</html>
<html>
<h1> Accru bunga: </h1>
<style style="text/css">
  	.even { background-color:#FFF; }
	.odd { background-color:#F0F0F0; }
	.hoverTable{
		width:100%; 
		border-collapse:collapse; text-align: right
	}
	.hoverTable td{ 
		padding:7px; border:#4e95f4 1px solid;
	}
	/* Define the default color for all the table rows */
	.hoverTable tr:hover {
          background-color: #DADFE1;
	}
	/*membuat header sendiri*/
	th { border: 1px solid #CCC; padding: 9 0.5em; text-align: center; background-color:#5C97BF }
</style>
</html>
<?php
//membuat variabel untuk memanggil data dari file entri
$nama = $_GET['nomor_cif'];
$tglmulai = $_GET['tanggalmulai'];
$tglakhir = $_GET['tanggalakhir'];

$c = 2; //variabel untuk waarna background .even dan .odd

//connect to a database named "bunga_accru_db" on the host "localhost" with a username and password
$dbconn = pg_connect("host=localhost port=5432 dbname=bunga_accru_db user=postgres password=kutukupret");

$cname = pg_query ($dbconn,"select a_000057, g_000077, g_000069 from m_00_011 where f_000000 = '".$nama."'");
$cname2 = pg_fetch_row($cname);

//membuat variabel untuk memanggil data dari database
$resulttot = pg_query ($dbconn,"select * from m_00_011 where f_000000 = '".$nama."' and g_000069 >= '".$tglmulai."' and g_000069 <= '".$tglakhir."' order by g_000069"  );
	
$i = 0; //variabel 1
$result = pg_query ($dbconn,"select  c_000001,	
									 f_000000,
									 a_000057,
									 p_000001,
									 g_000077,
									 g_000069,
									 s_000000,
									 a_000045,
									 f_000028,
									 a_000030,
									 a_000031,
									 f_000004,
									 f_000029 
							from m_00_011 where f_000000 = '".$nama."' and g_000069 >= '".$tglmulai."' and g_000069 <= '".$tglakhir."' order by g_000069 ");

//mendapatkan jumlah baris yang dipanggil
$totrow = pg_num_rows($resulttot) ;
echo "Nomor Rekening"." "."$nama"." "."terdapat"." ".$totrow." baris data.\n<br>Atas nama :"." ".$cname2[0]."<br>Tanggal Mulai"." ".$tglmulai."<br>Tanggal Akhir"." ".$tglakhir;;


//menampilkan data yang dipanggil dalam tabel //style=width:30% border = 1 date("d-m-Y", strtotime($tglmulai))
echo "<table class=hoverTable> 
<tr>
    <th><b>Nomer</b></th>
	<th><b>Tgl_Acru</b></th>
	<th><b>Tgl Bayar</b></th>
	<th><b>Keterangan</b></th>
	<th><b>Jenis Bunga</b></th>
	<th><b>Besar Bunga</b></th>
	<th><b>Bunga Harian</b></th>
	<th><b>Akumulasi bunga</b></th>
	<th><b>Saldo Akhir</b></th>
	<th><b>Pajak</b></th>
	</tr>";
	while ($line = pg_fetch_row($result))
	{
	//buat mengirimkan data kolom CIF ke $nocif di file data-detail.php
	 //.($c++%2==1) ? 'odd' : 'even' . 
	 
	 
	 $warna = ($c++%2==1) ? 'odd' : 'even' ;
	
	echo "<tr class='".$warna."'> 
		<td>$i</td>
		<td>".date("d-m-Y", strtotime($line[4]))."</td> 
		<td>".date("d-m-Y", strtotime($line[5]))."</td>
		<td>$line[6]</td>
		<td>$line[7]</td>
		<td>$line[8]</td>
		<td>$line[9]</td>
		<td>$line[10]</td>
		<td>Rp.  ". number_format(ABS($line[11]),0,'','.')."</td>
		<td>$line[12]</td>
		</tr>";   
	//penomoran otomatis jika ada baris kedua dan selanjutnya 
	
	$i++;

	};
	echo "</table>";
	
// memasukan catatan
echo "catatan";

	