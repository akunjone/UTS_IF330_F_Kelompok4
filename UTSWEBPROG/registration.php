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

<form action="../UTSWEBPROG/proses.php" method="post">
    <label>Username</label>
    <input type="text" name="username" required />
    <br />
    <label>Email</label>
    <input type="email" name="email" required />
    <br />
    <label>Password</label>
    <input type="password" name="password" required />
    <br />
    <label>Role</label>
    <select name="role" required>
        <option value="ad">Admin</option>
        <option value="us">User</option>
    </select>
    <br/>
    <button type="submit">Submit</button>
</form>

</body>
</html>
