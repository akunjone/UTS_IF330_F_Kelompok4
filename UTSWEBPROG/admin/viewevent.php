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
