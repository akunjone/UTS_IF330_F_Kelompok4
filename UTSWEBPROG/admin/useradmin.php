<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Madevent</title>
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
        h2 {
            margin-top: 40px;
            color: #333333;
        }
        .table-style {
            width: 100%;
            margin-top: 30px;
            border-collapse: collapse;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }
        .table-style thead {
            background-color: #1b263b;
            color: #ffffff;
        }
        .table-style th, .table-style td {
            padding: 12px 15px;
            text-align: left;
        }
        .table-style tbody tr {
            border-bottom: 1px solid #dddddd;
        }
        .table-style tbody tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>


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

  
    <div class="main-content">
        <h1>Welcome, Admin</h1>

        <h2>Recent Events</h2>
        <table class="table-style">
            <thead>
                <tr>
                    <th>Event ID</th>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Kapasitas</th>
                    <th>Pendaftar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "event");
                
                $query = "
                    SELECT e.EventID, e.NamaEvent, e.Tanggal, e.Waktu, e.Lokasi, e.Deskripsi, e.Kapasitas, 
                        COUNT(r.EventId) AS jumlah_pendaftar
                    FROM events e
                    LEFT JOIN regist r ON e.EventID = r.EventId
                    GROUP BY e.EventID";
                
                $data = mysqli_query($koneksi, $query);
                
                while ($display = mysqli_fetch_array($data)){
                    echo "
                    <tr>
                        <td>{$display['EventID']}</td>
                        <td>{$display['NamaEvent']}</td>
                        <td>{$display['Tanggal']}</td>
                        <td>{$display['Waktu']}</td>
                        <td>{$display['Lokasi']}</td>
                        <td>{$display['Deskripsi']}</td>
                        <td>{$display['Kapasitas']}</td>
                        <td>{$display['jumlah_pendaftar']}</td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
