isiData = [{
    "tahun": "2000",
    "jenis": "padi",
    "hasil": 20
}, {
    "tahun": "2001",
    "jenis": "padi",
    "hasil": 40
}, {
    "tahun": "2002",
    "jenis": "padi",
    "hasil": 60
}, {
    "tahun": "2003",
    "jenis": "padi",
    "hasil": 50
}, {
    "tahun": "2004",
    "jenis": "padi",
    "hasil": 30
}, {
    "tahun": "2005",
    "jenis": "padi",
    "hasil": 40
}, {
    "tahun": "2006",
    "jenis": "padi",
    "hasil": 40
}, {
    "tahun": "2007",
    "jenis": "padi",
    "hasil": 50
}, {
    "tahun": "2000",
    "jenis": "jagung",
    "hasil": 30
}, {
    "tahun": "2001",
    "jenis": "jagung",
    "hasil": 40
}, {
    "tahun": "2002",
    "jenis": "jagung",
    "hasil": 40
}, {
    "tahun": "2003",
    "jenis": "Jagung",
    "hasil": 50.1,
}, {
    "tahun": "2004",
    "jenis": "jaagung",
    "hasil": 20
}, {
    "tahun": "2005",
    "jenis": "jagung",
    "hasil": 40
}, {
    "tahun": "2006",
    "jenis": "jcgung",
    "hasil": 60
}, {
    "tahun": "2007",
    "jenis": "jbgung",
    "hasil": "50" // sengaja string karena parameter isNaN() bisa cek
}, {
    "tahun": "2022",
    "jenis": "kiwi 1",
    "hasil": 100
}, {
    "tahun": "20000",
    "jenis": "kiwi 2",
    "hasil": 1000
}]

function sortTblColumn(tblSwp, column, switching) {
    var swap = switching ? 1 : -1;
    var myTable = document.getElementById("myTbl").tBodies[0]; // https://www.w3schools.com/jsref/coll_table_tbodies.asp
    var rows = Array.from(myTable.querySelectorAll("tr")); // Buat variabel pilih semua array element tr di dalam myTbl(myTable)

    // Sortir baris dengan fungsi => element.sort() 
    var sortedRows = rows.sort((up, down) => {
        var upSort = up.querySelector(`td:nth-child(${ column + 1 })`).innerHTML.toLowerCase();
        var downSort = down.querySelector(`td:nth-child(${ column + 1 })`).innerHTML.toLowerCase();
        // Parsing ke integer biar bisa baca numeric/angka, gunakan parameter isNaN(value) untuk deklarasi tipe data
        if (isNaN(parseInt(upSort)) && isNaN(parseInt(downSort))) {
            return upSort > downSort ? (1 * swap) : (-1 * swap);
        }
        return +upSort > +downSort ? (1 * swap) : (-1 * swap);
    });

    // Re-add the newly sorted rows
    myTable.append(...sortedRows);

    var tblSwp = document.querySelector("#myTbl"); // element tblSwp panggil id myTbl
    // Remember how the column is currently sorted
    tblSwp.querySelectorAll("th").forEach(th => th.classList.remove("sortAsc", "sortDesc"));
    tblSwp.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("sortAsc", switching);
    tblSwp.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("sortDesc", !switching);
}

/* Tampil data JSON */
var tbl = document.getElementById("myTbl"); // variabel untuk mewakili tabel <table>
var tblBody = document.createElement("tbody"); // buat element baru, bungkus tabel isi dengan tag <tbody>
for (var i = 0; i < isiData.length; i++) {
    // Perulangan array
    var tblRow = document.createElement("tr");
    //selama perulangan tambah baris baru dengan tag <tr>
    for (var j in isiData[i]) {
        var td = document.createElement("td");
        //Buat kolom atau sel di setiap baris dengan <td>
        var isiDataJSON = document.createTextNode(isiData[i][j]);
        td.appendChild(isiDataJSON);
        // cell = td didalam nya berisi isiDataJSON
        tblRow.appendChild(td);
        // cell/<td> dibungkus tblRow/<tr>
    }
    tblBody.appendChild(tblRow);
    // bungkus 
}
tbl.appendChild(tblBody);
// bungkus lagi


function showTblYears() {
    for (var i = 0; i < isiData.length; i++) {
        var tblRowYears = `<tr>
            <td>${isiData[i].tahun}</td>
        </tr>`
        tblRowYears.appendChild(td);
    }
}

/* Fungsi reverse asc/desc */
document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        var tableElement = headerCell;
        var headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        var currentSwap = headerCell.classList.contains("sortAsc");
        sortTblColumn(tableElement, headerIndex, !currentSwap);
    });
});

/* Fungsi button tampil semua table */
document.getElementById("showTbl").addEventListener("click", function () {
    if (document.querySelector("#myTbl").style.display === "revert")
        document.querySelector("#myTbl").style.display = "none";
    else
        document.querySelector("#myTbl").style.display = "revert";
});

/* Koreksi bila ada salah */