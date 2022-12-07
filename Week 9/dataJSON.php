<?php include 'koneksi.php' ?>
<?php
$sql = "SELECT * from mytable";
$result = mysqli_query($koneksi, $sql) or die("Error " . mysqli_error($koneksi));

$emparray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emparray[] = $row;
}
echo "
<hr>";
echo json_encode($emparray[0]); //satu data
echo "
<hr>";
echo json_encode($emparray); //banyak data

