<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../admin/styleadmin.css">
    <title>Madevent</title>
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

    <table border="1">
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
</table>
</body>
</html>
