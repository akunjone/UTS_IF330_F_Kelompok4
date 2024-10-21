<?php

define('HOSTNAME', 'localhost');
define('MYSQLUSER', 'root');
define('MYSQLPASS', '');
define('MYSQLDB', 'event');

if ($koneksi = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . MYSQLDB, MYSQLUSER, MYSQLPASS)) {

    $EventID = $_POST['EventID'];
    $NamaEvent = $_POST['NamaEvent'];
    $Tanggal = $_POST['Tanggal'];
    $Waktu = $_POST['Waktu'];
    $Lokasi = $_POST['Lokasi'];
    $Deskripsi = $_POST['Deskripsi'];
    $Kapasitas = $_POST['Kapasitas'];

    $query = "UPDATE events 
              SET NamaEvent = :NamaEvent, 
                  Tanggal = :Tanggal, 
                  Waktu = :Waktu, 
                  Lokasi = :Lokasi, 
                  Deskripsi = :Deskripsi, 
                  Kapasitas = :Kapasitas 
              WHERE EventID = :EventID";

    $statement = $koneksi->prepare($query);

    $statement->bindParam(':NamaEvent', $NamaEvent);
    $statement->bindParam(':Tanggal', $Tanggal);
    $statement->bindParam(':Waktu', $Waktu);
    $statement->bindParam(':Lokasi', $Lokasi);
    $statement->bindParam(':Deskripsi', $Deskripsi);
    $statement->bindParam(':Kapasitas', $Kapasitas);
    $statement->bindParam(':EventID', $EventID);

    if ($statement->execute()) {
        if ($statement->rowCount() > 0) {
            header("Location: ../admin/viewregistrant.php");
            exit();
        } else {
            header("Location: ../admin/viewevent.php");
        }
    }
} else {
    echo "Connection failed.";
}

$koneksi = null;
?>
