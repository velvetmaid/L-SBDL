<!DOCTYPE html>
<html>

<head>
	<title>Latihan Php Basic - MySqli query()</title>
	<?php
	include "latihanPhp_1_conn.php"
	?>

	<?php
	$json_data = array();
	/*query akses data di tabel*/
	$hasilQuery = $DBCoba->query("select * from mhs");
	while ($data = $hasilQuery->fetch_object()) {
		array_push($json_data, $data);
	}
	$data = json_encode($json_data);

	?>

</head>

<body>
	<center>
		<h1> DATA MAHASISWA BLANDED UPJ</h1>
		<table border="1" width="100%">
			<thead>
				<tr>
					<td>NIM</td>
					<td>NAMA</td>
					<td>JURUSAN</td>
				</tr>
			</thead>
			<tr>
				<td id="nim"></td>
				<td id="nama"></td>
				<td id="jur"></td>
			</tr>
			<tr>
				<td id="nim1"></td>
				<td id="nama1"></td>
				<td id="jur1"></td>
			</tr>
			<tr>
				<td id="nim2"></td>
				<td id="nama2"></td>
				<td id="jur2"></td>
			</tr>
		</table>

		<script type="text/javascript">
			var dataMhs = new Array();
			dataMhs = <?php echo json_encode($json_data); ?>;

			jlm = data.length;
			//alert(jml);
			for (let i = 0; i < 10; i++) {

				document.getElementById("nim").innerHTML = dataMhs[0].nim;
				document.getElementById("nama").innerHTML = dataMhs[0].nama;
				document.getElementById("jur").innerHTML = dataMhs[0].jurusan;

				document.getElementById("nim1").innerHTML = dataMhs[1].nim;
				document.getElementById("nama1").innerHTML = dataMhs[1].nama;
				document.getElementById("jur1").innerHTML = dataMhs[1].jurusan;

				document.getElementById("nim2").innerHTML = dataMhs[2].nim;
				document.getElementById("nama2").innerHTML = dataMhs[2].nama;
				document.getElementById("jur2").innerHTML = dataMhs[2].jurusan;

				document.getElementById("nim3").innerHTML = dataMhs[3].nim;
				document.getElementById("nama3").innerHTML = dataMhs[3].nama;
				document.getElementById("jur3").innerHTML = dataMhs[3].jurusan;
			}
		</script>
	</center>
</body>

</html>