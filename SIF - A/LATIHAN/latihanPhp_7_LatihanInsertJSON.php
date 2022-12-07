<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var dataMhs = [];

		var indeks=0;

		function tambahData() {
			dataMhs.push({"nim":document.getElementById('nim').value, "nama":document.getElementById('nama').value, "jurusan":document.getElementById('jurusan').value});
			tampil();
		}

		function simpanData() {
			window.location = "latihanPhp_7_receiveDataJSON.php?parData=" + JSON.stringify(dataMhs);
		} 

		function tampil() {
			var strOutput="";
			for(var idxIsi in dataMhs) {
				strOutput = strOutput + dataMhs[idxIsi].nim + " " + dataMhs[idxIsi].nama + " " + dataMhs[idxIsi].jurusan;
				strOutput = strOutput + "<br>";
			}
			document.getElementById("output").innerHTML = strOutput;
			document.getElementById("btnSimpan").style.visibility ="visible";
		}
	</script>

</head>
<body>
	<form method="post" action="proses.php">
		nim: <input type="text" name="nim" id="nim"><br>
		nama: <input type="text" name="nama" id="nama"><br>
		jurusan: <input type="text" name="jurusan" id="jurusan"><br>
	</form>
	<button onclick="tambahData()">Tambah</button>

	<div>
		<div id="output"></div>
		<button id="btnSimpan" onclick="simpanData()" style="visibility:hidden">Simpan</button>
	</div>


</body>
</html>