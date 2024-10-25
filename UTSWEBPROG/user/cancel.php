<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if ($koneksi->connect_error) {
    die('Connect Error: ' . $koneksi->connect_error);
} else {
    echo 'Successful connection to MySQL<br />';
}

$EventID = isset($_GET['EventID']) ? intval($_GET['EventID']) : 0;
$userID = isset($_GET['userID']) ? intval($_GET['userID']) : 0; 

$checkQuery = "SELECT * FROM regist WHERE EventID = ? AND userID = ?";
$checkStmt = $koneksi->prepare($checkQuery);
$checkStmt->bind_param("ii", $EventID, $userID);
$checkStmt->execute();
$checkResult = $checkStmt->get_result();

if ($checkResult->num_rows > 0) {
    $deleteQuery = "DELETE FROM regist WHERE userID = ? AND EventID = ?";
    $deleteStmt = $koneksi->prepare($deleteQuery);
    $deleteStmt->bind_param("ii", $userID, $EventID);

    if ($deleteStmt->execute()) {
        $historyQuery = "INSERT INTO registration_history (userID, EventID, action) VALUES (?, ?, 'cancelled')";
        $historyStmt = $koneksi->prepare($historyQuery);
        $historyStmt->bind_param("ii", $userID, $EventID);

        if ($historyStmt->execute()) {
            header("Location: viewregistered.php");
            exit();
        } else {
            echo "Error inserting into registration_history: " . $koneksi->error;
        }

        $historyStmt->close();
    } else {
        echo "Error deleting from regist: " . $koneksi->error;
    }

    $deleteStmt->close();
} else {
    echo "No record found to delete.";
}

$checkStmt->close();

$koneksi->close();
?>
