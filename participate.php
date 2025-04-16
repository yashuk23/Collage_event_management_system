<?php
session_start();
include 'classes/db1.php';

// ✅ Ensure user is logged in
if (!isset($_SESSION['usn'])) {
    echo "<script>alert('You must log in first!'); window.location.href='login_form.php';</script>";
    exit();
}

// ✅ Get logged-in USN
$logged_in_usn = $_SESSION['usn'];

// ✅ Get Event ID from URL
$event_id = isset($_GET['event_id']) ? $_GET['event_id'] : null;

// 🌟 Handle Form Submission
if (isset($_POST["participate"])) {
    $usn = $_POST["usn"];
    $event_id = $_POST["event_id"];

    // ✅ Check if the student is registered
    $check = $conn->prepare("SELECT * FROM participent WHERE usn = ?");
    $check->bind_param("s", $usn);
    $check->execute();
    $result = $check->get_result();

    if ($result->num_rows > 0) {
        // ✅ Check if already participating in this event
        $check_event = $conn->prepare("SELECT * FROM registered WHERE usn = ? AND event_id = ?");
        $check_event->bind_param("si", $usn, $event_id);
        $check_event->execute();
        $event_result = $check_event->get_result();

        if ($event_result->num_rows > 0) {
            echo "<script>alert('You are already participating in this event!'); window.location.href='RegisteredEvents.php';</script>";
        } else {
            // ✅ Register for the event
            $reg = $conn->prepare("INSERT INTO registered (usn, event_id) VALUES (?, ?)");
            $reg->bind_param("si", $usn, $event_id);
            $reg->execute();

            echo "<script>alert('You are successfully participating in the event!'); window.location.href='RegisteredEvents.php';</script>";
        }
    } else {
        echo "<script>alert('You are not registered. Please register first.'); window.location.href='register.php';</script>";
    }

    $check->close();
    $conn->close();
}
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Participate in Events</title>
    <?php require 'utils/styles.php'; ?>  <!-- Retain your CSS -->
    
    <style>
        /* 🌟 Container Styling */
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 40px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            background: #f9f9f9;
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
            margin-bottom: 30px;
        }

        label {
            font-weight: bold;
            color: #34495e;
        }

        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-success {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: #27ae60;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            border: none;
            border-radius: 5px;
            transition: 0.3s;
            cursor: pointer;
        }

        .btn-success:hover {
            background: #2ecc71;
            transform: scale(1.05);
        }

        .btn-back {
            display: inline-block;
            width: 100%;
            padding: 12px;
            background: #95a5a6;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            border: none;
            border-radius: 5px;
            transition: 0.3s;
            cursor: pointer;
            margin-top: 15px;
        }

        .btn-back:hover {
            background: #7f8c8d;
            transform: scale(1.05);
        }

        /* 🌟 Responsive Design */
        @media (max-width: 576px) {
            .container {
                padding: 20px;
            }

            h1 {
                font-size: 24px;
            }
        }
    </style>
</head>

<body>

<?php require 'utils/header.php'; ?>

<div class="content">
    <div class="container">
        <h1>Participate in Event</h1>

        <!-- ✅ Form with pre-filled USN and Event ID -->
        <form method="POST" action="participate.php">
            <label>Student USN:</label>
            <input type="text" name="usn" class="form-control" value="<?php echo $logged_in_usn; ?>" readonly><br>

            <label>Event ID:</label>
            <input type="text" name="event_id" class="form-control" value="<?php echo $event_id; ?>" readonly><br>

            <button type="submit" name="participate" class="btn-success">Participate</button>

            <!-- Back button -->
            <a href="index.php" class="btn-back">Back to Events</a>
        </form>
    </div>
</div>

<?php require 'utils/footer.php'; ?>

</body>
</html>
