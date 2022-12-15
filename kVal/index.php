<?php
$koneksi = new mysqli("localhost", "camieux", "viper666", "careCare");
// if ($koneksi->connect_error) {
//   // echo '<script language="javascript">';
//   // echo 'alert("Koneksi gagal!, Data tidak tersimpan")' . mysqli_connect_error();
//   // echo '</script>';
//exit();
// }

$sql = "SELECT * FROM cSquad";
$query = mysqli_query($koneksi, $sql) or die(mysqli_connect_error());

$dt = array();
while ($data = mysqli_fetch_assoc($query)) {
  $dt[] = $data;
}

$jdt = json_encode($dt);
$data = json_decode($jdt);
// echo $data;
// echo '<table>';
// foreach ($data as $result) {
//   echo '<tr>';
//   echo '<td>' . $result->characterName . '</td>';
//   echo '<td>' . $result->species . '</td>';
//   echo '<td>' . $result->position . '</td>';
//   echo '<td>' . $result->ability . '</td>';
//   echo '</tr>';
// }
// echo '</table>';

// foreach ($data as $dataj) {
//   echo json_encode($dataj);
// }
// echo json_encode($data);
// echo "<script>console.log('"$data"') </script>"

?>


<!DOCTYPE html>
<html>

<head>
</head>

<body>
  <div class="wrapper">
    <button id="myBtn">Create Team</button>
    <div>
      <table id="valTblSql">
        <tr>
          <th>Character Name</th>
          <th>Species</th>
          <th>Position</th>
          <th>Ability</th>
        </tr>
      </table>
    </div>
    <div id="myModal" class="modal">
      <div class="box-content">
        <header><span class="close">&times;</span></header>
        <form id="myForm" enctype="application/json" autocomplete="off">
          <div class="user-box">
            <input type="text" class="foo" id="characterName" name="characterName" />
            <label>Character Name</label>
          </div>
          <div class="user-box">
            <input type="text" class="foo" id="species" name="species" />
            <label>Species</label>
          </div>
          <div class="user-box">
            <select type="text" class="foo" id="position" name="position">
              <option value="Front Line">Front Line</option>
              <option value="Middle Line">Middle Line</option>
              <option value="Back Line">Back Line</option>
            </select>
            <label for="position">Position</label>
          </div>
          <div class="user-box">
            <input type="text" class="foo" id="ability" name="ability" />
            <label>Ability</label>
          </div>
          <button class="btn" type="button" onclick="addData()">Add</button>
          <!-- <input type="button" onclick="addTo()" value="Add" /> -->
        </form>
        <table id="valTblResult" class="valRes">
          <tr>
            <th>Character Name</th>
            <th>Species</th>
            <th>Position</th>
            <th>Ability</th>
          </tr>
        </table>
        <button id="valBtnSave" class="btn">Confirm Save</button>
        <button id="valBtnUpdate" class="btn">Confirm Update</button>
        <button id="valBtnDelete" class="btn">Confirm Delete</button>
        <div id="kontol">Hasil addJSON Testing<div>
            <p>Some text in the Modal..</p>
            <p>Some text in the Modal..</p>
            <p>Some text in the Modal..</p>
            <p>Some text in the Modal..</p>
          </div>
        </div>

        <h1>123 | ABC abc</h1>
        <h2>Quickly</h2>
        <h3 class="testNgentod">Lorem Ipsum 1</h3> <br>
        <h3 class="testNgentod">Lorem Ipsum 2</h3> <br>
        <h3 class="testNgentod">Lorem Ipsum 3</h3> <br>
        <h3 class="testNgentod">Lorem Ipsum 4</h3> <br>
      </div>

      <script>
        // /* Start Modal */
        // var modal = document.getElementById("myModal");
        // var btn = document.getElementById("myBtn");
        // var span = document.getElementsByClassName("close")[0];

        // btn.onclick = function() {
        //   modal.style.display = "block";
        // };

        // span.onclick = function() {
        //   modal.style.display = "none";
        // };

        // window.onclick = function(event) {
        //   if (event.target == modal) {
        //     modal.style.display = "none";
        //   }
        // };
        // /* End Modal */

        // const vResult = document.getElementById("kontol");

        // const arr = [];

        const arrObj = [{
          characterName: "EQUatioN Jerks",
          species: "Greedy",
          position: "Borderline",
          ability: "Equation Behaviour, Manipulative"
        }, {
          characterName: "nim1",
          species: "namaMhs",
          position: "prodi",
          ability: "testing"
        }, {
          characterName: "loremipsum",
          species: "loremipsum",
          position: "SIF",
          ability: "loremipsum"
        }]; // write object in this array, if you want to add. Sesuaikan key dengan field table db


        function displayTblData() {
          // const li = document.createElement("li");
          //   li.innerHTML = arr;
          //   vResult.appendChild(li);
          console.log(arrObj);
          // const vResult = document.getElementById("kontol");
          const vTbl = document.getElementById("valTblResult")
          const vRow = document.createElement("tr");
          const col1 = document.createElement("td");
          const col2 = document.createElement("td");
          const col3 = document.createElement("td");
          const col4 = document.createElement("td");
          for (var i = 0; i < arrObj.length; i++) {
            col1.innerHTML = arrObj[i].characterName;
            col2.innerHTML = arrObj[i].species;
            col3.innerHTML = arrObj[i].position;
            col4.innerHTML = arrObj[i].ability;
            vRow.appendChild(col1);
            vRow.appendChild(col2);
            vRow.appendChild(col3);
            vRow.appendChild(col4);
            vTbl.appendChild(vRow);
            // kontol.appendChild(vRow);
          }
        }

        // Button function 1
        function addData() {
          const obj = {
            characterName: document.getElementById("characterName").value,
            species: document.getElementById("species").value,
            position: document.getElementById("position").value,
            ability: document.getElementById("ability").value
          }
          arrObj.push(obj); // PUSH DATA OBJ KE ARRAY (arr)

          // var x = document.getElementsByClassName("valRes");
          // for (var i = 0; i < x.length; i++) {
          //   x[i].style.display = "revert";
          // } // Show table after click addData

          document.getElementById("myForm").reset(); // Reset FORM
          displayTblData(); // Funtion baru untuk tampil data

          var xcv = JSON.stringify(arrObj);
          console.log("string", xcv);
        }


        var cumIndex;
        var cum = <?= $jdt ?> // $jdt ???, cek baris 18 diatas hasil encode

        // function hakurei() {
        //   setTimeout(() => {
        //     var vei = document.getElementById("valTblSql")
        //     for (var i = 0; i < cum.length; i++) {
        //       var row = `<tr>
        //                 <td>${cum[i].characterName}</td>
        //                 <td>${cum[i].species}</td>
        //                 <td>${cum[i].position}</td>
        //                 <td>${cum[i].ability}</td>
        //                 <td><button type="button" class="btn" onclick="rmvData(${cum[i].characterName})">Remove</button></td>
        //             </tr>`
        //       vei.innerHTML += row
        //     }
        //   }, 200);
        // }

        function hakurei() {
          var row = '';
          for (var i = 0; i < cum.length; i++) {
            row +=
              `<tr>
                  <td>${cum[i].characterName}</td>
                  <td>${cum[i].species}</td>
                  <td>${cum[i].position}</td>
                  <td>${cum[i].ability}</td>
                  <td><button class="btn" onclick ="getData(${i})">Update</button></td>
                  <td><button class="btn" onclick ="rmvData(${i})">Delete</button></td>
               </tr>`
          }
          document.getElementById('valTblSql').innerHTML = row;
        }

        hakurei(); // Panggil function hakurei untuk tampil table

        valBtnUpdate.style.display = "none";
        valBtnDelete.style.display = "none";

        valBtnUpdate.onclick = function() {
          updtData();
          hakurei();
          valBtnUpdate.style.display = "none";
        }

        valBtnDelete.onclick = function() {
          updtData();
          hakurei();
          valBtnDelete.style.display = "none";
        }

        function rmvData(index) {
          cum.splice(index, 1);
          hakurei();
          localStorage.setItem('cumming', JSON.stringify(cum));
          console.log(cum);
          valBtnDelete.style.display = "inline-block";
        }

        function getData(index) {
          cumIndex = index;
          var currentProduct = cum[index];
          document.getElementById("characterName").value = currentProduct.characterName;
          document.getElementById("species").value = currentProduct.species;
          document.getElementById("position").value = currentProduct.position;
          document.getElementById("ability").value = currentProduct.ability;
          valBtnUpdate.style.display = "inline-block";
        }

        function updtData() {
          var cums = {
            characterName: document.getElementById("characterName").value,
            species: document.getElementById("species").value,
            position: document.getElementById("position").value,
            ability: document.getElementById("ability").value
          }
          cum[cumIndex] = cums;
          localStorage.setItem('cumming', JSON.stringify(cum));
          // addBtn.style.display = 'inline-block';
        }

        // function rmvData(rec) {
        //   console.log(rec);

        //   var yukari = cum.filter((a, i) => {
        //     if (rec == a.characterName) {
        //       cum.splice(i, 1);
        //     }
        //   })
        //   console.log(cum);
        //   hakurei();
        // }

        console.log("loremipsum", cum)
        // const vTblSql = document.getElementById("valTblSql")
        // const vRsql = document.createElement("tr");
        // const colSql1 = document.createElement("td");
        // const colSql2 = document.createElement("td");
        // const colSql3 = document.createElement("td");
        // const colSql4 = document.createElement("td");
        // for (var k = 0; k < cum.length; k++) {
        //   colSql1.innerHTML = cum[k].characterName;
        //   colSql2.innerHTML = cum[k].species;
        //   colSql3.innerHTML = cum[k].position;
        //   colSql4.innerHTML = cum[k].ability;
        //   vRsql.appendChild(colSql1);
        //   vRsql.appendChild(colSql2);
        //   vRsql.appendChild(colSql3);
        //   vRsql.appendChild(colSql4);
        //   vTblSql.appendChild(vRsql);
        // }
        // var xcv = JSON.stringify(cum);
        // console.log("stringify", xcv);

        // var vbn = JSON.parse(xcv);
        // console.log("parse", vbn);

        const veiBtnSave = document.querySelector("#valBtnSave");
        veiBtnSave.addEventListener("click", () => {
          window.location.href =
            "testingTerima.php?aksi=insert&parData=" + JSON.stringify(arrObj);
          // setTimeout(function() {window.history.go(-2)} , 3000); // Back to index.php (Doesn't Work)
        });

        const veiBtnDelete = document.querySelector("#valBtnDelete");
        veiBtnDelete.addEventListener("click", () => {
          window.location.href =
            "testingTerima.php?aksi=bruh&parData=" + JSON.stringify(cum);
        });

        const veiBtnUpdate = document.querySelector("#valBtnUpdate");
        veiBtnUpdate.addEventListener("click", () => {
          window.location.href =
            "testingTerima.php?aksi=bruh&parData=" + JSON.stringify(cum);
        });


        /* Show Table 2 */
        // const vTblSql = document.getElementById("valTblSql")
        // var tblBody = document.createElement("tbody");
        // for (var i = 0; i < cum.length; i++) {
        //   var tblRow = document.createElement("tr");
        //   for (var j in cum[i]) {
        //     var td = document.createElement("td");
        //     var btnR = document.createElement("button");
        //     var isiDataJSON = document.createTextNode(cum[i][j]);
        //     td.appendChild(isiDataJSON);
        //     tblRow.appendChild(td);
        //   }
        //   tblBody.appendChild(tblRow);
        // }
        // vTblSql.appendChild(tblBody);


        // Button Function 2
        /* function addData() {
        // const obj =
        // {
        var characterName = document.getElementById("characterName").value;
        var species = document.getElementById("species").value;
        var position = document.getElementById("position").value;
        var ability = document.getElementById("ability").value;
        // }
        if(characterName && species && position && ability){
        arr.push({characterName:characterName, species:species, position:position, ability:ability});
        displayTblData()
        }
        } */





        /* ----------------------------------------------------------- */
        /* WHAT THE ACTUAL FUCK (SUCH A WASTE OF TIME), SHITTIEST CODE */
        /* ----------------------------------------------------------- */
        // const fForm = document.querySelector("form");
        // const input = document.querySelectorAll(".foo").value;
        // const dataList = document.getElementById("kontol");

        // const existData = JSON.parse(localStorage.getItem("kontol")) || [];

        // const arrData = [];

        // existData.forEach((input) => {
        // addData(input);
        // });

        // /* Start cp */
        // function addData() {
        // arrData.push();
        // const li = document.createElement("li");
        // li.innerHTML = character_name;
        // dataList.appendChild(li);
        // localStorage.setItem("kontol", JSON.stringify(arrData));
        // input.value = "";
        // console.log(arrData);
        // }

        // // Events
        // fForm.onsubmit = (event) => {
        // event.preventDefault();
        // addData(input.value);
        // };

        /* End cp */
        // function handleSubmit(event) {
        // event.preventDefault();

        // const data = new FormData(event.target);
        // const value = Object.fromEntries(data.entries());
        // arrData.push(value);

        // console.log(arrData);
        // console.log({ value });

        // const viewJson = JSON.stringify(value);
        // console.log({ viewJson });
        // document.getElementById("kontol").innerHTML = viewJson;
        // // document.getElementById("kontol").innerHTML = viewJson;
        // // showJSON({ viewJson });
        // showJSON(viewJson);
        // }

        // function showJSON(viewJson) {
        // var mainContainer = document.getElementById("myData");
        // for (var i = 0; i < viewJson.length; i++) { // var div=document.createElement("p"); // div[i].innerHTML=// "Name: " + // viewJson[i].character_name + // " " + // viewJson[i].species + // " " + // viewJson[i].position + // " " + // viewJson[i].ability; // mainContainer.appendChild(div); // } // document.getElementById("kontol").innerHTML=viewJson; // // document.getElementById("btnSimpan").style.visibility="visible" ; // } // const form=document.querySelector("form"); // form.addEventListener("submit", handleSubmit); //Show JSON 
      </script>
</body>

</html>