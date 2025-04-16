<!-- ✅ Remove session_start() from index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AVCOE 2k25 - Events</title>
    <?php require 'utils/styles.php'; ?> <!-- Link existing styles -->
    <link rel="stylesheet" href="css/index_styles.css"> <!-- New CSS for modern styling -->
</head>

<body>

<?php require 'utils/header.php'; ?> <!-- Include navbar -->

<div class="event-categories-container">
    <!-- Banner Section -->
    <div class="banner-container">
        <div class="banner-content">
            <h1>Welcome to AVOCE 2k25</h1>
            <p>Unleash Your Talent and Creativity – Participate in Technical, Gaming, and Cultural Events!</p>
            <p>Explore Events</p>
        </div>
    </div>

    <h1>Register for Your Favorite Events</h1>

    <!-- Technical Event Section -->
    <div class="event-card">
        <img src="images/technical.jpg" alt="Technical Event" class="event-image">
        <div class="event-content">
            <h2>Technical Events</h2>
            <p>Embrace your technical skills by participating in various technical events!</p>
            <a href="viewEvent.php?id=1" class="btn-view">View Technical Events →</a>
        </div>
    </div>

    <!-- Gaming Event Section -->
    <div class="event-card">
        <img src="images/gaming.jpg" alt="Gaming Event" class="event-image">
        <div class="event-content">
            <h2>Gaming Events</h2>
            <p>Show off your gaming skills by joining our gaming events!</p>
            <a href="viewEvent.php?id=2" class="btn-view">View Gaming Events →</a>
        </div>
    </div>

    <!-- On-Stage Event Section -->
    <div class="event-card">
        <img src="images/onstage.jpg" alt="On-Stage Event" class="event-image">
        <div class="event-content">
            <h2>On-Stage Events</h2>
            <p>Boost your confidence by performing in our on-stage events!</p>
            <a href="viewEvent.php?id=3" class="btn-view">View On-Stage Events →</a>
        </div>
    </div>

    <!-- Off-Stage Event Section -->
    <div class="event-card">
        <img src="images/offstage.jpg" alt="Off-Stage Event" class="event-image">
        <div class="event-content">
            <h2>Off-Stage Events</h2>
            <p>Showcase your talent by participating in our off-stage events!</p>
            <a href="viewEvent.php?id=4" class="btn-view">View Off-Stage Events →</a>
        </div>
    </div>

</div>

<?php require 'utils/footer.php'; ?> <!-- Include footer -->

</body>
</html>
