<?php
	/*koneksi ke database*/
	$DBCoba = new mysqli("localhost", "root", "rahasia", "SBDL");
	if(mysqli_connect_errno()) {
		echo ("gagal koneksi, pesan kesalahan: " . mysqli_connect_error() );
		exit();
	}
	
?>