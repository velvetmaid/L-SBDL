<?php include 'conn.php' ?>
<!-- Sesuaikan nama table. Disini pake (nama, nim, prodi)  -->
<?php
// $insert = "SET @num := 0;";
// $insert .= "UPDATE mhs SET id = @num := (@num+1);";
// $insert .= "ALTER TABLE mhs AUTO_INCREMENT = 1;";

$nama = $_REQUEST['nama'];
$nim = $_REQUEST['nim'];
$prodi = $_REQUEST['prodi'];
$insert = "INSERT INTO mhs VALUES (NULL, '$nama', '$nim','$prodi')";

if ($koneksi->query($insert)) {
    // echo "Data berhasil ditambahkan.";
} else {
    // echo "Data gagal ditambahkan: " . $records . "<br>" . mysqli_error($koneksi);
}

header("location:index.php");

/* Tutup koneksi 2 cara seperti dibawah: */

// mysqli_close($koneksi);
$koneksi->close();
