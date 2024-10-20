<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admin page</title>
   <link rel="stylesheet" href="css/style.css">
   <style>
      .sidebar {
         margin: 0;
         padding: 0;
         width: 10%;
         background-color: #FCCCB6;
         position: fixed;
         height: 100%;
         overflow: auto;
         border-top-right-radius:20px;
         border-bottom-right-radius:20px;
      }

      .sidebar a {
         display: block;
         color: black;
         padding: 16px;
         text-decoration: none;
      }

      .sidebar a.active {
         background-color: #F04E03;
         color: white;
      }

      .sidebar a:hover:not(.active) {
         background-color: #555;
         color: white;
      }

      div.container {
            margin-left: 10%;
            padding: 1px 16px;
         }

      @media screen and (max-width: 700px) {
         .sidebar {
            width: 100%;
            height: auto;
            position: relative;
         }
         .sidebar a {float: left;}
         div.content {margin-left: 0;}
      }

      @media screen and (max-width: 400px) {
         .sidebar a {
            text-align: center;
            float: none;
         }
      }
   </style>
</head>
<body>
   <!-- buat sidebar -->
   <div class="sidebar">
      <a class="active" href="#user.php">Home</a>
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
   </div>
   <div class="container">
      <div class="content">
         <h3>hi, <span>admin</span></h3>
         <h1>welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
         <p>this is an admin page</p>
         <?php
            $events_query = "SELECT * FROM events";
            $result = $conn->query($events_query);

            //diunjuk dalam bentuk tabel
            while ($row = $result->fetch_assoc()) {
               echo "<tr>";
               echo "<td>" . $row['name'] . "</td>";
               echo "<td>" . $row['date'] . " " . $row['time'] . "</td>";
               echo "<td>" . $row['location'] . "</td>";
               echo "<td>" . $row['status'] . "</td>";
               echo "<td><a href='edit_event.php?id=" . $row['id'] . "'>Edit</a> | <a href='delete_event.php?id=" . $row['id'] . "'>Delete</a></td>";
               echo "</tr>";
            }
         ?>
         <a href="logout.php" class="btn">logout</a>
      </div>
   </div>
</body>
</html>
