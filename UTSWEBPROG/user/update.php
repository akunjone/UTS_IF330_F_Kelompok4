<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}

$EventID = $_POST['EventID'];
$id = $_POST['UserID'];
$Username = $_POST['Username'];

$query1 = "INSERT INTO regist (EventID, userID, Username) VALUES (?, ?, ?)";

$stmt1 = mysqli_prepare($koneksi, $query1);
mysqli_stmt_bind_param($stmt1, 'iis', $EventID, $id, $Username);

if (mysqli_stmt_execute($stmt1)) {
    $query2 = "INSERT INTO registration_history (userID, EventID, action) VALUES (?, ?, 'registered')";
    $stmt2 = mysqli_prepare($koneksi, $query2);
    mysqli_stmt_bind_param($stmt2, 'ii', $id, $EventID);
    
    if (mysqli_stmt_execute($stmt2)) {
        header("Location: ../user/viewregistered.php");
        exit();
    } else {
        echo "Error inserting into history: " . mysqli_error($koneksi);
    }

    mysqli_stmt_close($stmt2);
} else {
    echo "Error inserting into regist: " . mysqli_error($koneksi);
}

mysqli_stmt_close($stmt1);

mysqli_close($koneksi);
?>
