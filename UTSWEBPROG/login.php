<!doctype html>
<html>
<head>
<link rel="stylesheet" href="../UTSWEBPROG/style.css">
    <title>Form Registrasi</title>
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
<h1>Registration</h1>


<form action="../UTSWEBPROG/proseslogin.php" method="post">
    <label>Email</label>
    <input type="text" name="email" required />
    <br />
    <label>Password</label>
    <input type="password" name="password" required />
    <br/>
    <p><a href="lupapass.php">Lupa Password</a></p>
    <button type="submit">Submit</button>
</form>

</body>
</html>
