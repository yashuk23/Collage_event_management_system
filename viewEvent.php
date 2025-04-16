<?php
require 'classes/db1.php';
$id = $_GET['id'];

// Fetch events with all necessary details
$result = mysqli_query($conn, "
    SELECT events.event_id, events.event_title, events.event_price, events.participents, events.img_link, 
           ef.Date, ef.time, ef.location, 
           s.st_name AS student_coordinator, s.phone AS student_phone, 
           st.name AS staff_coordinator, st.phone AS staff_phone
    FROM events
    JOIN event_info ef ON ef.event_id = events.event_id
    JOIN student_coordinator s ON s.event_id = events.event_id
    JOIN staff_coordinator st ON st.event_id = events.event_id
    WHERE events.type_id = $id
");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sanchanala 2k20 - Events</title>
    <?php require 'utils/styles.php'; ?> <!-- Use existing CSS -->
    
    <style>
        /* 🌟 Container Styling */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 30px;
        }

        h1, h3 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 30px;
        }

        /* 🌟 Event Card Styling */
        .event-card {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 30px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
            background: #f9f9f9;
        }

        .event-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .event-card img {
            max-width: 350px;
            height: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            transition: 0.3s;
        }

        .event-card img:hover {
            transform: scale(1.05);
        }

        .event-details {
            flex: 1;
            padding: 0 30px;
        }

        .event-details p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .event-details strong {
            color: #2980b9;
        }

        /* 🌟 Button Styling */
        .btn {
            display: inline-block;
            padding: 12px 30px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background: #3498db;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn:hover {
            background: #2980b9;
            transform: scale(1.05);
        }

        .btn-back {
            display: inline-block;
            padding: 12px 30px;
            font-size: 18px;
            color: #fff;
            background: #95a5a6;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
        }

        .btn-back:hover {
            background: #7f8c8d;
            transform: scale(1.05);
        }

        /* 🌟 Responsive Design */
        @media (max-width: 992px) {
            .event-card {
                flex-direction: column;
                text-align: center;
            }

            .event-card img {
                max-width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>

<?php require 'utils/header.php'; ?> <!-- Existing header -->

<div class="content">
    <div class="container">
        <h1>Event Details</h1>

        <?php
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="event-card">
                    <img src="<?php echo $row['img_link']; ?>" alt="<?php echo $row['event_title']; ?>">

                    <div class="event-details">
                        <h3><?php echo $row['event_title']; ?> (ID: <?php echo $row['event_id']; ?>)</h3>
                        <p><strong>Price:</strong> ₹<?php echo $row['event_price']; ?></p>
                        <p><strong>Participants:</strong> <?php echo $row['participents']; ?></p>
                        <p><strong>Date:</strong> <?php echo $row['Date']; ?></p>
                        <p><strong>Time:</strong> <?php echo $row['time']; ?></p>
                        <p><strong>Location:</strong> <?php echo $row['location']; ?></p>
                        <p><strong>Student Coordinator:</strong> <?php echo $row['student_coordinator']; ?> 
                            (<?php echo $row['student_phone']; ?>)</p>
                        <p><strong>Staff Coordinator:</strong> <?php echo $row['staff_coordinator']; ?> 
                            (<?php echo $row['staff_phone']; ?>)</p>

                        <!-- Participate Button -->
                        <form action="participate.php" method="GET" style="margin-top: 20px;">
                            <input type="hidden" name="event_id" value="<?php echo $row['event_id']; ?>">
                            <button type="submit" class="btn">Participate</button>
                        </form>
                    </div>
                </div>
                <?php
            }
        } else {
            echo "<p>No events found.</p>";
        }
        ?>
        
        <a class="btn-back" href="index.php">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Back
        </a>

    </div>
</div>

<?php require 'utils/footer.php'; ?> <!-- Existing footer -->
</body>
</html>
