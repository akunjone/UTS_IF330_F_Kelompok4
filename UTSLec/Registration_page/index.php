<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Booking Calendar</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f6fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            max-width: 500px;
            width: 100%;
        }
        h1 {
            font-size: 2.5em;
            color: #4A90E2;
            margin-bottom: 10px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
            color: #666;
        }
        .btn {
            display: inline-block;
            padding: 10px 30px;
            margin: 10px;
            font-size: 1.1em;
            border: none;
            border-radius: 5px;
            color: white;
            background-color: #4A90E2;
            text-decoration: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #357ABD;
        }
        .calendar-icon {
            font-size: 50px;
            margin-bottom: 20px;
            color: #4A90E2;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="calendar-icon">📅</div>
        <h1>Event Booking Calendar</h1>
        <p>Plan and book your upcoming events easily!</p>
        <a href="login.php" class="btn">Login</a>
        <a href="register.php" class="btn">Register</a>
    </div>
</body>
</html>
