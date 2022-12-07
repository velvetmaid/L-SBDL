<?php
	include('koneksi.php');
	$varData = json_decode($_GET['parData']);
	$varJmlData = sizeof($varData);
	
	for($varIndex = 0; $varIndex < $varJmlData; $varIndex++ ){
		echo "KODEPRODUK: " . $varData[$varIndex]->KodeProduk . "<br/>";
		echo "NAMA PRODUK: " . $varData[$varIndex]->NamaProduk . "<br/>";
		echo "HARGA MODAL: " . $varData[$varIndex]->HargaModal . "<br/>";
		echo "<br/>";
	}
	
echo "Jumlah Data: " . sizeof($varData);


	/*query simpan data ke tabel*/
	$simpanData = $DB->prepare("insert into produk(KodeProduk, NamaProduk, HargaModal) values (?, ?, ?)");
	$simpanData->bind_param('sss', $varKode, $varNama, $varHarga);

$varIndex = 0;

	while($varIndex<$varJmlData) {
		$varKode = $varData[$varIndex]->KodeProduk;
		$varNama = $varData[$varIndex]->NamaProduk;
		$varHarga= $varData[$varIndex]->HargaModal;

		if($simpanData->execute()) {
			echo "<br/>Data berhasil disimpan";
			header("location:data.php");
		}
		else {
			die("<br/>isi data gagal: " . htmlspecialchars($simpanData->error));
		};
		$varIndex++;
	}

	
?>