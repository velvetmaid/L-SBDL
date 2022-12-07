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
		
		//echo json_encode($json_data);
	?>

	<script type="text/javascript">
		var dataMhs = <?php echo json_encode($json_data); ?>;
		var indeks = 0;

		function tampil() {
			document.getElementById("txtNim").value = dataMhs[indeks].nim;
			document.getElementById("txtNama").value = dataMhs[indeks].nama;
			document.getElementById("txtJurusan").value = dataMhs[indeks].jurusan;
		}

		function bacaData() {
			indeks = 0;
			tampil();
			document.getElementById("btnNext").disabled=false;
			document.getElementById("btnPrev").disabled=true;
		}

		function nextData() {
			indeks++;
			tampil();
			if(indeks<=dataMhs.length) {
				tampil();
				document.getElementById("btnPrev").disabled=false;
			}
			else {
				indeks = 1;
				alert("Ini sudah data terakhir");
				document.getElementById("btnNext").disabled=true;
			}
		}

		function prevData() {
			indeks--;
			if(indeks>=0) {
				tampil();
				document.getElementById("btnNext").disabled=false;
			}
			else {
				alert("Ini sudah data awal");
				indeks = 0;
				document.getElementById("btnPrev").disabled=true;
			}
		}
	</script>
</head>
<body>
	<h1>DATA MAHASISWA</h1>
	<form>
		NIM: <input type="text" id="txtNim" name="txtNim"><br/>
		NAMA: <input type="text" id="txtNama" name="txtNama"><br/>
		JURUSAN: <input type="text" id="txtJurusan" name="txtJurusan"><br/>
	</form>

	<button onclick="bacaData();">Baca Data</button>
	<button id="btnPrev" onclick="prevData();" disabled="true"><<</button>
	<button id="btnNext" onclick="nextData();" disabled="true">>></button><br/>

	<table>
		<thead><tr><td>NIM</td><td>NAMA</td><td>JURUSAN</td></tr></thead>
		<tr>
			<td id="nim"></td>
			<td id="nama"></td>
			<td id="jur"></td>
		</tr>
	</table>

</body>
</html>