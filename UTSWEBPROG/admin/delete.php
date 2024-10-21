<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if ($koneksi->connect_error) {
    die('Connect Error: ' . $koneksi->connect_error);
} else {
    echo 'Successful connection to MySQL<br />';
}

$EventID = isset($_GET['EventID']) ? intval($_GET['EventID']) : 0;
$query = "DELETE FROM events WHERE EventID = $EventID";

if ($koneksi->query($query) === TRUE) { 
    header("Location: viewevent.php");
        exit();
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
?>
