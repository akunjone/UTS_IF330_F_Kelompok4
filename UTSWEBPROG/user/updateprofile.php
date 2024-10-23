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
    <nav class="NavbarComponents">
        <h1 class="NavbarSymbol">Madevent</h1>
        <div>
            <a class="NavbarMenu" href="../user/userhome.php"><i class="fa-solid fa-house-chimney"></i>Home</a>
            <a class="NavbarMenu" href="../user/event.php"><i class="fa-solid fa-info"></i>View Events</a>
            <a class="NavbarMenu" href="../user/registevent.php"><i class="fa-solid fa-tree"></i>Event Registration</a>
            <a class="NavbarMenu" href="../user/viewregistered.php"><i class="fa-solid fa-tree"></i>Registered</a>
            <a class="NavbarMenu" href="../user/logout.php"><i class="fa-solid fa-tree"></i>Logout</a>
            <a class="NavbarMenu" href="../user/profilemanagement.php"><i class="fa-solid fa-tree"></i>Profile</a>
        </div>
    </nav>
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
