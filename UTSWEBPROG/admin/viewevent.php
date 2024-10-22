<!DOCTYPE html>
<html>
    <head>
        <title>Madevent</title>
        <link rel="stylesheet" href="../admin/styleadmin.css">
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
    <body>
        <div class="content">
            <h1>Event</h1>

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
                        <th>Foto</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $koneksi = mysqli_connect("localhost", "root", "", "event");

                    if (!$koneksi) {
                        die("Koneksi gagal: " . mysqli_connect_error());
                    }

                    $data = mysqli_query($koneksi, "SELECT * FROM events");
                    while ($display = mysqli_fetch_array($data)) {
                        echo "
                        <tr>
                            <td>{$display['EventID']}</td>
                            <td>{$display['NamaEvent']}</td>
                            <td>{$display['Tanggal']}</td>
                            <td>{$display['Waktu']}</td>
                            <td>{$display['Lokasi']}</td>
                            <td>{$display['Deskripsi']}</td>
                            <td>{$display['Kapasitas']}</td>
                            <td><img src='{$display['Foto']}' alt='Foto Event' style='max-width:100px; max-height:100px;'/></td>
                            <td>
                                <a href='delete.php?EventID={$display['EventID']}' onclick='return confirm(\"Are you sure you want to delete event?\");'>Delete</a> | 
                                <a href='edit.php?EventID={$display['EventID']}'>Edit</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>