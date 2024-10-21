<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../user/registevent.php");
    exit();
}

$koneksi = mysqli_connect("localhost", "root", "", "event");
$id = $_SESSION['id'];
$data = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$display = mysqli_fetch_array($data);
?>

<table border="1">
    <tr>
        <th>Email</th>
        <th>User ID</th>
        <th>Username</th>
        <th>Update</th>
    </tr>
    <tr>
        <td><?php echo htmlspecialchars($display['email']); ?></td>
        <td><?php echo htmlspecialchars($display['id']); ?></td>
        <td><?php echo htmlspecialchars($display['username']); ?></td>
        <td>
            <a href='updateprofile.php?id=<?php echo htmlspecialchars($display['id']); ?>'>Update</a>
        </td>
    </tr>
</table>
