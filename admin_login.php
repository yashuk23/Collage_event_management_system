<?php
// ✅ Start session only if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// ✅ Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_username = $_POST['username'];
    $admin_password = $_POST['password'];

    // ✅ Admin Credentials (Hardcoded)
    $valid_username = "admin";
    $valid_password = "admin";

    // ✅ Check for valid credentials
    if ($admin_username === $valid_username && $admin_password === $valid_password) {
        $_SESSION['admin_logged_in'] = true;

        // ✅ Redirect to Admin Dashboard
        header("Location: adminPage.php");
        exit();
    } else {
        // ✅ Invalid credentials error message
        $error = "Invalid credentials. Try again!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login - Sanchalana 2k20</title>
    <link rel="stylesheet" href="utils/styles.css"> <!-- External Stylesheet -->
    
    <style>
        /* 🌟 Fullscreen Background */
        body, html {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
        }

        /* 🌟 Login Container */
        .login-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.5);
            width: 400px;
            max-width: 90%;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .login-container h2 {
            margin-bottom: 20px;
            font-size: 32px;
        }

        /* 🌟 Input Fields */
        .login-container input {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            transition: all 0.3s ease-in-out;
        }

        .login-container input:focus {
            outline: none;
            box-shadow: 0 0 8px #2196F3;
        }

        /* 🌟 Login Button */
        .login-container button {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 12px 30px;
            font-size: 18px;
            cursor: pointer;
            border-radius: 8px;
            transition: 0.3s;
            width: 100%;
        }

        .login-container button:hover {
            background: #45a049;
        }

        /* 🌟 Error Message */
        .error {
            color: #ff4d4d;
            font-size: 14px;
            margin: 10px 0;
        }

        /* 🌟 Animation */
        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 🌟 Responsive Design */
        @media (max-width: 576px) {
            .login-container {
                padding: 30px;
                width: 90%;
            }

            .login-container h2 {
                font-size: 24px;
            }

            .login-container button {
                font-size: 16px;
                padding: 10px 25px;
            }
        }
    </style>
</head>
<body>

<!-- 🔥 Admin Login Form -->
<div class="login-container">
    <h2>Admin Login</h2>

    <!-- ✅ Display Error Message -->
    <?php if (isset($error)) : ?>
        <p class="error"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST" action="admin_login.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>

</body>
</html>
