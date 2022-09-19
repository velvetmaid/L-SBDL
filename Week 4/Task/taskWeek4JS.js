// Bungkus semua element menggunakan <section> dengan id wrapperAll
var wrapper = document.getElementById("wrapperAll");
// Judul
var title = document.createElement("h3");
title.innerText = "Tempat Penampungan Sampah Sementara (TPS) di Wilayah DKI Jakarta Tahun 2019";
wrapper.appendChild(title);

//Menggunakan innerText harus satu persatu
/* var descriptionDate = document.createElement("p");
var descriptionDetail = document.createElement("p");
descriptionDate.innerText = "(Tanggal Buat : 02 Februari 2019)";
descriptionDetail.innerText = "Data ini berisikan tentang data lokasi tempat penampunan sampah sementara(TPS) di wilayah Provinsi DKI Jakarta tahun 2019";
wrapper.appendChild(descriptionDate);
wrapper.appendChild(descriptionDetail); */

//Menggunakan innerHTML bisa menggunakan tag HTML
var description = document.createElement("div");
description.innerHTML = "<p>(Tanggal Buat: 02 Februari 2019) <br/>Data ini berisikan tentang data lokasi tempat penampunan sampah sementara(TPS) di wilayah Provinsi DKI Jakarta tahun 2019 <br/></p>Penjesalasn variabel dalam data sebagai berikut:<br/>";
wrapper.appendChild(description);

//List
var ol = document.createElement("ol");
ol.innerHTML = "<li>nama_TPS : nama TPS yang telah ditentukan</li><li>alamat : merupakan alamat dari TPS:</li><li>Kelurahan : merupkan kelurahan dari lokasi TPS: Kecamatan :</li><li>Kecamatan : merupakan kecamatan dari lokasi TIPS;</li><li>Wilayah : merupakan wilayah dari lokasi TPS;</li><li>jenis_TPS : merupakan jenis-jenis TPS;</li><li>luas_lahan(m2) : adalah luas lahan TPS dalam meter persegi;</li><li>status_lahan : adalah status lahan pada TPS.</li><li>volume rata - rata perhari (m3)</li>";
wrapper.appendChild(ol);

// <table>
var tbl = document.getElementById("myTable");
// bungkus isi didalam tabel dengan tag <tbody>
var tblBody = document.createElement("tbody");
var tr = document.createElement("tr");
tr.innerHTML += "<th>Nama TPS</th><th>Alamat</th><th>Kelurahan</th><th>Kecamatan</th><th>Wilayah</th><th>Jenis TPS</th><th>Luas Lahan (m2)</th><th>Status Lahan</th><th>Volume avg per-hari (m3)</th>";
tblBody.appendChild(tr);

// Perulangan array
for (var i = 0; i < dataJSON.length; i++) {
    //Selama perulangan tambah baris baru dan bungkus dengan tag <tr>
    var tblRow = document.createElement("tr");
    for (var prop in dataJSON[i]) {
        var cell = document.createElement("td");
        //Panggil data JSON variabel "i"
        var cellText = document.createTextNode(dataJSON[i][prop]);
        //Didalam <td> isi Data JSON
        cell.appendChild(cellText);
        //Ulangi
        tblRow.appendChild(cell);
    }
    tblBody.appendChild(tblRow);
}
tbl.appendChild(tblBody);

wrapper.appendChild(tbl);