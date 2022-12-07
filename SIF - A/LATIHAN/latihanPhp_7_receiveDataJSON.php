<?php
	include('latihanPhp_1_conn.php');
	$varData = json_decode($_GET['parData']);
	$varJmlData = sizeof($varData);
	$varIndex = 0;

	echo "NIM: " . $varData[0]->nim . "<br/>";
	echo "NAMA: " . $varData[0]->nama . "<br/>";
	echo "JURUSAN: " . $varData[0]->jurusan . "<br/>";
	echo "<br/>";
	echo "NIM: " . $varData[1]->nim . "<br/>";
	echo "NAMA: " . $varData[1]->nama . "<br/>";
	echo "JURUSAN: " . $varData[1]->jurusan . "<br/>";
	echo "Jumlah Data: " . sizeof($varData);


	/*query simpan data ke tabel*/
	$simpanData = $DBCoba->prepare("insert into mhs(nim,nama) values (?, ?)");
	$simpanData->bind_param('ss', $varNim, $varNama);

	while($varIndex<$varJmlData) {
		$varNim = $varData[$varIndex]->nim;
		$varNama = $varData[$varIndex]->nama;
		//$varJur = $varData[$varIndex]->jurusan;

		if($simpanData->execute()) {
			echo "<br/>Data berhasil disimpan";
			//header("location:latihanPhp_2b_form.php");
		}
		else {
			die("<br/>isi data gagal: " . htmlspecialchars($simpanData->error));
		};
		$varIndex++;
	}

	
?>