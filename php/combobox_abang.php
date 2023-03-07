<html>

<?php
if(isset($_GET['value1'])){
	$option2 = $_GET["value1"];
}else{
	$option2 = "";
}
?>
<form  method="get" > 
<select id="opt" name="value1" onChange="this.form.submit();">
<option>- Pilih satu cabang -</option>
</form>
<?php
$conn = pg_connect("host=localhost port=5432 dbname=Test user=postgres password=kutukupret");

if (!$conn)
  {
   echo "Gagal Connect";
  }

 $result = pg_query("select o_000001, s_000000
  from o_00_002 
  order by o_000001");		//memanggil nama cabang
  //$row=pg_fetch_assoc($result);
$return = array();

while($row = pg_fetch_row($result)) {
	echo ' <option value="'.$row[0].'" >'.$row[0].' - '.$row[1].' </option>'; 
}
 
echo ' </select>';

 ?>

 <?php
if(isset($_GET['value1'])){ // Checks if 1Ste Drop Down menu has a value. cek dropdown pertama punya nilai atau tidak.
$value1=$_GET['value1']; 
?>
<form method="GET"> 
Pilih AO 
<select name="nomor_ao" onChange="none">
<?php 
$result = pg_query($conn, "select a_000012, s_000000
	 FROM s_00_006  
	 WHERE  trim(g_000001) = '".$_GET['value1']."'  and a_000009 = '1' ORDER BY s_000000");
$return = array();
		while($row = pg_fetch_row($result)) {
		echo '<option value="'.$row[0].'">'.$row[0].' - '.$row[1].'</option>';
}
	echo '</select>';
 ?>
 <input type='submit'  value='Post'>
<?php
	}else{
		echo "\n";
	}
?>
 
</form>
 
</html>