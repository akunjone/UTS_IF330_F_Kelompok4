<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$password = $_POST['password'];
$username = $_POST['username'];
$email = $_POST['email'];

if (!empty($email) && !empty($username)) {
    $email = mysqli_real_escape_string($koneksi, $email);
    $username = mysqli_real_escape_string($koneksi, $username);
    
    $query = "SELECT * FROM users WHERE Email = '$email' AND Username = '$username'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) > 0) {
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
    $mysql = "INSERT INTO users (password) VALUES ('$hashed_pass')";
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../UTSWEBPROG/login.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    } else {
        echo "Incorrect";
    }
} else {
    echo "Silakan lengkapi semua field!";
}

mysqli_close($koneksi);
?>
