<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>
   <!-- custom css file link  -->
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
   <div class="sidebar">
      <a class="active" href="user.php">Home</a>
      <a href="#">Link 1</a>
      <a href="#">Link 2</a>
      <a href="#">Link 3</a>
   </div>   
   <div class="container">
      <div class="content">
         <h3>hi, <span>user</span></h3>
         <h1>welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
         <p>this is a user page</p>
         <?php
            $upcoming_events_query = "SELECT * FROM events WHERE status = 'open' AND date >= CURDATE()";
            $result = $conn->query($upcoming_events_query);
            
            while ($row = $result->fetch_assoc()) {
                echo "<div class='event'>";
                echo "<h3>" . $row['name'] . "</h3>";
                echo "<p>Date: " . $row['date'] . "</p>";
                echo "<p>Location: " . $row['location'] . "</p>";
                echo "<a href='register_event.php?id=" . $row['id'] . "'>Register</a>";
                echo "</div>";
            }
         ?>
         <a href="logout.php" class="btn">logout</a>
      </div>
   </div>
</body>
</html>
