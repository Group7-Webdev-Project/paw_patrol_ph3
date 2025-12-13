<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
        <header class="login-header" id="login-header">
            <h2>Paw Patrol</h2>
            <span>Your ultimate partner in pet initiatives</span>
        </header>

        <div class="login-container" id="login-div">
            <h2>Admin Login</h2>
            <form action="login.php" method="POST">
                <div class="child-login">
                    <label>Username</label>
                    <input type="text" name="username" required>
                </div>
                <div class="child-login">
                    <label>Password</label>
                    <input type="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
</body>
</html>

<?php
    session_start();

    if($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];        

        if($username === 'admin' && $password === 'admin1234') {
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $username;
            header("Location: admin.php?success=1");
            exit();
        }
        else {
            header("Location: login.php?error=invalid_credentials");
            exit();
        }
    }
 
?>