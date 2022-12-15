<?php
// $koneksi = new mysqli("localhost", "camieux", "viper666", "careCare");
// if ($koneksi->connect_error) {
// echo '<script language="javascript">';
// echo 'alert("Koneksi gagal!, Data tidak tersimpan")' . mysqli_connect_error();
// echo '</script>';
//     exit();
// }
// echo '<script language="javascript">';
// echo 'alert("Data JSON sudah tersimpan kedalam table mahasiswa database kampus")';
// echo '</script>';

class database
{
    var $host = "localhost";
    var $user = "camieux";
    var $pass = "viper666";
    var $db = "careCare";

    function __construct()
    {
        global $conn;
        $conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);
    }

    // function display_data()
    // {
    //     global $conn;
    //     $data = $conn->query("SELECT * FROM cSquad");
    //     while ($d = mysqli_fetch_array($data)) {
    //         $hasil[] = $d;
    //     }
    //     return $hasil;
    // }

    function insert_data($varX, $varY, $varZ, $varXX)
    {
        global $conn;
        $insert = $conn->prepare("INSERT IGNORE INTO cSquad(characterName, species, position, ability) VALUES (?, ?, ?, ?)");
        $insert->bind_param('ssss', $varX, $varY, $varZ, $varXX); // Ignore untuk skip data duplikat

        // $insert->bind_param('sss', $varX, $varY, $varZ); 
        // Kalau keynya 3 berarti valuenya juga 3
        // s = String
        // d = Digit
        // i = Integer
        // ...->bind_param('sdi', $String, $Digit, $Integer);

        $set = $_GET['parData'];
        $data = json_decode($set);

        $arrayData = sizeof($data);
        $i = 0;
        while ($i < $arrayData) {
            $varX = $data[$i]->characterName;
            $varY = $data[$i]->species;
            $varZ = $data[$i]->position;
            $varXX = $data[$i]->ability;
            $insert->execute();
            $i++;
        }
    }

    function update_data($rows)
    {
        // global $conn;
        // // $insert = $conn->prepare("UPDATE cSquad SET characterName='$varX', species='$varY', position='$varZ', ability='$varA' WHERE characterName='$varX'");

        // $set = json_decode($_GET['parData']);

        // foreach ($rows as $k => $v) {
        //     $set[] = "$k='$v'";
        // }
        // $sql = "UPDATE cSquad SET " . implode(', ', $set);
        // $conn->query($sql);


        // if (!empty($arr)) {
        //     $query = "UPDATE cSquad SET species='$varY', position='$varZ', ability='$varA' WHERE characterName='$varX'";
        //     $stmt = $conn->prepare($query);
        //     $stmt->bind_param("ssss", $varX, $varY, $varZ, $varA);
        //     $stmt->execute();
        //     // Add your code here.
        // }

        // mysqli_query($conn, "UPDATE cSquad SET characterName='$varX', species='$varY', position='$varZ', ability='$varA' WHERE characterName='$varX'");
        // $insert->bind_param('ssss', $varX, $varY, $varZ, $varA); // Ignore untuk skip data duplikat

        // $data = json_decode($_GET['parData']);

        // $arrayData = sizeof($data);
        // $i = 0;
        // while ($i < $arrayData) {
        //     $varX = $data[$i]->characterName;
        //     $varY = $data[$i]->species;
        //     $varZ = $data[$i]->position;
        //     $varA = $data[$i]->ability;
        //     $insert->execute();
        //     $i++;
        // }


        // mysqli_query($conn, "DELETE FROM cSquad");
        // // mysqli_query($conn, "DELETE FROM cSquad WHERE characterName='$varA'");

        // $insert = $conn->prepare("INSERT IGNORE INTO cSquad(characterName, species, position, ability) VALUES (?, ?, ?, ?)");
        // $insert->bind_param('ssss', $varX, $varY, $varZ, $varA);

        // $data = json_decode($_GET['parData']);
        // $arrayData = sizeof($data);
        // $i = 0;
        // while ($i < $arrayData) {
        //     $varX = $data[$i]->characterName;
        //     $varY = $data[$i]->species;
        //     $varZ = $data[$i]->position;
        //     $varA = $data[$i]->ability;
        //     $insert->execute();
        //     $i++;
        // }
    }

    // function delete_data($varA)
    // {
    //     global $conn;
    //     mysqli_query($conn, "DELETE FROM cSquad WHERE characterName='$varA'");
    // }

    function delete_data($varX, $varY, $varZ, $varA)
    {
        global $conn;
        mysqli_query($conn, "DELETE FROM cSquad");
        // mysqli_query($conn, "DELETE FROM cSquad WHERE characterName='$varA'");

        $insert = $conn->prepare("INSERT IGNORE INTO cSquad(characterName, species, position, ability) VALUES (?, ?, ?, ?)");
        $insert->bind_param('ssss', $varX, $varY, $varZ, $varA);

        $data = json_decode($_GET['parData']);
        $arrayData = sizeof($data);
        $i = 0;
        while ($i < $arrayData) {
            $varX = $data[$i]->characterName;
            $varY = $data[$i]->species;
            $varZ = $data[$i]->position;
            $varA = $data[$i]->ability;
            $insert->execute();
            $i++;
        }
    }

    // function hapus($id){
    //     mysqli_query("DELETE FROM user where id='$id'");
    // }
}

$db = new database();
$varX = 'caharcterName';
$varY = 'species';
$varZ = 'position';
$varA = 'ability';

$aksi = $_GET['aksi'];
if ($aksi == "insert") {
    $db->insert_data($varX, $varY, $varZ, $varA);
    header("location:index.php");
} elseif ($aksi == "bruh") {
    $db->delete_data($varX, $varY, $varZ, $varA);
    header("location:index.php");
} elseif ($aksi == "bruh") {
    $db->delete_data($varX, $varY, $varZ, $varA);
    header("location:index.php");
}

// $insert = $koneksi->prepare("INSERT IGNORE INTO cSquad(characterName, species, position, ability) VALUES (?, ?, ?, ?)"); // IGNORE UNTUK MELEWATI DATA JIKA DATA TERSEBUT MEMILIKI VALUE YANG SAMA
// $insert->bind_param('ssss', $varX, $varY, $varZ, $varXX); // Ignore untuk skip data menjadi duplikat

// // $insert = $koneksi->prepare("INSERT IGNORE INTO cSquad(id, characterName, species, position, ability) VALUES (NULL, ?, ?, ?, ?)");
// // $insert->bind_param('ssss', $varX, $varY, $varZ, $varXX);

// $data = json_decode($_GET['parData']);
// $arrayData = sizeof($data);
// $i = 0;
// while ($i < $arrayData) {
//     $varX = $data[$i]->characterName;
//     $varY = $data[$i]->species;
//     $varZ = $data[$i]->position;
//     $varXX = $data[$i]->ability;
//     $insert->execute();
//     $i++;
// }

header("Location: index.php");
