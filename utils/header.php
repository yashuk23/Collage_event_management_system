<?php
// ✅ Start session only if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AVCOE 2k25</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- External stylesheet -->
    <style>
        /* 🌟 Navbar Styling */
        .navbar-container {
            width: 100%;
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 60px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* 🌟 Logo Styling */
        .navbar-logo a {
            font-size: 28px;
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .navbar-logo a:hover {
            color: #ffeb3b;
        }

        /* 🌟 Menu Styling */
        .navbar-menu {
            list-style: none;
            display: flex;
            gap: 25px;
            margin: 0;
            padding: 0;
        }

        .navbar-menu li {
            position: relative;
        }

        .navbar-menu a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.3s;
        }

        .navbar-menu a:hover {
            color: #ffeb3b;
        }

        /* 🌟 User Dropdown */
        .user-dropdown {
            position: relative;
            z-index: 1000; /* Ensure dropdown appears above other content */
        }

        .user-name {
            cursor: pointer;
            color: #fff;
            transition: 0.3s;
            padding: 10px 15px;
        }

        .user-name:hover {
            color: #ffeb3b;
        }

        /* 🌟 Dropdown Menu Styling */
        .dropdown-content {
            display: none;
            position: absolute;
            background: #333;
            color: #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
            min-width: 180px;
            border-radius: 8px;
            z-index: 1000;
            top: 40px;
            right: 0;
            transition: opacity 0.3s ease, visibility 0.3s;
        }

        .dropdown-content.active {
            display: block;
            opacity: 1;
            visibility: visible;
        }

        .dropdown-content li {
            list-style: none;
            padding: 12px 20px;
            transition: background 0.3s, color 0.3s;
            white-space: nowrap; /* Prevent wrapping */
        }

        .dropdown-content li a {
            color: #fff;
            text-decoration: none;
        }

        .dropdown-content li:hover {
            background: #2196F3;
            color: #fff;
        }

        /* 🌟 Login Button Styling */
        .btn-login {
            background: #ff5722;
            color: #fff;
            padding: 8px 20px;
            border-radius: 5px;
            transition: 0.3s;
            text-decoration: none;
        }

        .btn-login:hover {
            background: #f44336;
        }

        /* 🌟 Mobile Menu Button */
        .menu-toggle {
            display: none;
            font-size: 24px;
            color: #fff;
            cursor: pointer;
        }

        /* 🌟 Responsive Design */
        @media (max-width: 768px) {
            .navbar {
                padding: 15px 30px;
            }

            .navbar-menu {
                display: none;
                flex-direction: column;
                gap: 15px;
                position: absolute;
                top: 60px;
                left: 0;
                right: 0;
                background: #333;
                z-index: 1;
                text-align: center;
                padding: 20px 0;
            }

            .navbar-menu.active {
                display: flex;
            }

            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>

<body>

<header class="navbar-container">
    <nav class="navbar">
        <div class="navbar-logo">
            <a href="index.php">AVCOE 2k25</a>
        </div>

        <ul class="navbar-menu">
            <li><a href="index.php">Home</a></li>

            <!-- ✅ Hide Register when logged in -->
            <?php if (!isset($_SESSION['usn'])): ?>
                <li><a href="register.php">Register</a></li>
            <?php endif; ?>

            <li><a href="contact.php">Contact Us</a></li>
            <li><a href="aboutus.php">About Us</a></li>

            <!-- ✅ User Profile with Logout Option -->
            <?php if (isset($_SESSION['usn'])): ?>
                <li class="user-dropdown">
                    <a href="#" class="user-name" onclick="toggleDropdown(event)">Welcome, <?php echo htmlspecialchars($_SESSION['name']); ?> ⬇️</a>
                    <ul class="dropdown-content">
                        <li><a href="RegisteredEvents.php">My Events</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>
                </li>
            <?php else: ?>
                <li><a href="login_form.php" class="btn-login">Login</a></li>
            <?php endif; ?>
        </ul>

        <!-- Mobile Menu Button -->
        <div class="menu-toggle" onclick="toggleMenu()">☰</div>
    </nav>
</header>

<!-- ✅ JavaScript for Dropdown -->
<script>
    // Toggle dropdown visibility on click
    function toggleDropdown(event) {
        event.stopPropagation();
        const dropdown = event.target.closest('.user-dropdown').querySelector('.dropdown-content');
        dropdown.classList.toggle('active');
    }

    // Close the dropdown when clicking outside
    document.addEventListener('click', (event) => {
        const dropdowns = document.querySelectorAll('.dropdown-content');
        dropdowns.forEach((dropdown) => {
            if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
                dropdown.classList.remove('active');
            }
        });
    });

    // Mobile Menu Toggle
    function toggleMenu() {
        const navbarMenu = document.querySelector('.navbar-menu');
        navbarMenu.classList.toggle('active');
    }
</script>

</body>
</html>
