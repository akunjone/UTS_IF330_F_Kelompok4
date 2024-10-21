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
            position: absolute; 
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
            <ul>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/home.php"><i class="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/registration.php"><i class="fa-solid fa-tree"></i>SignUp</a></li>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/login.php"><i class="fa-solid fa-tree"></i>Login</a></li>
            </ul>
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
