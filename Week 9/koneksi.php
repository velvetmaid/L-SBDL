<?php
$koneksi = mysqli_connect("HOSTNAME", "USERNAME", "PASSWORD", "DATABASE"); //Sesuaikan

if ($koneksi->connect_error) {
    die("Koneksi gagal!" . mysqli_connect_error());
}
echo 'Koneksi berhasil';