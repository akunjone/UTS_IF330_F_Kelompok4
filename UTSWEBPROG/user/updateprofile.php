<!doctype html>
<html>
<head>
    <title>Edit Event</title>
    <link rel="stylesheet" href="styleuser.css">
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
    <div class="content">
        <?php
        $koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');

        if (!$koneksi) {
            die("Koneksi gagal: " . mysqli_connect_error());
        }

        $sql = $koneksi->prepare("SELECT * FROM users WHERE id = :id");
        $sql->execute(['id' => $_GET['id']]);
        $dataa = $sql->fetch(PDO::FETCH_ASSOC);

        ?>
        <h1>Edit Profile</h1>

        <form action="prosesupdate.php" method="post">
            <label>ID Profile</label>
            <input type="text" name="id" value="<?php echo $dataa['id']; ?>" readonly />
            <br />
            <label>Username</label>
            <input type="text" name="username" required />
            <br />
            <label>Email</label>
            <input type="email" name="email" required />
            <br />
            <label>Password</label>
            <input type="password" name="password" required />
            <br />
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>
