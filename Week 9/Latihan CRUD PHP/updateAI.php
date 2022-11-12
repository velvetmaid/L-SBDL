<?php include 'conn.php' ?>
<!-- Auto Increment Refresh -->
<?php
$updateAI = "SET @num := 0;";
$updateAI .= "UPDATE mhs SET id = @num := (@num+1);";
$updateAI .= "ALTER TABLE mhs AUTO_INCREMENT = 1;";
mysqli_multi_query($koneksi, $updateAI);
header("location:index.php");
