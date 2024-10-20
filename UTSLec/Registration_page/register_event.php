<?php
@include 'config.php';
session_start();

if (!isset($_SESSION['user_name'])) {
    header('location:login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$event_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$stmt = $conn->prepare("SELECT * FROM events WHERE id = ? AND status = 'open' AND date >= CURDATE()");
$stmt->bind_param("i", $event_id);
$stmt->execute();
$event_result = $stmt->get_result();

if ($event_result->num_rows == 0) {
    echo "This event is not available.";
    exit();
}

$check_registration_stmt = $conn->prepare("SELECT * FROM registrations WHERE user_id = ? AND event_id = ?");
$check_registration_stmt->bind_param("ii", $user_id, $event_id);
$check_registration_stmt->execute();
$registration_result = $check_registration_stmt->get_result();

if ($registration_result->num_rows > 0) {
    echo "You are already registered for this event.";
    exit();
}

$register_stmt = $conn->prepare("INSERT INTO registrations (user_id, event_id) VALUES (?, ?)");
$register_stmt->bind_param("ii", $user_id, $event_id);

if ($register_stmt->execute()) {
    echo "Registration successful!";
} else {
    echo "Failed to register for the event.";
}

$stmt->close();
$check_registration_stmt->close();
$register_stmt->close();
$conn->close();
?>