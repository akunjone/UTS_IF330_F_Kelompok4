<?php

define('HOSTNAME', 'localhost');
define('MYSQLUSER', 'root');
define('MYSQLPASS', '');
define('MYSQLDB', 'event');

if ($koneksi = new PDO('mysql:host=' . HOSTNAME . ';dbname=' . MYSQLDB, MYSQLUSER, MYSQLPASS)) {

    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE users
              SET username = :username, 
                  email = :email, 
                  password = :hashed_pass
              WHERE id = :id";

    $statement = $koneksi->prepare($query);

    $statement->bindParam(':username', $username);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':hashed_pass', $hashed_pass);
    $statement->bindParam(':id', $id);

    if ($statement->execute()) {
        if ($statement->rowCount() > 0) {
            header("Location: ../user/profilemanagement.php");
            exit();
        } else {
            echo "No rows updated<br />";
        }
    }
} else {
    echo "Connection failed.";
}

$koneksi = null;
?>
