<form method="POST">
	<input type="text" name="cari">
	<button type="submit" name="_cari">CARI </button>
</form>
<table border="1">
<tr>
<th>NO.</th>
<th>KODE BARANG</th>
<th>NAMA BARANG</th>
<th>HARGA SATUAN</th>
</tr>
<?php  
	$barang = file_get_contents("./js/barang.json");
 	$data = json_decode($barang, true);
	
	$no = 1;

	if(isset($_POST['_cari'])){
		$cari = $_POST['cari'];
		
		for($i=0; $i < count($data); $i++)
   	{
		//filter / memilih yang akan ditampilkan
		if($data[$i]['NAMA_BARANG']== $cari OR $data[$i]['KODE_BARANG']== $cari) {
	
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
		
	$no=1;
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
	}
	}
?>
</table>
