<?php include 'conn.php' ?>

<?php
$id = $_GET['id'];
// $records = "SET @num := 0;";
// $records .= "UPDATE mhs SET id = @num := (@num+1);";
// $records .= "ALTER TABLE mhs AUTO_INCREMENT = 1;";
$records = "DELETE FROM mhs WHERE id='$id'";
if ($koneksi->query($records)) {
    // echo "Data berhasil dihapus.";
} else {
    // echo "Data gagal dihapus: " . $records . "<br>" . mysqli_error($koneksi);
}
header("location:index.php");


/* Tutup koneksi 2 cara seperti dibawah: */

// mysqli_close($koneksi);
$koneksi->close();
