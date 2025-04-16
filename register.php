<?php
// Start session
session_start();
?>

<!DOCTYPE HTML>
<html>
<head>
    <meta charset="UTF-8">
    <title>Student Registration</title>
    <?php require 'utils/styles.php'; ?> <!-- Include CSS styles -->
</head>
<body>
<?php require 'utils/header.php'; ?> <!-- Include header -->

<div class="content">
    <div class="container">
        <h1>Student Registration</h1>
        <form method="POST" action="register.php">
            <label>Student USN:</label>
            <input type="text" name="usn" class="form-control" required><br>

            <label>Name:</label>
            <input type="text" name="name" class="form-control" required><br>

            <label>Branch:</label>
            <input type="text" name="branch" class="form-control" required><br>

            <label>Semester:</label>
            <input type="text" name="sem" class="form-control" required><br>

            <label>Email:</label>
            <input type="email" name="email" class="form-control" required><br>

            <label>Phone:</label>
            <input type="text" name="phone" class="form-control" required><br>

            <label>College:</label>
            <input type="text" name="college" class="form-control" required><br>

            <label>Password:</label>
            <input type="password" name="password" class="form-control" required><br>

            <button type="submit" name="register" class="btn btn-primary">Register</button>
        </form>
    </div>
</div>

<?php require 'utils/footer.php'; ?> <!-- Include footer -->
</body>
</html>

<?php
// Handle form submission
if (isset($_POST["register"])) {
    include 'classes/db1.php';  // Include database connection

    // Retrieve form data
    $usn = trim($_POST["usn"]);
    $name = trim($_POST["name"]);
    $branch = trim($_POST["branch"]);
    $sem = trim($_POST["sem"]);
    $email = trim($_POST["email"]);
    $phone = trim($_POST["phone"]);
    $college = trim($_POST["college"]);
    $password = trim($_POST["password"]);

    // Hash the password for security

    // Check if student is already registered
    $check = $conn->prepare("SELECT * FROM participent WHERE usn = ?");
    $check->bind_param("s", $usn);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // If already registered
        echo "<script>alert('You are already registered. Please login.'); window.location.href='login.php';</script>";
    } else {
        // Insert new student into the database
        $insert = $conn->prepare("
            INSERT INTO participent (usn, name, branch, sem, email, phone, college, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        $insert->bind_param("ssssssss", $usn, $name, $branch, $sem, $email, $phone, $college, $password);

        if ($insert->execute()) {
            // Store session for login after registration
            $_SESSION['usn'] = $usn;
            $_SESSION['name'] = $name;
            $_SESSION['branch'] = $branch;
            $_SESSION['sem'] = $sem;
            $_SESSION['email'] = $email;
            $_SESSION['phone'] = $phone;
            $_SESSION['college'] = $college;

            echo "<script>alert('Registration successful! You can now participate in events.'); window.location.href='participate.php';</script>";
        } else {
            echo "<script>alert('Error during registration. Please try again.'); window.location.href='register.php';</script>";
        }
    }

    // Close connections
    $check->close();
    $insert->close();
    $conn->close();
}
?>
