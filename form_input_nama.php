    <?php include ("php/tgl.php"); ?>
<!DOCTYPE html>
<html>
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <meta charset="utf-8">
    <title></title>   
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css">
</head>
<body>
<article class="module width_full">
<header><h3 class="tabs_involved">Edit Nama Anggota</h3></header>
<div class="row">
<div class="panel-body"  style="width:100%;">
    <section>
    <div class="table-responsive">
<body class="dt-example">
<div class="col-lg-12">
                    <div class="bs-example">
                        
                       <?php


$cif= isset($_REQUEST['cif']) ? $_REQUEST['cif']:"kosong";

$result = pg_query ("select g_000001 as cab,c_000004 as namadepan, c_000005 as namatengah, c_000006 as namabelakang, a_000057 as nama from m_00_001 where c_000001 = '$cif'");
echo "<br><table class= 'table table-striped table-bordered table-hover'>
                          <thead> 
                            <thead>
                                <tr>
                                    <th>Kantor</th>
                                    <th>CIF</th>
                                    <th>Nama Depan</th>
                                    <th>Nama Tengah</th>
                                    <th>Nama Belakang</th>
                                    <th>Nama Lengkap</th>
                                    <th>Nama Lengkap</th>
                                </tr>
                        </thead>
                          </tbody>";

While ($row = pg_fetch_array($result)){
                            $cif=$_GET["cif"];
                            $cab=$row["cab"];
                            $namadepan=$row["namadepan"];
                            $namatengah=$row["namatengah"];	
                            $namabelakang=$row["namabelakang"];	
                            $nama=$row["nama"];	

	echo "
<form method='get' action='updatenama.php'>
<tr>
                    <td><input type='text' value='".$cab."' name='cab' readonly></td>".
                    "<td><input type='text' value='".$cif."' name='cif' readonly></td>".
                    "<td><input type='text' value='".$namadepan."' name='namadepan' ></td>".
                    "<td><input type='text' value='".$namatengah."' name='namatengah' ></td>".
                    "<td><input type='text' value='".$namabelakang."' name='namabelakang' ></td>".
                    "<td><input type='text' value='".$nama."' name='nama'></td>

<td><button class='btn btn-primary waves-effect' data-type='success'>Proses Ubah Nama</button></td>
                                </tr>
                            </form>	";
}

//echo "$cif";

?>
</article>
                    </div>
                    <!---->
                    </div>
                    </div>
                    </div>
                    </div>
                </div>
        <!---->
        <hr>
                    <!---->
                <!-- /.table-responsive -->  
    
</body>
</section>

