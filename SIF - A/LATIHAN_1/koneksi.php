<?php
	/*koneksi ke database*/
	$DB = new mysqli("localhost", "camieux", "viper666", "sbdl");
	if(mysqli_connect_errno()) {
		echo ("gagal koneksi, pesan kesalahan: " . mysqli_connect_error() );
		exit();
	}
	
?>