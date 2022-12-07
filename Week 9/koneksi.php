<?php
<<<<<<< HEAD
$koneksi = mysqli_connect("HOSTNAME", "USERNAME", "PASSWORD", "DATABASE"); //Sesuaikan
=======
$koneksi = mysqli_connect("localhost", "camieux", "viper666", "pembuangan_sampah"); //Sesuaikan
>>>>>>> 6ff3e9b (lat)

if ($koneksi->connect_error) {
    die("Koneksi gagal!" . mysqli_connect_error());
}
<<<<<<< HEAD
// echo 'Koneksi berhasil';
=======
echo 'Koneksi berhasil';

>>>>>>> 6ff3e9b (lat)
