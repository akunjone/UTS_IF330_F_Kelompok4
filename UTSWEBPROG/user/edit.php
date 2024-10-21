<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../user/styleuser.css">
    <title>Edit Event</title>
</head>
<header>
        <nav class="NavbarComponentsUser">
            <h1 class="NavbarSymbolUser">Madevent</h1>
            <ul>
                <li><a class="NavbarMenuUser" href="/"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenuUser" href="../user/event.php"><i class="fa-solid fa-info"></i>View Events</a></li>
                <li><a class="NavbarMenuUser" href="../user/registevent.php"><i class="fa-solid fa-tree"></i>Event Registration</a></li>
                <li><a class="NavbarMenuUser" href="../user/viewregistered.php"><i class="fa-solid fa-tree"></i>Registered</a></li>
            </ul>
        </nav>
    </header>
<body>
<?php
$koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = $koneksi->prepare("SELECT * FROM events WHERE EventID = :eventID");
$sql->execute(['eventID' => $_GET['EventID']]);
$dataa = $sql->fetch(PDO::FETCH_ASSOC);
?>
<h1>Edit Event</h1>

<form action="update.php" method="post">
    <label>Event ID</label>
    <input type="text" name="EventID" value="<?php echo $dataa['EventID']; ?>" readonly />
    <br />
    <label>Username</label>
    <input type="text" name="Username" required />
    <br />
    <button type="submit">Regist</button>
</form>
</body>
</html>
