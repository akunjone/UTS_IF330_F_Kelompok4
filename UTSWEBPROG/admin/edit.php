<!doctype html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="styleadmin.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        body {
            background-color: #0d1b2a;
        }
        .navbar {
            background-color: #1b263b;
            padding: 15px 20px;
            color: #ffffff;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar h1 {
            font-size: 24px;
            margin: 0;
            color: #00d9ff;
        }
        .navbar ul {
            list-style: none;
            display: flex;
            gap: 20px;
        }
        .navbar a {
            color: #ffffff;
            text-decoration: none;
            font-size: 16px;
            padding: 10px;
        }
        .navbar a:hover {
            background-color: #45b6d6;
            border-radius: 5px;
        }
        .navbar .dropdown {
            position: relative;
            display: inline-block;
        }
        .navbar .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            background-color: #1b263b;
            min-width: 150px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }
        .navbar .dropdown:hover .dropdown-content {
            display: block;
        }
        .navbar .dropdown-content a {
            padding: 12px 16px;
            display: block;
        }
        .main-content {
            padding: 40px;
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
<header>
   <div class="navbar">
        <h1>Madevent Admin</h1>
        <ul>
            <li><a href="useradmin.php">Home</a></li>
            <li><a href="eventmanagement.php">Event Management</a></li>
            <li><a href="viewregistrant.php">View Registrant</a></li>
            <li><a href="usermanagement.php">User Management</a></li>
            <li><a href="viewevent.php">View All Events</a></li>
            <li class="dropdown">
                <a href="#">Account</a>
                <div class="dropdown-content">
                    <a href="profile.php">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </li>
        </ul>
    </div>
</header>
    <body>
        <div class="main-content">
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
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
