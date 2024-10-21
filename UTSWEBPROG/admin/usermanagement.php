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
                <li><a class="NavbarMenuAdmin" href="/"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenuAdmin" href="../admin/eventmanagement.php"><i class="fa-solid fa-info"></i>Event Management</a></li>
                <li><a class="NavbarMenuAdmin" href="../admin/viewregistrant.php"><i class="fa-solid fa-tree"></i>View Registrant</a></li>
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
        
        if (!$koneksi) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $query = "
            SELECT e.EventID, e.NamaEvent, e.Tanggal, e.Waktu, e.Lokasi, e.Deskripsi, e.Kapasitas, 
            GROUP_CONCAT(r.Username) AS Username
            FROM events e
            LEFT JOIN regist r ON e.EventID = r.EventID
            GROUP BY e.EventID";

        require_once __DIR__ . '/../vendor/autoload.php';
        use PhpOffice\PhpSpreadsheet\Spreadsheet;
        use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
        use PhpOffice\PhpSpreadsheet\IOFactory;

        $spreadsheet = new Spreadsheet();

        if (file_exists('registrants.xlsx')) {
            $spreadsheet = IOFactory::load('registrants.xlsx');
        }
        
        $sheet = $spreadsheet->getActiveSheet();

        if (!file_exists('registrants.xlsx')) {
            $sheet->setCellValue('A1', 'EventID');
            $sheet->setCellValue('B1', 'NamaEvent');
            $sheet->setCellValue('C1', 'Tanggal');
            $sheet->setCellValue('D1', 'Waktu');
            $sheet->setCellValue('E1', 'Lokasi');
            $sheet->setCellValue('F1', 'Deskripsi');
            $sheet->setCellValue('G1', 'Kapasitas');
            $sheet->setCellValue('H1', 'Username');
        }

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
                <td>{$display['Username']}</td>
            </tr>";

            $lastRow = $sheet->getHighestRow() + 1;
            $sheet->setCellValue('A' . $lastRow, $display['EventID']);
            $sheet->setCellValue('B' . $lastRow, $display['NamaEvent']);
            $sheet->setCellValue('C' . $lastRow, $display['Tanggal']);
            $sheet->setCellValue('D' . $lastRow, $display['Waktu']);
            $sheet->setCellValue('E' . $lastRow, $display['Lokasi']);
            $sheet->setCellValue('F' . $lastRow, $display['Deskripsi']);
            $sheet->setCellValue('G' . $lastRow, $display['Kapasitas']);
            $sheet->setCellValue('H' . $lastRow, $display['Username']);
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save('registrants.xlsx');
        
        mysqli_close($koneksi);
        ?>
    </table>
</body>
</html>
