<!doctype html>
<html>
<head>
    <title>Edit Event</title>
</head>
<body>
<?php
$koneksi = new PDO('mysql:host=localhost;dbname=event', 'root', '');

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$sql = $koneksi->prepare("SELECT * FROM users WHERE id = :id");
$sql->execute(['id' => $_GET['id']]);
$dataa = $sql->fetch(PDO::FETCH_ASSOC);

?>
<h1>Edit Profile</h1>

<form action="prosesupdate.php" method="post">
    <label>ID Profile</label>
    <input type="text" name="id" value="<?php echo $dataa['id']; ?>" readonly />
    <br />
    <label>Username</label>
    <input type="text" name="username" required />
    <br />
    <label>Email</label>
    <input type="email" name="email" required />
    <br />
    <label>Password</label>
    <input type="password" name="password" required />
    <br />
    <button type="submit">Update</button>
</form>
</body>
</html>
