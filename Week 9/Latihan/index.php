<!DOCTYPE html>
<html>

<head>
    <title>Latihan Php Basic - MySqli prepare()</title>
    <?php
    include "koneksi.php";
    ?>
    <?php
    $json_data = array();
    /*query akses data di tabel*/
    $hasilQuery = $DB->prepare("SELECT KodeProduk, NamaProduk, HargaModal FROM
produk");
    $hasilQuery->execute();
    $hasilQuery->bind_result($KodeProduk, $NamaProduk, $HargaModal);
    while ($hasilQuery->fetch()) {
        $json_array['KodeProduk'] = $KodeProduk;
        $json_array['NamaProduk'] = $NamaProduk;
        $json_array['HargaModal'] = $HargaModal;
        array_push($json_data, $json_array);
    }
    //echo json_encode($json_data);
    ?>
    <script type="text/javascript">
        var dataProduk = <?php echo json_encode($json_data); ?>;
        var indeks = 0;

        function baru() {
            var myWindow = window.open("baru.php", "_self");
        }

        function tampil() {
            document.getElementById("KodeProduk").value = dataProduk[indeks].KodeProduk;
            document.getElementById("NamaProduk").value = dataProduk[indeks].NamaProduk;
            document.getElementById("HargaModal").value = dataProduk[indeks].HargaModal;
        }

        function bacaData() {
            indeks = 0;
            tampil();
            document.getElementById("btnNext").disabled = false;
            document.getElementById("btnPrev").disabled = true;
            document.getElementById("tabel").style.visibility = "visible";
        }

        function nextData() {
            indeks++;
            tampil();
            if (indeks <= dataProduk.length) {
                tampil();
                document.getElementById("btnPrev").disabled = false;
            } else {
                indeks = 1;
                alert("Ini sudah data terakhir");
                document.getElementById("btnNext").disabled = true;
            }
        }

        function prevData() {
            indeks--;
            if (indeks >= 0) {
                tampil();
                document.getElementById("btnNext").disabled = false;
            } else {
                alert("Ini sudah data awal");
                indeks = 0;
                document.getElementById("btnPrev").disabled = true;
            }
        }
    </script>
</head>

<body>
    <h1>DATA PRODUK</h1>
    <form>
        Kode Produk: <input type="text" id="KodeProduk" name="KodeProduk"><br />
        Nama Produk: <input type="text" id="NamaProduk" name="NamaProduk"><br />
        Harga Modal: <input type="text" id="HargaModal" name="HargaModal"><br />
    </form>
    <br>
    <button onclick="bacaData();">Baca Data</button>
    <button id="btnPrev" onclick="prevData();" disabled="true">
        <<< </button>
            <button id="btnNext" onclick="nextData();" disabled="true">>></button>
            <button onclick="baru();">Data Baru</button>
            <br />
            <hr>
            <table id="tabel" style="visibility:hidden" border="1" width="100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Harga Beli</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    for ($i = 0; $i < count($json_data); $i++) { ?>
                        <tr>
                            <td><?= $no ?></td>
                            <td><?= $json_data[$i]['KodeProduk'] ?></td>
                            <td><?= $json_data[$i]['NamaProduk'] ?></td>
                            <td>Rp. <?= $json_data[$i]['HargaModal'] ?></td>
                        </tr>
                    <?php $no++;
                    } ?>
                </tbody>
            </table>
</body>

</html>