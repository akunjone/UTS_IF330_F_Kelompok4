<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if ($koneksi->connect_error) {
    die('Connect Error: ' . $koneksi->connect_error);
} else {
    echo 'Successful connection to MySQL<br />';
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$query = "DELETE FROM users WHERE id = $id";

if ($koneksi->query($query) === TRUE) { 
    header("Location: viewevent.php");
        exit();
    } else {
        echo "Error deleting record: " . $koneksi->error;
    }

    $koneksi->close();
?>
