<?php
$conn = new mysqli("localhost", "camieux", "viper666", "kampus");

$stmt = $conn->prepare("INSERT INTO mahasiswa(nim, nama, kdProdi) VALUES (?, ?, ?)");
$stmt->bind_param('sss', $x, $y, $z,);

$data = json_decode($_GET['x']);

$arrayData = sizeof($data);
$i = 0;
while ($i < $arrayData) {
    $x = $data[$i]->nim;
    $y = $data[$i]->nama;
    $z = $data[$i]->kdProdi;
    $stmt->execute();
    $i++;
}

header("Location: index.html");
