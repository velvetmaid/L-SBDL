<?php
include('conn.php');
?>

<?php
$id = $_GET['id'];
$nama = $_GET['nama'];
$nim = $_GET['nim'];
$prodi = $_GET['prodi'];
$insert = "UPDATE mhs SET nama='$nama', nim='$nim', prodi='$prodi' WHERE id='$id' ";

if ($koneksi->query($insert)) {
    header("location:index.php");
} else {
    echo "ERROR, data gagal diupdate";
}
$koneksi->close();

?>