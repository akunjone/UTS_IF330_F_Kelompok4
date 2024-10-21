<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../user/styleuser.css">
    <title>Registered Event</title>
</head>
<header>
        <nav class="NavbarComponentsUser">
            <h1 class="NavbarSymbolUser">Madevent</h1>
            <ul>
                <li><a class="NavbarMenuUser" href="../user/userhome.php"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenuUser" href="../user/event.php"><i class="fa-solid fa-info"></i>View Events</a></li>
                <li><a class="NavbarMenuUser" href="../user/registevent.php"><i class="fa-solid fa-tree"></i>Event Registration</a></li>
                <li><a class="NavbarMenuUser" href="../user/viewregistered.php"><i class="fa-solid fa-tree"></i>Registered</a></li>
                <li><a class="NavbarMenuUser" href="../user/logout.php"><i class="fa-solid fa-tree"></i>Logout</a></li>
                <li><a class="NavbarMenuUser" href="../user/profilemanagement.php"><i class="fa-solid fa-tree"></i>Profile</a></li>
            </ul>
        </nav>
    </header>
<body>

<h1>Event</h1>


<table border="1">
    <tr>
        <th>Event ID</th>
        <th>Username</th>
        <th>Tindakan</th>
    </tr>

    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "event");
    $data = mysqli_query($koneksi, "SELECT * FROM regist");
    while ($display = mysqli_fetch_array($data)){
        echo "
        <tr>
            <td>{$display['EventID']}</td>
            <td>{$display['Username']}</td>
            <td>
                <a href='cancel.php?EventID={$display['EventID']}'>Cancel</a>
            </td>
        </tr>";
    }
    ?>
</table>
