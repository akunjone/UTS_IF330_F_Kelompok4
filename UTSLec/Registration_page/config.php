<?php

$server = 'localhost';
$username = 'root'; 
$password = ''; 
$database = 'user_db'; 

$conn = new mysqli($server, $username, $password);

if ($conn->connect_error) {
    die("Koneksi ke MySQL gagal: " . $conn->connect_error);
}

$db_check_query = "SHOW DATABASES LIKE '$database'";
$db_check_result = $conn->query($db_check_query);

if ($db_check_result->num_rows == 0) {
    $create_db_query = "CREATE DATABASE $database";
    if ($conn->query($create_db_query) === TRUE) {
        echo "Database '$database' berhasil dibuat.<br>";
    } else {
        die("Error membuat database: " . $conn->error);
    }
}

$conn->select_db($database);

$table_check_query = "SHOW TABLES LIKE 'user_form'";
$table_check_result = $conn->query($table_check_query);

if ($table_check_result->num_rows == 0) {
    $create_table_query = "CREATE TABLE user_form (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        user_type ENUM('admin', 'user') NOT NULL DEFAULT 'user'
    )";

    if ($conn->query($create_table_query) === TRUE) {
        echo "Tabel 'user_form' berhasil dibuat.<br>";
    } else {
        die("Error membuat tabel: " . $conn->error);
    }
}

?>
