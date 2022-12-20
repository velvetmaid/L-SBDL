<?php
$koneksi = new mysqli("localhost", "camieux", "viper666", "careCare");
if ($koneksi->connect_error) {
    echo '<script language="javascript">';
    echo 'alert("Koneksi gagal!, Data tidak tersimpan")' . mysqli_connect_error();
    echo '</script>';
    exit();
}
echo '<script language="javascript">';
echo 'alert("Youve Been Suck ur Time")';
echo '</script>';

$insert = $koneksi->prepare("INSERT INTO cSquad(characterName, species, position, ability) VALUES (?, ?, ?, ?)");
$insert->bind_param('ssss', $varX, $varY, $varZ, $varXX);

$data = json_decode($_GET['parData']);
$arrayData = sizeof($data);
$i = 0;
while ($i < $arrayData) {
    $varX = $data[$i]->characterName;
    $varY = $data[$i]->species;
    $varZ = $data[$i]->position;
    $varXX = $data[$i]->ability;
    $insert->execute();
    $i++;
}
