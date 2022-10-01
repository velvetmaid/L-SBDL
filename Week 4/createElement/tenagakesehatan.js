// JSON Sumber = https://data.jakarta.go.id/read-resource/json/data-jumlah-tenaga-kesehatan-menurut-kabupaten-kota-provinsi-dki-jakarta/57b985383f67bd3516e75580d88ba26d
var isiData = [
  {
    tahun: 2020,
    wilayah: "Kepulauan Seribu",
    tenaga_kesehatan: "Dokter",
    jumlah: 43,
  },
  {
    tahun: 2020,
    wilayah: "Kepulauan Seribu",
    tenaga_kesehatan: "Perawat",
    jumlah: 89,
  },
  {
    tahun: 2020,
    wilayah: "Kepulauan Seribu",
    tenaga_kesehatan: "Bidan",
    jumlah: 57,
  },
  {
    tahun: 2020,
    wilayah: "Kepulauan Seribu",
    tenaga_kesehatan: "Farmasi",
    jumlah: 15,
  },
  {
    tahun: 2020,
    wilayah: "Kepulauan Seribu",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 9,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Selatan",
    tenaga_kesehatan: "Dokter",
    jumlah: 2338,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Selatan",
    tenaga_kesehatan: "Perawat",
    jumlah: 7764,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Selatan",
    tenaga_kesehatan: "Bidan",
    jumlah: 1659,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Selatan",
    tenaga_kesehatan: "Farmasi",
    jumlah: 1993,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Selatan",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 296,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Timur",
    tenaga_kesehatan: "Dokter",
    jumlah: 1861,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Timur",
    tenaga_kesehatan: "Perawat",
    jumlah: 8030,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Timur",
    tenaga_kesehatan: "Bidan",
    jumlah: 1840,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Timur",
    tenaga_kesehatan: "Farmasi",
    jumlah: 1709,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Timur",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 338,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Pusat",
    tenaga_kesehatan: "Dokter",
    jumlah: 2530,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Pusat",
    tenaga_kesehatan: "Perawat",
    jumlah: 9824,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Pusat",
    tenaga_kesehatan: "Bidan",
    jumlah: 1227,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Pusat",
    tenaga_kesehatan: "Farmasi",
    jumlah: 1772,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Pusat",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 366,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Barat",
    tenaga_kesehatan: "Dokter",
    jumlah: 1995,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Barat",
    tenaga_kesehatan: "Perawat",
    jumlah: 6167,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Barat",
    tenaga_kesehatan: "Bidan",
    jumlah: 1281,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Barat",
    tenaga_kesehatan: "Farmasi",
    jumlah: 1536,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Barat",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 279,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Utara",
    tenaga_kesehatan: "Dokter",
    jumlah: 1345,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Utara",
    tenaga_kesehatan: "Perawat",
    jumlah: 4341,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Utara",
    tenaga_kesehatan: "Bidan",
    jumlah: 1063,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Utara",
    tenaga_kesehatan: "Farmasi",
    jumlah: 1102,
  },
  {
    tahun: 2020,
    wilayah: "Jakarta Utara",
    tenaga_kesehatan: "Ahli Gizi",
    jumlah: 229,
  },
];

var tbl = document.getElementById("dataTabel"); // variabel untuk mewakili tabel <table>
var tblBody = document.createElement("tbody"); // buat element baru, bungkus tabel isi dengan tag <tbody>
for (var i = 0; i < isiData.length; i++) {
  // Perulangan array
  var tblRow = document.createElement("tr");
  //selama perulangan tambah baris baru dan bungkus dengan tag <tr>

  /* for (i = 0; i < tblRow.length; i++) {
    tblRow[i].filter(isOdd).style.backgroundColor = "#fff";
    tblRow[i].filter(isEven).style.backgroundColor = "#000";
  } */ // Perulanag strip untuk tabel masih error

  for (var prop in isiData[i]) {
    // Setiap akhir <tr> baru <td>
    var cell = document.createElement("td");
    //Buat kolom atau sel di setiap baris <td>
    var cellText = document.createTextNode(isiData[i][prop]);
    cell.appendChild(cellText);
    // cell = td didalam nya berisi cellText
    tblRow.appendChild(cell);
    // cell/<td> dibungkus tblRow/<tr>
  }
  tblBody.appendChild(tblRow);
  //sama bungkus
}
tbl.appendChild(tblBody);
// bungkus lagi
