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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styleadmin.css">
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
        .profile-card {
            background-color: #1b263b;
            color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3);
            text-align: center;
            padding: 20px;
            width: 300px;
            margin: 0 auto;
            margin-top: 100px;
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
        }
        .profile-card .btn-update {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div class="navbar">
            <h1>Madevent Admin</h1>
            <ul>
                <li><a href="useradmin.php">Home</a></li>
                <li><a href="eventmanagement.php">Event Management</a></li>
                <li ><a href="viewregistrant.php">View Registrant</a></li>
                <li><a href="usermanagement.php">User  Management</a></li>
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
    <div class="main-content container">
        <div class="profile-card">
            <img src="https://img.myloview.com/posters/default-avatar-profile-flat-icon-social-media-user-vector-portrait-of-unknown-a-human-image-700-209987471.jpg" alt="Profile picture">
            <h2><?php echo htmlspecialchars($display['username']); ?></h2>
            <p>Email: <?php echo htmlspecialchars($display['email']); ?></p>
            <p>User ID: <?php echo htmlspecialchars($display['id']); ?></p>
            <a href='updateprofile.php?id=<?php echo htmlspecialchars($display['id']); ?>' class='btn btn-update'>Update Profile</a>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
