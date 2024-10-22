<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../admin/styleadmin.css">
    <title>Madevent</title>
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
    <header>
        <nav class="NavbarComponents">
            <h1 class="NavbarSymbol">Madevent</h1>
            <ul>
                <li><a class="NavbarMenu" href="../admin/useradmin.php">Home</a></li>
                <li><a class="NavbarMenu" href="../admin/eventmanagement.php">Event Management</a></li>
                <li><a class="NavbarMenu" href="../admin/viewregistrant.php">View Registrant</a></li>
                <li><a class="NavbarMenu" href="../admin/usermanagement.php">User Management</a></li>
                <li><a class="NavbarMenu" href="../admin/viewevent.php">View All Event</a></li>
                <li><a class="NavbarMenu" href="../admin/logout.php">Logout</a></li>     
            </ul>
        </nav>
    </header>
<body>
    <div class="content">
        
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
