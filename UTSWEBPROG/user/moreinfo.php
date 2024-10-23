<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>More Info</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../user/styleuser.css">
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
            padding: 20px;
            width: 100%;
        }
        .card-deck {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .card {
            margin: 15px;
            background-color: #1b263b;
            color: #ffffff;
            border: 1px solid #45b6d6;
        }
        .card-body {
            padding: 20px;
        }
        .card-text {
            margin-bottom: 10px;
        }
    </style>
</head>
<header>
    <nav class="NavbarComponents">
        <h1 class="NavbarSymbol">Madevent</h1>
        <div>
            <a class="NavbarMenu" href="../user/userhome.php">Home</a>
            <a class="NavbarMenu" href="../user/event.php">View Events</a>
            <a class="NavbarMenu" href="../user/registevent.php">Event Registration</a>
            <a class="NavbarMenu" href="../user/viewregistered.php">Registered</a>
            <a class="NavbarMenu" href="../user/logout.php">Logout</a>
            <a class="NavbarMenu" href="../user/profilemanagement.php">Profile</a>
        </div>
    </nav>
</header>
<body>
    <div class="content">
        <h1>More Info</h1>

        <div class="card-deck">
            <?php
                $koneksi = mysqli_connect("localhost", "root", "", "event");
                $eventID = $_GET['EventID']; 

                $data = mysqli_query($koneksi, "SELECT * FROM events WHERE EventID='$eventID'");
                while ($display = mysqli_fetch_array($data)){
                    echo "
                    <div class='card' style='width: 18rem;'>
                        <div class='card-body'>
                            <h5 class='card-title'>{$display['NamaEvent']}</h5>
                            <p class='card-text'><strong>Date:</strong> {$display['Tanggal']}</p>
                            <p class='card-text'><strong>Time:</strong> {$display['Waktu']}</p>
                            <p class='card-text'><strong>Location:</strong> {$display['Lokasi']}</p>
                            <p class='card-text'><strong>Description:</strong> {$display['Deskripsi']}</p>
                            <p class='card-text'><strong>Capacity:</strong> {$display['Kapasitas']}</p>
                        </div>
                    </div>";
                }
            ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
