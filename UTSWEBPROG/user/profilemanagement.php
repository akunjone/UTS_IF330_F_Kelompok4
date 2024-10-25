<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../user/userhome.php");
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "event");
$id = $_SESSION['id'];

$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$display = mysqli_fetch_array($data);

$historyQuery = "
    SELECT e.NamaEvent, e.Tanggal, e.Lokasi, rh.action, rh.Timestamp 
    FROM registration_history rh
    JOIN events e ON rh.EventID = e.EventID
    WHERE rh.userID = '$id'
    ORDER BY rh.Timestamp DESC
";
$historyResult = mysqli_query($koneksi, $historyQuery);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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
            margin-top: 100px;
            padding: 20px;
            width: 100%;
        }
        .card {
            margin: 15px;
            background-color: #1b263b;
            color: #ffffff;
            border: 1px solid #45b6d6;
            border-radius: 10px;
        }
        .card-body {
            padding: 20px;
        }
        .card-title {
            color: #00d9ff; 
        }
        .card-text {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
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

    <div class="content container">
        <h1 class="text-center mt-5">User Profile</h1>
        <div class="row justify-content-center mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?php echo htmlspecialchars($display['username']); ?></h5>
                        <p class="card-text">Email: <?php echo htmlspecialchars($display['email']); ?></p>
                        <p class="card-text">User ID: <?php echo htmlspecialchars($display['id']); ?></p>
                        <a href='updateprofile.php?id=<?php echo htmlspecialchars($display['id']); ?>' class='btn btn-warning'>Update</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-history container mt-5">
            <h3 class="text-center">Event Registration History</h3>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <?php
                    if (mysqli_num_rows($historyResult) > 0) {
                        while ($event = mysqli_fetch_array($historyResult)) {
                            $status = ($event['action'] == 'registered') ? 'Registered' : 'Cancelled';
                            echo "
                            <div class='card event-card'>
                                <div class='card-body'>
                                    <h5 class='event-card-title'>{$event['NamaEvent']}</h5>
                                    <p class='card-text'>Date: {$event['Tanggal']}</p>
                                    <p class='card-text'>Location: {$event['Lokasi']}</p>
                                    <p class='card-text'>Status: {$status}</p>
                                    <p class='card-text'>Timestamp: {$event['Timestamp']}</p>
                                </div>
                            </div>";
                        }
                    } else {
                        echo "<p class='text-center'>You have no event history yet.</p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
