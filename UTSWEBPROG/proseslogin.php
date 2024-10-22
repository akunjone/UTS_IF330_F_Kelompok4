<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");
session_start();

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$email =  $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
    $query = "SELECT * FROM users WHERE email = '$email'";
    $keranjang = mysqli_query($koneksi, $query);
    $check = mysqli_num_rows($keranjang);

    if ($check > 0) {
        $role = mysqli_fetch_assoc($keranjang);
        $verify = password_verify($password, $role['password']);
        if ($verify == 1) {
            $_SESSION["username"] = $role["username"];
            $_SESSION["id"] = $role["id"];
            $_SESSION['email'] = $role['email'];
            $_SESSION['role'] = $role['role'];

            if ($role['role'] == 'us') {
                header("Location: user/userhome.php");
            } else {
                header("Location: admin/useradmin.php");
            }
            exit();
        } else {
            header("Location: login.php");
            alert("Password salah, coba lagi!");
        }
    } else {
        header("Location: registration.php");
        alert("Akun tidak ditemukan, apakah Anda mau registrasi?");
    }
} else {
    header("Location:login.php");
    alert("Silakan isi semua field!");
}

mysqli_close($koneksi);
?>
