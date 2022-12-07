//JSON
{
    "dataPanen": [
      { "tahun": "2000", "jenis": "padi", "hasil": "20" },
      { "tahun": "2001", "jenis": "padi", "hasil": "40" },
      { "tahun": "2002", "jenis": "padi", "hasil": "60" },
      { "tahun": "2003", "jenis": "padi", "hasil": "50" },
      { "tahun": "2004", "jenis": "padi", "hasil": "30" },
      { "tahun": "2005", "jenis": "padi", "hasil": "40" },
      { "tahun": "2006", "jenis": "padi", "hasil": "40" },
      { "tahun": "2007", "jenis": "padi", "hasil": "50" },
      { "tahun": "2000", "jenis": "jagung", "hasil": "30" },
      { "tahun": "2001", "jenis": "jagung", "hasil": "40" },
      { "tahun": "2002", "jenis": "jagung", "hasil": "40" },
      { "tahun": "2003", "jenis": "jagung", "hasil": "50" },
      { "tahun": "2004", "jenis": "jagung", "hasil": "20" },
      { "tahun": "2005", "jenis": "jagung", "hasil": "40" },
      { "tahun": "2006", "jenis": "jagung", "hasil": "60" },
      { "tahun": "2007", "jenis": "jagung", "hasil": "50" }
    ]
  }
  

//HTML
<body>
  <div id="wrapBtn">
    <button onclick="showTbl()">Show Table</button>
    <button onclick="closeTbl()">Close Table</button>
  </div>
  <section>
    <table id="myTbl" class="table-sortable">
      <thead>
        <tr>
          <th>Tahun</th>
          <th>Jenis</th>
          <th>Hasil</th>
        </tr>
      </thead>
    </table>
  </section>

  <script
    language="javascript"
    type="text/javascript"
    src="produksi.js"
  ></script>
</body>



//JavaScript
var arrayProduksi = [];

fetch("./produksi.json")
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        arrayProduksi = data.dataPanen;
        showTable();
        console.log(data);
    })
function sortTblColumn(tblSwp, column, switching) {
    var sort = switching ? 1 : -1;
    var myTable = document.getElementById("myTbl").tBodies[0];
    var rows = Array.from(myTable.querySelectorAll("tr"));

    var sortedRows = rows.sort((up, down) => {
        var upSort = up.querySelector(`td:nth-child(${ column + 1 })`).innerHTML.toLowerCase();
        var downSort = down.querySelector(`td:nth-child(${ column + 1 })`).innerHTML.toLowerCase();

        if (((upSort)) && ((downSort))) {
            return upSort > downSort ? (1 * sort) : (-1 * sort);
        }
        return +upSort > +downSort ? (1 * sort) : (-1 * sort);
    });
    myTable.append(...sortedRows);

    var tblSwp = document.querySelector("#myTbl");
    tblSwp.querySelectorAll("th").forEach(th => th.classList.remove("sortAsc", "sortDesc"));
    tblSwp.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("sortAsc", switching);
    tblSwp.querySelector(`th:nth-child(${ column + 1})`).classList.toggle("sortDesc", !switching);
}

function showTable() {
    var tbl = document.getElementById("myTbl");
    var tblBody = document.createElement("tbody");
    for (var i = 0; i < arrayProduksi.length; i++) {
        var tblRow = document.createElement("tr");
        for (var j in arrayProduksi[i]) {
            var td = document.createElement("td");
            var isiDataJSON = document.createTextNode(arrayProduksi[i][j]);
            td.appendChild(isiDataJSON);
            tblRow.appendChild(td);
        }
        tblBody.appendChild(tblRow);
    }
    tbl.appendChild(tblBody);
}

document.querySelectorAll(".table-sortable th").forEach(headerCell => {
    headerCell.addEventListener("click", () => {
        var tableElement = headerCell;
        var headerIndex = Array.prototype.indexOf.call(headerCell.parentElement.children, headerCell);
        var currentSwap = headerCell.classList.contains("sortAsc");
        sortTblColumn(tableElement, headerIndex, !currentSwap);
    });
});

function showTbl() {
    document.querySelector("table", ).style.display = "revert";
}
function closeTbl() {
    document.querySelector("table").style.display = "none";
}