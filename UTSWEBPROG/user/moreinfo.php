<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../user/styleuser.css">
    <title>MoreInfo</title>
</head>
    <header>
        <nav class="NavbarComponentsUser">
            <h1 class="NavbarSymbolUser">Madevent</h1>
            <ul>
                <li><a class="NavbarMenuUser" href="../user/userhome.php"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenuUser" href="../user/event.php"><i class="fa-solid fa-info"></i>View Events</a></li>
                <li><a class="NavbarMenuUser" href="../user/registevent.php"><i class="fa-solid fa-tree"></i>Event Registration</a></li>
                <li><a class="NavbarMenuUser" href="../user/viewregistered.php"><i class="fa-solid fa-tree"></i>Registered</a></li>
            </ul>
        </nav>
    </header>
<body>
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
    </tr>

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "event");
    $data = mysqli_query($koneksi, "SELECT * FROM events");
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
        </tr>";
    }
    ?>
</table>
</body>
</html>
