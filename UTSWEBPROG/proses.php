<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

if (!empty($email) && !empty($password)) {
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$hashed_password', '$role')";

    if (mysqli_query($koneksi, $query)) {
        if ($role == 'us') {
            header("Location: user/userhome.php");
        } else {
            header("Location: admin/useradmin.php");
        }
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    echo "Silakan lengkapi semua field!";
}

mysqli_close($koneksi);
?>
