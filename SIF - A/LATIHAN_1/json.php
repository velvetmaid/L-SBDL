<?php
 header('Content-Type: application/json; charset=utf8');
 //panggil koneksi.php
 include("koneksi.php");

 //query tabel produk
 $sql="SELECT * FROM produk";
 $query=mysqli_query($DB, $sql) or die(mysql_error());

//data array
 $dt=array();
 while($data=mysqli_fetch_assoc($query)) $dt[]=$data; 
 
//mengubah data array menjadi json
 $jdt = json_encode($dt);
 
	echo $jdt;
 
?>