<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$EventID = $_POST['EventID'];
$id = $_POST['UserID'];
$Username = $_POST['Username'];

$query = "INSERT INTO regist (EventID, UserID, Username) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($stmt, 'sss', $EventID, $id, $Username);

if (mysqli_stmt_execute($stmt)) {
    header("Location: ../user/viewregistered.php");
    exit();
} else {
    echo "Error: " . mysqli_error($koneksi);
}

mysqli_stmt_close($stmt);
mysqli_close($koneksi);
?>
