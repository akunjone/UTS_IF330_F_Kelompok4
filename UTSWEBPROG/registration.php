<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="../UTSWEBPROG/style.css">
    <title>Registration</title>
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
            margin-top: 100px; 
            text-align: center; 
        }
        .container {
            width: 400px;
            padding: 40px;
            background-color: #1b263b;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border: 1px solid #00d9ff;
            text-align: center;
        }
        .input-container {
            position: relative;
            margin: 10px 0;
        }
        .input-container input, .input-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #00d9ff;
            border-radius: 5px;
            background-color: #0d1b2a;
            color: #ffffff;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
            margin: 10px 0;
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
        .btn {
            background-color: #00d9ff;
            color: #0d1b2a;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 20px;
        }
        .btn:hover {
            background-color: #00b3cc;
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
        <div class="container">
            <h1>Registration</h1>
            <h3>Hello There, Welcome to the Event Registration</h3>
            <h4>Please fill in the form below and choose roles</h4>

            <form action="../UTSWEBPROG/proses.php" method="post">
                <div class="input-container ">
                    <input type="text" name="username" placeholder=" " required />
                    <label for="username">Username</label>
                </div>
                <div class="input-container">
                    <input type="email" name="email" placeholder=" " required />
                    <label for="email">Email</label>
                </div>
                <div class="input-container">
                    <input type="password" name="password" placeholder=" " required />
                    <label for="password">Password</label>
                </div>
                <div class="input-container">
                    <select name="role" required>
                        <option value="">Choose a role</option>
                        <option value="ad">Admin</option>
                        <option value="us">User </option>
                    </select>
                </div>
                <button type="submit" class="btn">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
