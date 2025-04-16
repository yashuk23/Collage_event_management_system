<?php
// ✅ Start session only if it is not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <!-- CSS links from utils folder -->

    <style>
        /* 🌟 Sticky Navbar Styling */
        .navbar {
            background: linear-gradient(135deg, #4CAF50, #2196F3);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            z-index: 999;
            position: sticky;
            top: 0;
            width: 100%;
            transition: all 0.3s ease-in-out;
            padding: 15px 0;  /* Reduced padding for compact look */
        }

        .navbar .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 30px;
        }

        /* 🌟 Navbar Title Styling */
        .navbar-header .navbar-brand {
            font-size: 24px;  /* Smaller but clear font size */
            font-weight: bold;
            color: #fff;
            text-decoration: none;
            transition: 0.3s;
        }

        .navbar-header .navbar-brand:hover {
            color: #ffeb3b;
        }

        /* 🌟 Navigation Menu */
        .nav {
            list-style: none;
            display: flex;
            gap: 20px;  /* Reduced gap for a more compact look */
            margin: 0;
            padding: 0;
        }

        .nav li {
            position: relative;
        }

        .nav a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;  /* Smaller, clean font size */
            font-weight: 500;
            transition: color 0.3s, background 0.3s;
            padding: 8px 14px;  /* Reduced padding for a neater look */
            border-radius: 5px;
            white-space: nowrap;  /* Keeps everything in a single line */
        }

        /* 🌟 Black Hover Effect */
        .nav a:hover {
            color: #fff;  
            background: #000;  
        }

        /* 🌟 Logout Button */
        .btnlogout a {
            background: #ff5722;
            color: #fff;
            padding: 10px 20px;  /* Compact padding for logout button */
            border-radius: 8px;
            transition: 0.3s;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;  /* Smaller, consistent font */
        }

        .btnlogout a:hover {
            background: #f44336; 
            color: #fff;
        }

        /* 🌟 Responsive Design */
        @media (max-width: 992px) {
            .navbar .container {
                flex-direction: column;
                text-align: center;
            }

            .nav {
                flex-direction: column;
                align-items: center;
                gap: 15px;
            }

            .btnlogout a {
                padding: 8px 18px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .navbar {
                padding: 10px;
            }

            .navbar-header .navbar-brand {
                font-size: 20px;
            }

            .nav a {
                font-size: 14px;
                padding: 6px 12px;
            }

            .btnlogout a {
                padding: 6px 14px;
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

<!-- 🔥 Sticky Navbar -->
<header>
    <nav class="navbar">
        <div class="container">

            <!-- 🔥 Website Title -->
            <div class="navbar-header">
                <a href="adminPage.php" class="navbar-brand">AVCOE 2k25</a>
            </div>

            <!-- 🔥 Navigation Menu -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="adminPage.php"><strong>Home</strong></a></li>
                <li><a href="Stu_details.php"><strong>Student Details</strong></a></li>
                <li><a href="Stu_cordinator.php"><strong>Student Co-ordinator</strong></a></li>
                <li><a href="Staff_cordinator.php"><strong>Staff-Co-ordinator</strong></a></li>

                <!-- 🔥 Logout Button -->
                <li class="btnlogout">
                    <a href="./admin_login.php">Logout <span class="glyphicon glyphicon-log-out"></span></a>
                </li>
            </ul>

        </div><!-- container -->
    </nav>
</header>

</body>
</html>
