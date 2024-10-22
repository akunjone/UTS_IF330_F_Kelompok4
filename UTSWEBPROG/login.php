<!doctype html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="../UTSWEBPROG/style.css">
    <style>
        body {
            display: flex;
            flex-direction: column; 
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #0d1b2a;
            font-family: Arial, sans-serif;
            color: #ffffff;
            overflow: hidden;
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
        .container {
            position: relative;
            width: 300px;
            height: 300px;
            margin-top: 60px; 
        }
        .login-container, .password-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: #1b263b;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: 1px solid #00d9ff;
            text-align: center;
            transition: transform 0.5s ease-in-out, opacity 0.5s ease-in-out;
        }
        .password-container {
            transform: translateX(100%);
            opacity: 0;
        }
        .login-container h1, .password-container h1 {
            margin: 0;
            font-size: 24px;
        }
        .login-container p, .password-container p {
            margin: 10px 0 20px;
            font-size: 14px;
            color: #a9a9a9;
        }
        .input-container {
            position: relative;
            margin: 10px 0;
        }
        .input-container input {
            width: 100%;
            padding: 10px;
            border: 1px solid #00d9ff;
            border-radius: 5px;
            background-color: #0d1b2a;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }
        .input-container label {
            position: absolute;
            top: 50%;
            left: 10px;
            transform: translateY(-50%);
            color: #a9a9a9;
            pointer-events: none;
            transition: all 0.3s ease-in-out;
        }
        .input-container input:focus + label,
        .input-container input:not(:placeholder-shown) + label,
        .input-container input:valid + label {
            top: -10px;
            left: 10px;
            font-size: 12px;
            color: #00d9ff;
        }
        .login-container a, .password-container a {
            color: #00d9ff;
            text-decoration: none;
            font-size: 14px;
        }
        .login-container a:hover, .password-container a:hover {
            text-decoration: underline;
        }
        .login-container .btn, .password-container .btn {
            background-color: #00d9ff;
            color: #0d1b2a;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20 px;
        }
        .login-container .btn:hover, .password-container .btn:hover {
            background-color: #00b3cc;
        }
        . login-container .password-container .forgot-password {
            display: block;
            text -align: left;
            margin: 10px 0;
        }
        .login-container .bottom-links, .password-container .bottom-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <header>
        <nav class="NavbarComponents">
            <h1 class="NavbarSymbol">Madevent</h1>
            <ul>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/home.php"><i class ="fa-solid fa-house-chimney"></i>Home</a></li>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/registration.php"><i class="fa-solid fa-tree"></i>SignUp</a></li>
                <li><a class="NavbarMenu" href="../UTSWEBPROG/login.php"><i class="fa-solid fa-tree"></i>Login</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="login-container" id="login-container">
            <h1>Login</h1>
            <p>Please login to use the platform</p>
            <form action="proseslogin.php" method="post">
                <div class="input-container">
                    <input type="text" id="email" name="email" placeholder=" " required>
                    <label for="email">Enter your email</label>
                </div>
                <div class="bottom-links">
                    <a href="registration.php">Create account</a>
                    <button class="btn" type="button" id="nextButton" onclick="showPasswordPage()">Next</button>
                </div>
            </form>
        </div>
        <div class="password-container" id="password-container">
            <h1>Password</h1>
            <p>Please enter your password</p>
            <form action="proseslogin.php" method="post">
                <input type="hidden" name="email" value="" id="email-value">
                <div class="input-container">
                    <input type="password" id="password" name="password" placeholder=" " required>
                    <label for="password">Enter your password</label>
                </div>
                <a href="lupapass.php" class="forgot-password">Forgot password?</a>
                <div class="bottom-links">
                    <a href="#" onclick="showLoginPage()">Back</a>
                    <button class="btn" type="submit">Login</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showPasswordPage() {
            document.getElementById('login-container').style.transform = 'translateX(-100%)';
            document.getElementById('login-container').style.opacity = '0';
            document.getElementById('password-container').style.transform = 'translateX(0)';
            document.getElementById('password-container').style.opacity = '1';
            var emailValue = document.getElementById('email').value;
            document.getElementById('email-value').value = emailValue;
        }
        function showLoginPage() {
            document.getElementById('login-container').style.transform = 'translateX(0)';
            document.getElementById('login-container').style.opacity = '1';
            document.getElementById('password-container').style.transform = 'translateX(100%)';
            document.getElementById('password-container').style.opacity = '0';
        }
    </script>
</body>
</html>
