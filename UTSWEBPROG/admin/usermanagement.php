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
                
                if (!$koneksi) {
                    die("Connection failed: " . mysqli_connect_error());
                }

                $query = "
                    SELECT e.EventID, e.NamaEvent, e.Tanggal, e.Waktu, e.Lokasi, e.Deskripsi, e.Kapasitas, 
                    GROUP_CONCAT(r.Username) AS Username
                    FROM events e
                    LEFT JOIN regist r ON e.EventID = r.EventID
                    GROUP BY e.EventID";

                require_once '../vendor/autoload.php';
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
            </tbody>
        </table>
    </div>
    
</body>
</html>
