<!doctype html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="../admin/styleadmin.css">
    <style>
        body {
            display: flex;
            flex-direction: column; 
            justify-content: flex-start; 
            align-items: center;
            margin: 0;
            background-color: #0d1b2a;
            font-family: Arial, sans-serif;
            color: #ffffff;
        }
        .NavbarComponents {
            width: 100%;
            background-color: #1b263b;
            padding: 10px 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            position: fixed; 
            top: 0;
            left: 0;
            z-index: 1000; 
        }
        .NavbarSymbol {
            display: inline-block;
            font-size: 24px;
            color: #00d9ff;
        }
        .NavbarMenu {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            display: inline-block;
        }
        .NavbarMenu:hover {
            text-decoration: underline;
        }
        .content {
            margin-top: 150px;
            text-align: center;
        }
        .card {
            background-color: #1b263b;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            margin: 0 auto;
        }
        .card h1 {
            color: #00d9ff;
        }
        .card label {
            display: block;
            margin: 10px 0 5px;
        }
        .card input, .card textarea, .card button {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .card button {
            background-color: #00d9ff;
            color: #ffffff;
            border: none;
            cursor: pointer;
        }
        .card button:hover {
            background-color: #007ea7;
        }
        .image-preview {
            margin-top: 10px;
            display: none;
        }
        .image-preview img {
            max-width: 100%;
            border-radius: 5px;
        }
    </style>
</head>
    <nav class="NavbarComponents">
        <h1 class="NavbarSymbol">Madevent</h1>
        <ul>
            <li><a class="NavbarMenu" href="../admin/useradmin.php">Home</a></li>
            <li><a class="NavbarMenu" href="../admin/eventmanagement.php">Event Management</a></li>
            <li><a class="NavbarMenu" href="../admin/viewregistrant.php">View Registrant</a></li>
            <li><a class="NavbarMenu" href="../admin/usermanagement.php">User Management</a></li>
            <li><a class="NavbarMenu" href="../admin/viewevent.php">View All Event</a></li>
            <li><a class="NavbarMenu" href="../admin/logout.php">Logout</a></li>     
        </ul>
    </nav>
    <body>
        <div class="content">
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
        <div class="card">
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
    </div>
    </div>
</body>
</html>
