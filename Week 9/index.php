<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="author" content="Ciuus SBDL week 9">
  <title>SBDL | Week 9</title>
</head>

<body>
  <style>
    * {
      box-sizing: border-box;
    }

    div {
      justify-content: center;
    }

    .wrapper {
      display: flex;
      align-items: center;
    }

    form,
    table {
      width: 100%;
    }

    table {
      padding: 12px 12px 12px 0;
      vertical-align: middle;
    }

    table,
    th,
    td {
      text-align: center;
      border: 1px solid #cccccc;
      border-collapse: collapse;
    }

    input {
      width: 90%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    input[type='number'] {
      -moz-appearance: textfield;
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    .column {
      float: left;
      width: 50%;
    }

    .btn-input {
      margin-top: 1rem;
    }
  </style>

  <?php include 'dataJSON.php' ?>

  <script type="text/javascript">
    let objData = <?php echo json_encode($emparray) ?>;
    console.log(objData);

    objData.forEach((item) => {
      const kunci = Object.keys(item);
      kunci.forEach((id) => {
        console.log(item[id]);
      })
    });
  </script>

  <div class="wrapper">
    <div class="column">
      <form action="input.php" method="post">
        <!-- <div>
          <label for="Nama">Nama:</label>
          <input type="text" name="nama" id="Nama" required />
        </div>
        <div>
          <label for="NIM">NIM:</label>
          <input type="number" name="nim" id="NIM" required />
        </div> -->
        <div>
          <label for="wilayah">Wilayah:</label>
          <input type="text" name="wilayah" required />
        </div>
        <div>
          <label for="jumlah_kecamatan">Jumlah Kecamatan:</label>
          <input type="number" name="jumlah_kecamatan" required />
        </div>
        <div>
          <label for="kemasan_kaleng">Kemasan Kaleng /Kg:</label>
          <input type="number" name="kemasan_kaleng" required />
        </div>
        <div>
          <label for="kemasan_plastik_/kg">Kemasan Kaleng /Kg:</label>
          <input type="number" name="kemasan_plastik_/kg" required />
        </div>
        <div>
          <label for="jumlah_kecamatan">Jumlah Kecamatan:</label>
          <input type="number" name="jumlah_kecamatan" required />
        </div>
        <div>
          <label for="jumlah_kecamatan">Jumlah Kecamatan:</label>
          <input type="number" name="jumlah_kecamatan" required />
        </div>
        <!-- <div>
          <label for="kdProdi">Prodi:</label>
          <input type="text" name="kd_prodi" id="kdProdi" required />
        </div> -->
        <input class="btn-input" type="submit" value="Input" />
      </form>
    </div>

    <div class="column">
      <table>
        <tr>
          <!-- <th>Nama</th>
          <th>Nim</th>
          <th>Prodi</th> -->
          <th>wilayah</th>
          <th>jumlah_kecamatan</th>
          <th>kemasan_kaleng_/kg</th>
          <th>kemasan_plastik_/kg</th>
          <th>waste_/kg</th>
          <th>baterai_/kg</th>
          <th>lampu_bekas_/kg</th>
          <th>jumlah_lb3_rumah_tangga</th>
          <th>limbah_medis/kg</th>
          <th>jumlah_lb3_rt_dan_medis</th>
          <th>oli_bekas(liter)</th>
          >>>>>>> 6ff3e9b (lat)
        </tr>

        <?php include 'koneksi.php' ?>

        <?php $records = "SELECT * FROM mytable"; ?>
        <?php if ($result = mysqli_query($koneksi, $records)) {
          if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
              <tr>
                <!-- <td> <?php echo $row['nama']; ?> </td>
                <td> <?php echo $row['nim']; ?> </td>
                <td> <?php echo $row['kd_prodi']; ?> </td> -->

                <td> (<?php echo $row['wilayah']; ?>) </td>
                <td> <?php echo $row['jumlah_kecamatan']; ?> </td>
                <td> <?php echo $row['kemasan_kaleng_/kg']; ?> </td>
                <td> <?php echo $row['kemasan_plastik_/kg']; ?> </td>
                <td> <?php echo $row['e-waste_/kg']; ?> </td>
                <td> <?php echo $row['baterai_/kg']; ?> </td>
                <td> <?php echo $row['lampu_bekas/kg']; ?> </td>
                <td> <?php echo $row['jumlah_lb3_rumah_tangga']; ?> </td>
                <td> <?php echo $row['limbah_medis/kg']; ?> </td>
                <td> <?php echo $row['jumlah_lb3_rt_dan_medis']; ?> </td>
                <td> <?php echo $row['oli_bekas(liter)']; ?> </td>
              </tr>
        <?php
            }
          }
        } ?>
      </table>
    </div>
  </div>
</body>

</html>