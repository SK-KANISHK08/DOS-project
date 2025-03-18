<?php
include("connector.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $username = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Encrypt password

        $sql = "INSERT INTO userinfo (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ss", $username, $password);
            if ($stmt->execute()) {
                header("Location: page3.html");
                exit();
            } else {
                echo "Error inserting data: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Shopping - Login</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background: white;
        }
        .container {
            display: flex;
            align-items: center;
            gap: 0px;
        }
        img {
            width: 400px;
            height: 400px;
            object-fit: cover;
        }
        .login-container {
            width: 400px;
            height:400px;
            background: linear-gradient(to right, lightgreen, #ffc3a0);
            padding: 40px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 0px;
        }
        .login-container h1 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #282323;
        }
        .login-container h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #282323;
            text-align: left;
        }
        .input-box input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .remember-forget {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .remember-forget label {
            font-size: 14px;
            color: #555;
        }
        .btn, .cancel {
            width: 48%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 5px;
        }
        .btn {
            background: #ff6b81;
            color: #fff;
        }
        .btn:hover {
            background: #ff3b57;
        }
        .cancel {
            background: #ff6b81;
            color: #fff;
        }
        .cancel:hover {
            background: #ff3b57;
        }
        .register-link p {
            font-size: 14px;
            color: #555;
        }
        .register-link a {
            color: #ff6b81;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="image2.png" alt="Shopping Image">

        <div class="login-container">
            <h1>🛍️ DEPARTMENT ONLINE SHOPPING</h1>
            <form action="login.php" method="POST">
                <h2>Email:</h2>
                <div class="input-box">
                    <input type="text" placeholder="Email ID or Phone Number" name="email" required>
                </div>
                <h2>Password:</h2>
                <div class="input-box">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="remember-forget">
                    <label><input type="checkbox"> Remember me</label>
                </div>
                <div style="display: flex; justify-content: space-between;">
                    <button type="submit" class="btn" name="submit">Submit</button>
                    <button type="button" class="cancel">Cancel</button>
                </div>
            </form>
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
