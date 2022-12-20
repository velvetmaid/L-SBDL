<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript">
        var dataProduk = [];

        var indeks = 0;

        function tambahData() {
            dataProduk.push({
                "nim": document.getElementById('nim').value,
                "nama": document.getElementById('nama').value,
                "kdProdi": document.getElementById('kdProdi').value
            });
            tampil();
        }

        function simpanData() {
            window.location = "simpan.php?parData=" + JSON.stringify(dataProduk);
        }

        function tampil() {
            var strOutput = "";
            for (var idxIsi in dataProduk) {
                strOutput = strOutput + dataProduk[idxIsi].nim + " " + dataProduk[idxIsi].nama + " " + dataProduk[idxIsi].kdProdi;
                strOutput = strOutput + "<br>";
            }
            document.getElementById("output").innerHTML = strOutput;
            document.getElementById("btnSimpan").style.visibility = "visible";
        }
    </script>

</head>

<body>
    <h1>DATA PRODUK</h1>
    <form>
        Kode Produk: <input type="text" id="nim" name="nim"><br />
        Nama Produk: <input type="text" id="nama" name="nama"><br />
        Harga Modal: <input type="text" id="kdProdi" name="kdProdi"><br />
    </form>
    <button onclick="tambahData()">Tambah</button>

    <div>
        <div id="output"></div>
        <button id="btnSimpan" onclick="simpanData()" style="visibility:hidden">Simpan</button>
    </div>

</body>

</html>