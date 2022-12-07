<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
		var dataProduk = [];

		var indeks=0;

		function tambahData() {
			dataProduk.push({"KodeProduk":document.getElementById('KodeProduk').value, "NamaProduk":document.getElementById('NamaProduk').value, "HargaModal":document.getElementById('HargaModal').value});
			tampil();
		}

		function simpanData() {
			window.location = "simpan.php?parData=" + JSON.stringify(dataProduk);
		} 

		function tampil() {
			var strOutput="";
			for(var idxIsi in dataProduk) {
				strOutput = strOutput + dataProduk[idxIsi].KodeProduk + " " + dataProduk[idxIsi].NamaProduk + " " + dataProduk[idxIsi].HargaModal;
				strOutput = strOutput + "<br>";
			}
			document.getElementById("output").innerHTML = strOutput;
			document.getElementById("btnSimpan").style.visibility ="visible";
		}
	</script>

</head>
<body>
<h1>DATA PRODUK</h1>
<form>
 Kode Produk: <input type="text" id="KodeProduk" name="KodeProduk"><br/>
 Nama Produk: <input type="text" id="NamaProduk" name="NamaProduk"><br/>
 Harga Modal: <input type="text" id="HargaModal" name="HargaModal"><br/>
</form>
<button onclick="tambahData()">Tambah</button>

	<div>
		<div id="output"></div>
		<button id="btnSimpan" onclick="simpanData()" style="visibility:hidden">Simpan</button>
	</div>
	
	</body>
</html>
