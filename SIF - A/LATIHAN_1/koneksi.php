<?php
	/*koneksi ke database*/
	$DB = new mysqli("localhost", "root", "rahasia", "sbdl");
	if(mysqli_connect_errno()) {
		echo ("gagal koneksi, pesan kesalahan: " . mysqli_connect_error() );
		exit();
	}
	
?>