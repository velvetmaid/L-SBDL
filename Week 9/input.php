<?php include 'koneksi.php' ?>
<!-- Sesuaikan nama table. Disini pake (nama, nim, kd_prodi)  -->
<?php
$nama = $_REQUEST['nama'];
$nim = $_REQUEST['nim'];
$kd_prodi = $_REQUEST['kd_prodi'];

$records = "INSERT INTO mhs VALUES ('$nama', '$nim','$kd_prodi')";
if (mysqli_query($koneksi, $records)) {
    echo "Data berhasil ditambahkan.";
} else {
    echo "Data gagal ditambahkan: " . $records . "<br>" . mysqli_error($koneksi);
}
header("location:index.php");

/* Tutup koneksi 2 cara seperti dibawah: */

// mysqli_close($koneksi);
$koneksi->close();
