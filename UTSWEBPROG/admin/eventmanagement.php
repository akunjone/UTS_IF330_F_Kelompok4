<!doctype html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>
<h1>Registration</h1>

<form action="../admin/prosesevent.php" method="post">
    <label>Nama Event</label>
    <input type="text" name="NamaEvent" required />
    <br />
    <label>Tanggal</label>
    <input type="date" name="Tanggal" required />
    <br />
    <label>Waktu</label>
    <input type="time" name="Waktu" required />
    <br />
    <label>Lokasi</label>
    <input type="text" name="Lokasi" required />
    <br />
    <label>Deskripsi</label>
    <textarea name="Deskripsi"></textarea>
    <br />
    <label>Kapasitas</label>
    <input type="number" name="Kapasitas" required />
    <br />
    <label>Foto</label>
    <input type="file" name="Foto"><br>
    <button href="../admin/viewevent.php" type="submit">Make Event</button>
</form>

</body>
</html>