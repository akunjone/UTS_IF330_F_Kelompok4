<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Madevent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-3yD7K3q8ha7SMvj1Z4IMDf3fp4NlCO08+H7U0uM0t5G5xOn5L9vP25uX0yzUOqlZ" crossorigin="anonymous">
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
        .table-style {
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
        .table-style td {
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

        <table class="table table-hover table-striped table-style">
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
                    $img_path = "../uploads/" . $display['Foto']; 

                    if (file_exists($img_path)) {
                        $img_tag = "<img src='$img_path' class='img-fluid rounded' alt='Foto Event' style='max-width:100px;'/>";
                    } else {
                        $img_tag = "No Image";
                    }

                    echo "
                    <tr>
                        <td>{$display['EventID']}</td>
                        <td>{$display['NamaEvent']}</td>
                        <td>{$display['Tanggal']}</td>
                        <td>{$display['Waktu']}</td>
                        <td>{$display['Lokasi']}</td>
                        <td>{$display['Deskripsi']}</td>
                        <td>{$display['Kapasitas']}</td>
                        <td>$img_tag</td>
                        <td>
                            <a href='delete.php?EventID={$display['EventID']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Are you sure you want to delete this event?\");'>Delete</a> 
                            <a href='edit.php?EventID={$display['EventID']}' class='btn btn-primary btn-sm'>Edit</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-3yD7K3q8ha7SMvj1Z4IMDf3fp4NlCO08+H7U0uM0t5G5xOn5L9vP25uX0yzUOqlZ" crossorigin="anonymous"></script>
</body>
</html>
