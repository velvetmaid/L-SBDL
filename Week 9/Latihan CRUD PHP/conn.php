<?php
$koneksi = mysqli_connect("localhost", "camieux", "viper666", "sbdl"); //Sesuaikan

if ($koneksi->connect_error) {
    die("Koneksi gagal!" . mysqli_connect_error());
}
/* 'Koneksi berhasil'; */