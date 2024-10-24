<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="styleuser.css">
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
        .content {
            margin-top: 100px; 
            text-align: center;
        }
        .card {
            background-color: #1b263b;
            border: 1px solid #45b6d6; 
        }
        .card-header {
            background-color: #45b6d6; 
            color: #000000; 
        }
        .btn-primary {
            background-color: #00d9ff; 
            border: none; 
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
    <div class="content container">
        <?php
        $koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');

        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = $koneksi->prepare("SELECT * FROM users WHERE id = :id");
        $sql->execute(['id' => $_GET['id']]);
        $dataa = $sql->fetch(PDO::FETCH_ASSOC);
        ?>
        
        <div class="card mt-5">
            <div class="card-header text-center">
                <h1>Edit Profile</h1>
            </div>
            <div class="card-body">
                <form action="prosesupdate.php" method="post">
                    <div class="mb-3">
                        <label class="form-label">ID Profile</label>
                        <input type="text" name="id" value="<?php echo htmlspecialchars($dataa['id']); ?>" class="form-control" readonly />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required />
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" required />
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
