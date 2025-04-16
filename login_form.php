<?php
session_start();
require 'classes/db1.php';  // DB connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usn = $_POST['usn'];
    $password = $_POST['password'];

    // Check if the USN exists in the database
    $query = "SELECT * FROM participent WHERE usn = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // ✅ Compare plain text password directly (without hashing)
        if ($password === $row['password']) {

            // Store student details in session
            $_SESSION['usn'] = $row['usn'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['branch'] = $row['branch'];
            $_SESSION['sem'] = $row['sem'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['phone'] = $row['phone'];
            $_SESSION['college'] = $row['college'];

            // Redirect to Registered Events
            header('Location: index.php');
            exit();
        } else {
            echo "<script>alert('Invalid password.'); window.location.href='login_form.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid USN.'); window.location.href='login_form.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Login</title>
    <?php require 'utils/styles.php'; ?>
</head>
<body>
<?php require 'utils/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Student Login</h1>

        <form method="POST" action="">
            <label>USN:</label>
            <input type="text" name="usn" class="form-control" required>
            
            <label>Password:</label>
            <input type="password" name="password" class="form-control" required>

            <br>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</div>

<?php require 'utils/footer.php'; ?>
</body>
</html>
