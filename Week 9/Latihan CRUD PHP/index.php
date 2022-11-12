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

  <!-- Notifikasi -->
  <?php if (isset($_SESSION['message'])) : ?>
    <div class="msg">
      <?php
      echo $_SESSION['message'];
      unset($_SESSION['message']);
      ?>
    </div>
  <?php endif ?>

  <style>
    .wrapper {
      display: flex;
      align-items: center;
      justify-content: center;

    }

    form,
    table {
      width: 100%;
    }

    table {
      padding: 12px 10rem 12px 0;
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
      padding: 12px 10rem 12px 0;
      display: inline-block;
    }

    .column {
      float: left;
      width: 40%;
    }

    .delete-row {
      text-decoration: none;
      color: salmon;
    }

    .btn-input {
      margin-top: 1rem;
    }
  </style>

  <div class="wrapper">
    <div class="column">
      <form action="input.php" method="POST">
        <div>
          <label for="Nama">Nama:</label>
          <input type="text" name="nama" required />
        </div>
        <div>
          <label for="NIM">NIM:</label>
          <input type="number" name="nim" required />
        </div>
        <div>
          <label for="Prodi">Prodi:</label>
          <input type="text" name="prodi" required />
        </div>
        <input class="btn-input" type="submit" value="Input" />
      </form>
    </div>

    <div class="column">
      <table>
        <a href="/updateAI.php">Refresh</a>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nim</th>
          <th>Prodi</th>
        </tr>

        <?php include 'conn.php' ?>

        <?php $records = "SELECT * FROM mhs"; ?>
        <?php if ($result = mysqli_query($koneksi, $records)) {
          if (mysqli_num_rows($result)) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
              <tr>
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['nama']; ?> </td>
                <td> <?php echo $row['nim']; ?> </td>
                <td> <?php echo $row['prodi']; ?> </td>
                <td> <a id="updateBtn" class="update-row" href="/" data-toggle="modal" data-target="#myModal<?php echo $row['id']; ?>">Edit</td>
                <td> <a class="delete-row" href="delete.php?id=<?php echo $row['id']; ?>">Hapus</a> </td>
              </tr>
        <?php
            }
          }
        } ?>
      </table>
    </div>
  </div>

  <!-- Tampilan Modal tanpa Bootstrap soon... -->
  <!-- Kalau mau dipisah buat file baru copy baris dibawah dan sesuaikan href button update pada baris diatas eg. -->
  <?php $records = "SELECT * FROM mhs"; ?>
  <?php if ($result = mysqli_query($koneksi, $records)) {
    if (mysqli_num_rows($result)) {
      while ($row = mysqli_fetch_array($result)) {
  ?>
        <div class="modal" id="myModal<?php echo $row['id']; ?>" role="dialog">
          <header><span class="close">&times;</span></header>
          <form role="form" action="update.php" method="GET">
            <!-- Sembunyikan $id mhs -->
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $row['nama']; ?>">

            <label>NIM</label>
            <input type="text" name="nim" class="form-control" value="<?php echo $row['nim']; ?>">

            <label>Prodi</label>
            <input type="text" name="prodi" class="form-control" value="<?php echo $row['prodi']; ?>">
            <div class="modal-footer">
              <button type="submit">Update</button>
              <button class="close" type="button">Batal</button>
            </div>
          </form>
        </div>
  <?php
      }
    }
  } ?>

  <script>
    var modal = document.getElementById("myModal");
    var btn = document.getElementById("updateBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function() {
      modal.style.display = "block";
    };

    span.onclick = function() {
      modal.style.display = "none";
    };

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  </script>

</body>

</html>
