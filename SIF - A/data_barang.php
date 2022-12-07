<?php  
	$barang = file_get_contents("./js/barang.json");
 	$data = json_decode($barang, true);
?>

<!DOCTYPE html>
<html>
<head>
 <title>Menampilkan data json</title>
 <style>
  table {
   width: 100%; 
  }
  table tr td {
   padding: 1rem;
  }
 </style>
</head>
<body>
	<h1 align='center'>Data Barang Dagang </h1>
 <form method="post">
	Nama barang: <input type="text" name="nama_barang" placeholder="nama barang yang dicari">
	<button type="submit" name="cari">Cari</button>
 </form>
 <table border="1">
  <tr>
   <th>No</th>
   <th>Kode Barang</th>
   <th>Nama Barang</th>
   <th>Harga Satuan</th>
   </tr>
  <?php
	
	 //mengurutkan
	function sortByNama($a, $b) {
    	return $a['HARGA_SATUAN'] > $b['HARGA_SATUAN'];
	}
	
	usort($data, 'sortByNama');
	
	 $no = 1;

	if(isset($_POST['cari'])){
		$cari_nama = $_POST['nama_barang'];
		
		for($i=0; $i < count($data); $i++)
   	{
		//filter / memilih yang akan ditampilkan
		if($data[$i]['NAMA_BARANG']== $cari_nama OR $data[$i]['KODE_BARANG']== $cari_nama) {
	
			print "<tr>";
			// penomeran otomatis
			print "<td>".$no.".</td>";
			// menampilkan data 
			print "<td>".$data[$i]['KODE_BARANG']."</td>";
			print "<td>".$data[$i]['NAMA_BARANG']."</td>";
			print "<td>".$data[$i]['HARGA_SATUAN']."</td>";
			print "</tr>";
			$no++;
		}
   }
	}else{
	
   	for($i=0; $i < count($data); $i++)
   	{
		//filter / memilih yang akan ditampilkan
		//if($data[$i]['NAMA_BARANG']=="SONY 52X"){
	
			print "<tr>";
			// penomeran otomatis
			print "<td>".$no.".</td>";
			// menampilkan data 
			print "<td>".$data[$i]['KODE_BARANG']."</td>";
			print "<td>".$data[$i]['NAMA_BARANG']."</td>";
			print "<td>".$data[$i]['HARGA_SATUAN']."</td>";
			print "</tr>";
			$no++;
		//}
   }
	}
  ?>
 </table>
</body>
</html>