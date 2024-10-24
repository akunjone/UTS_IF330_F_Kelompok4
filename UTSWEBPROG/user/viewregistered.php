<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../user/styleuser.css">
    <title>Registered Events</title>
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
        .table-style{
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .table-style thead tr {
            background-color: #45b6d6;
            color: #ffffff;
            text-align: left;
        }
        .table-style th,
        .table-style td{
            padding: 12px 15px;
        }
        .table-style tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .table-style tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
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
    <div class="content">
        <h1>Registered Events</h1>
        <table class="table-style">
            <thead>
                <tr>
                    <th>Event</th>
                    <th>Username</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Tindakan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_GET['error']) && $_GET['error'] === 'duplicate') {
                    echo "<p style='color: red;'>You are already registered for this event.</p>";
                }
                
                session_start();
                if (!isset($_SESSION['id'])) {
                    echo "<tr><td colspan='6'>You must log in to view your registered events.</td></tr>";
                    exit;
                }

                $current_user_id = $_SESSION['id'];

                $koneksi = mysqli_connect("localhost", "root", "", "event");

                if (!$koneksi) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $data = mysqli_query($koneksi, "
                    SELECT regist.EventID, regist.Username, events.NamaEvent, events.Tanggal, events.Waktu, events.Lokasi 
                    FROM regist 
                    JOIN events ON regist.EventID = events.EventID 
                    WHERE regist.userID = '$current_user_id'
                ");

                while ($display = mysqli_fetch_array($data)) {
                    echo "
                    <tr>
                        <td>{$display['NamaEvent']}</td>
                        <td>{$display['Username']}</td>
                        <td>{$display['Tanggal']}</td>
                        <td>{$display['Waktu']}</td>
                        <td>{$display['Lokasi']}</td>
                        <td>
                            <a href='cancel.php?EventID={$display['EventID']}&userID={$current_user_id}' onclick='return confirm(\"Are you sure you want to cancel this event?\");'>Cancel</a>
                        </td>
                    </tr>";
                }

                mysqli_close($koneksi);
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
