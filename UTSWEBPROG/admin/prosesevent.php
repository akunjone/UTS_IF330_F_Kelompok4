<?php
$koneksi = mysqli_connect("localhost", "root", "", "event");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$NamaEvent = $_POST['NamaEvent'];
$Tanggal = $_POST['Tanggal'];
$Waktu = $_POST['Waktu'];
$Lokasi = $_POST['Lokasi'];
$Deskripsi = $_POST['Deskripsi'];
$Kapasitas = $_POST['Kapasitas'];

$target_dir = "../uploads/";
$Foto = $_FILES["Foto"];
$target_file = $target_dir . basename($Foto["name"]);

$query = "INSERT INTO events (NamaEvent, Tanggal, Waktu, Lokasi, Deskripsi, Kapasitas) VALUES ('$NamaEvent', '$Tanggal', '$Waktu', '$Lokasi', '$Deskripsi', '$Kapasitas')";

if ($Foto['error'] === 0) {
    if (move_uploaded_file($Foto["tmp_name"], $target_file)) {
        $query = "INSERT INTO events (NamaEvent, Tanggal, Waktu, Lokasi, Deskripsi, Kapasitas, Foto) VALUES ('$NamaEvent', '$Tanggal', '$Waktu', '$Lokasi', '$Deskripsi', '$Kapasitas', '$target_file')";
        
        if (mysqli_query($koneksi, $query)) {
            header("Location: ../admin/viewevent.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($koneksi);
        }
    } else {
        echo "Maaf, ada kesalahan saat meng-upload file.";
        exit();
    }
} else {
    if (mysqli_query($koneksi, $query)) {
        header("Location: ../admin/viewevent.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>
