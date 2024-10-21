<!doctype html>
<html>
<head>
    <title>Edit Event</title>
</head>
<body>
<?php
$koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = $koneksi->prepare("SELECT * FROM events WHERE EventID = :eventID");
$sql->execute(['eventID' => $_GET['EventID']]);
$dataa = $sql->fetch(PDO::FETCH_ASSOC);
?>
<h1>Edit Event</h1>

<form action="update.php" method="post">
    <input type="hidden" name="EventID" value="<?php echo $dataa['EventID']; ?>" />
    <label>Nama Event</label>
    <input type="text" value="<?php echo htmlspecialchars($dataa['NamaEvent']); ?>" name="NamaEvent" required />
    <br />
    <label>Tanggal</label>
    <input type="date" value="<?php echo $dataa['Tanggal']; ?>" name="Tanggal" required />
    <br />
    <label>Waktu</label>
    <input type="time" value="<?php echo $dataa['Waktu']; ?>" name="Waktu" required />
    <br />
    <label>Lokasi</label>
    <input type="text" value="<?php echo htmlspecialchars($dataa['Lokasi']); ?>" name="Lokasi" required />
    <br />
    <label>Deskripsi</label>
    <textarea name="Deskripsi" required><?php echo htmlspecialchars($dataa['Deskripsi']); ?></textarea>
    <br />
    <label>Kapasitas</label>
    <input type="number" value="<?php echo $dataa['Kapasitas']; ?>" name="Kapasitas" required />
    <br />
    <label>Foto</label>
    <input type="file" value="<?php echo $dataa['Foto']; ?>" name="Foto" />
    <br />
    <button type="submit">Update</button>
</form>
</body>
</html>
