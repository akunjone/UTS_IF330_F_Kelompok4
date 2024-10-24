<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="../user/styleuser.css">
    <title>Edit Event</title>
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
        <?php
        session_start();
        
        if (!isset($_SESSION['id'])) {
            echo "<p>You need to log in first.</p>";
            exit;
        }

        try {
            $koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');
            $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $current_user_id = $_SESSION['id'];

            if (isset($_GET['EventID']) && is_numeric($_GET['EventID'])) {
                $sql = $koneksi->prepare("SELECT * FROM events WHERE EventID = :eventID");
                $sql->execute(['eventID' => $_GET['EventID']]);
                $dataa = $sql->fetch(PDO::FETCH_ASSOC);
            } else {
                echo "<p>Invalid Event ID.</p>";
                exit;
            }

        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
        ?>

        <h1>Edit Event</h1>
        <div class="card">
            <form action="update.php" method="post">
                <label>Event ID</label>
                <input type="text" name="EventID" value="<?php echo htmlspecialchars($dataa['EventID']); ?>" readonly />
                <br />
                
                <label>User ID</label>
                <input type="text" name="UserID" value="<?php echo htmlspecialchars($current_user_id); ?>" readonly />
                <br/>

                <label>Username</label>
                <input type="text" name="Username" value="<?php echo isset($dataa['Username']) ? htmlspecialchars($dataa['Username']) : ''; ?>" required />
                <br />
                
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>
