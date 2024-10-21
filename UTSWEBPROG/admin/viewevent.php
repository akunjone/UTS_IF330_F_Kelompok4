<!DOCTYPE html>
<html>
    <head>
        <title>Madevent</title>
        <link rel="stylesheet" href="../admin/styleadmin.css">
    </head>
    <body>
        <header>
            <nav class="NavbarComponentsAdmin">
                <h1 class="NavbarSymbolAdmin">Madevent</h1>
                <ul>
                    <li><a class="NavbarMenuAdmin" href="../admin/useradmin.php"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                    <li><a class="NavbarMenuAdmin" href="../admin/eventmanagement.php"><i class="fa-solid fa-info"></i>Event Management</a></li>
                    <li><a class="NavbarMenuAdmin" href="../admin/viewregistrant.php"><i class="fa-solid fa-tree"></i>View Registrant</a></li>
                    <li><a class="NavbarMenuAdmin" href="../admin/usermanagement.php"><i class="fa-solid fa-tree"></i>User Management</a></li>
                    <li><a class="NavbarMenuAdmin" href="../admin/viewevent.php"><i class="fa-solid fa-tree"></i>View All Event</a></li>
                    <li><a class="NavbarMenuAdmin" href="../admin/logout.php"><i class="fa-solid fa-tree"></i>Logout</a></li>
                </ul>
            </nav>
        </header>
        <h1>Event</h1>

        <table border="1">
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
                        <a href='delete.php?EventID={$display['EventID']}'>Delete</a> | 
                        <a href='edit.php?EventID={$display['EventID']}'>Edit</a>
                    </td>
                </tr>";
            }
            ?>
        </table>
    </body>

</html>