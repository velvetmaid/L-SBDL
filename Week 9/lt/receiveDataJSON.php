<?php
$koneksi = new mysqli("localhost", "camieux", "viper666", "kampus");
if ($koneksi->connect_error) {
    echo '<script language="javascript">';
    echo 'alert("Koneksi gagal!, Data tidak tersimpan")' . mysqli_connect_error();
    echo '</script>';
    exit();
}
echo '<script language="javascript">';
echo 'alert("Data JSON sudah tersimpan kedalam table mahasiswa database kampus")';
echo '</script>';

$insert = $koneksi->prepare("INSERT INTO mahasiswa(nim, nama, kdProdi) VALUES (?, ?, ?)");
$insert->bind_param('sss', $varNim, $varNama, $varKdProdi);

$data = json_decode($_GET['parData']);
$arrayData = sizeof($data);
$i = 0;
while ($i < $arrayData) {
    $varNim = $data[$i]->nim;
    $varNama = $data[$i]->nama;
    $varKdProdi = $data[$i]->kdProdi;
    $insert->execute();
    $i++;
}
