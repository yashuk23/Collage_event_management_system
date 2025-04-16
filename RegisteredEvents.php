<?php
session_start();
require_once 'utils/header.php';
require_once 'utils/styles.php';
require_once 'classes/db1.php';

// ✅ Automatically use logged-in user's USN
if (isset($_SESSION['usn'])) {
    $usn = $_SESSION['usn'];

    // Fetch Registered Events
    $query = "
        SELECT e.event_id, e.event_title, st.st_name, s.name AS staff_name, ef.Date, ef.time, ef.location
        FROM registered r
        JOIN events e ON r.event_id = e.event_id
        JOIN student_coordinator st ON e.event_id = st.event_id
        JOIN staff_coordinator s ON e.event_id = s.event_id
        JOIN event_info ef ON e.event_id = ef.event_id
        WHERE r.usn = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $usn);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    echo "<script>alert('Please login first.'); window.location.href='login_form.php';</script>";
    exit();
}
?>

<div class="content">
    <div class="container">
        <h1>Registered Events</h1>

        <?php if ($result->num_rows > 0): ?>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Event Name</th>
                        <th>Student Coordinator</th>
                        <th>Staff Coordinator</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Location</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row['event_title'] ?></td>
                            <td><?= $row['st_name'] ?></td>
                            <td><?= $row['staff_name'] ?></td>
                            <td><?= $row['Date'] ?></td>
                            <td><?= $row['time'] ?></td>
                            <td><?= $row['location'] ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No registered events found.</p>
        <?php endif; ?>
    </div>
</div>

<?php include 'utils/footer.php'; ?>
