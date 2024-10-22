<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../user/styleuser.css">
    <title>Event Registration</title>
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
        <h1>Event Registration</h1>

        <table class="table-style">
            <thead>
                <tr>
                    <th>Nama Event</th>
                    <th>Tanggal</th>
                    <th>Waktu</th>
                    <th>Lokasi</th>
                    <th>Deskripsi</th>
                    <th>Kapasitas</th>
                    <th>Registration</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $koneksi = mysqli_connect("localhost", "root", "", "event");
                $data = mysqli_query($koneksi, "SELECT * FROM events");
                while ($display = mysqli_fetch_array($data)){
                    echo "
                    <tr>
                        <td>{$display['NamaEvent']}</td>
                        <td>{$display['Tanggal']}</td>
                        <td>{$display['Waktu']}</td>
                        <td>{$display['Lokasi']}</td>
                        <td>{$display['Deskripsi']}</td>
                        <td>{$display['Kapasitas']}</td>
                        <td>
                            <a href='edit.php?EventID={$display['EventID']}'>Regist</a>
                        </td>
                    </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
