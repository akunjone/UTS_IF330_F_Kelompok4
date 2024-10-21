<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$EventID = $_POST['EventID'];
$Username = $_POST['Username'];

$query = "INSERT INTO regist (EventID, Username) VALUES ('$EventID', '$Username')";

if (mysqli_query($koneksi, $query)) {
    header("Location: ../user/registevent.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_close($koneksi);
?>
