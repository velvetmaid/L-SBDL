<?php
/*koneksi ke database*/
$DB = new mysqli("localhost", "camieux", "viper666", "latsbdlweek9");
if(mysqli_connect_errno()) {
echo ("gagal koneksi, pesan kesalahan: " . mysqli_connect_error() );
exit();
}
