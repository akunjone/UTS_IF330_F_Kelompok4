<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if ($koneksi->connect_error) {
    die('Connect Error: ' . $koneksi->connect_error);
} else {
    echo 'Successful connection to MySQL<br />';
}

$EventID = isset($_GET['EventID']) ? intval($_GET['EventID']) : 0;
$userID = isset($_GET['userID']) ? intval($_GET['userID']) : 0; 

$checkQuery = "SELECT * FROM regist WHERE EventID = $EventID AND userID = $userID";
$checkResult = $koneksi->query($checkQuery);

if ($checkResult->num_rows > 0) {
    $query = "DELETE FROM regist WHERE EventID = $EventID AND userID = $userID";

    if ($koneksi->query($query) === TRUE) { 
        header("Location: viewregistered.php");
        exit();
    } else {
        echo "Error deleting record: " . $koneksi->error . " (EventID: $EventID, userID: $userID)";
    }
} else {
    echo "No record found to delete.";
}

$koneksi->close();
?>
