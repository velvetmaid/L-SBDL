<?php
include('koneksi.php');
$varData = json_decode($_GET['parData']);
$varJmlData = sizeof($varData);

for ($varIndex = 0; $varIndex < $varJmlData; $varIndex++) {
    echo "KODEPRODUK: " . $varData[$varIndex]->nim . "<br/>";
    echo "NAMA PRODUK: " . $varData[$varIndex]->nama . "<br/>";
    echo "HARGA MODAL: " . $varData[$varIndex]->kdProdi . "<br/>";
    echo "<br/>";
}

echo "Jumlah Data: " . sizeof($varData);


/*query simpan data ke tabel*/
$simpanData = $DB->prepare("INSERT INTO produk(nim, nama, kdProdi) VALUES (?, ?, ?)");
$simpanData->bind_param('sss', $varKode, $varNama, $varHarga);
$varIndex = 0;
while ($varIndex < $varJmlData) {
    $varKode = $varData[$varIndex]->nim;
    $varNama = $varData[$varIndex]->nama;
    $varHarga = $varData[$varIndex]->kdProdi;

    if ($simpanData->execute()) {
        echo "<br/>Data berhasil disimpan";
        header("location:index.php");
    } else {
        die("<br/>isi data gagal: " . htmlspecialchars($simpanData->error));
    };
    $varIndex++;
}
