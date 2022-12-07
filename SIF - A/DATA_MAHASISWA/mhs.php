<?php  
	$mahasiswa = file_get_contents("mhs.json");
 	$data = json_decode($mahasiswa, true);
?>

<!DOCTYPE html>
<html>
<head>
 <title>Menampilkan data json</title>
</head>
<body>
	<h1 align='center'>Data mahasiswa </h1>
 <table border="1">
  <tr>
   <th>No</th>
   <th>NIM</th>
   <th>Nama mahasiswa</th>
   <th>Alamat</th>
   </tr>
  <?php
	$no=1;
	for($i=0; $i < count($data); $i++)
   	{
			print "<tr>";
			// penomeran otomatis
			print "<td>".$no.".</td>";
			// menampilkan data 
			print "<td>".$data[$i]['NIM']."</td>";
			print "<td>".$data[$i]['NAMA']."</td>";
			print "<td>".$data[$i]['ALAMAT']."</td>";
			print "</tr>";
			$no++;
   }
	
  ?>
 </table>
</body>
</html>