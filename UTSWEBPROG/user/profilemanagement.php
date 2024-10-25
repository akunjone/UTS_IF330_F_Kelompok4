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
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #0d1b2a;
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
        .profile-card {
            background-color: #1b263b; 
            color: #ffffff; 
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 20px;
        }
        .profile-card img {
            border-radius: 50%;
            width: 100px; 
            height: 100px;
        }
        .profile-card h2 {
            font-size: 20px;
            margin: 10px 0;
            font-weight: 700;
        }
        .profile-card p {
            font-size: 14px;
            margin: 5px 0;
            color: #ffffff; 
        }
        .profile-card .btn {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            background-color: #007bff; 
            color: white; 
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

<div class=" content container">
    <h1 class="text-center mt-5">User Profile</h1>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6">
            <div class="profile-card">
                <img src="https://img.myloview.com/posters/default-avatar-profile-flat-icon-social-media-user-vector-portrait-of-unknown-a-human-image-700-209987471.jpg" alt="Profile picture">
                <h2><?php echo htmlspecialchars($display['username']); ?></h2>
                <p>Email: <?php echo htmlspecialchars($display['email']); ?></p>
                <p>User ID: <?php echo htmlspecialchars($display['id']); ?></p>
                <a href='updateprofile.php?id=<?php echo htmlspecialchars($display['id']); ?>' class='btn'>Update Profile</a>
            </div>
        </div>
    </div>
    <!-- Event registration history -->
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

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
