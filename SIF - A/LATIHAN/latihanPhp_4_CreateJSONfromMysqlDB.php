<!DOCTYPE html>
<html>
<head>
	<title>Latihan Php Basic - MySqli prepare()</title>
	<?php
		include "latihanPhp_1_conn.php";
	?>

	<?php
		$json_data = array();
		/*query akses data di tabel*/
		$hasilQuery = $DBCoba->prepare("select * from mhs");
		$hasilQuery->execute();
		$hasilQuery->bind_result($nim, $nama, $jurusan);
		while($hasilQuery->fetch()) {
			$json_array['nim'] = $nim;
			$json_array['nama'] = $nama;
			$json_array['jurusan'] = $jurusan;
			array_push($json_data, $json_array);
		}
		$data = json_encode($json_data);
	?>

	
</head>
<body>
	<table border="1" width="90%">
		<thead><tr><th>NIM</th><th>NAMA</th><th>JURUSAN</th></tr></thead>
		<?php
			$x= count($json_data);
			for($i=0;$i<$x;$i++){
			?>
		<tr>
			<td><?=$json_data[$i]['nim']?></td>
			<td><?=$json_data[$i]['nama']?></td>
			<td><?=$json_data[$i]['jurusan']?></td>
		</tr>
			<?php }?>
	</table>

	<script type="text/javascript">
		var dataMhs = <?php echo $data; ?>;
		
		jml=dataMhs.length;
		
		for(let i = 0; i < jml; i++){
		document.getElementById("nim_10").innerHTML = dataMhs[i].nim;
		document.getElementById("nama_10").innerHTML = dataMhs[i].nama;
		document.getElementById("jur_10").innerHTML = dataMhs[i].jurusan;
		};
		
	</script>
</body>
</html>