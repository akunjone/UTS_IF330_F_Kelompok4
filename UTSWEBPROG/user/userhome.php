<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../UTSWEBPROG/style.css">
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
    </style>
</head>
<body>
    <header>
        <nav class="NavbarComponents">
            <h1 class="NavbarSymbol">Madevent</h1>
            <div>
                <a class="NavbarMenu" href="../user/userhome.php"><i class="fa-solid fa-house-chimney"></i>Home</a>
                <a class="NavbarMenu" href="../user/event.php"><i class="fa-solid fa-info"></i>View Events</a>
                <a class="NavbarMenu" href="../user/registevent.php"><i class="fa-solid fa-tree"></i>Event Registration</a>
                <a class="NavbarMenu" href="../user/viewregistered.php"><i class="fa-solid fa-tree"></i>Registered</a>
                <a class="NavbarMenu" href="../user/logout.php"><i class="fa-solid fa-tree"></i>Logout</a>
                <a class="NavbarMenu" href="../user/profilemanagement.php"><i class="fa-solid fa-tree"></i>Profile</a>
            </div>
        </nav>
    </header>
    <div class="content">
        <h1>Welcome to Madevent!</h1>
        <p>SLEEP -> OPTIONAL</p>
        <p>EAT -> OPTIONAL</p>
        <p>PLAY -> NEEDED</p>
        <p>DIE -> MAYBE</p>
    </div>
</body>
</html>
