<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>About Us | Amrutvahini College of Engineering</title>
    <?php require 'utils/styles.php'; ?> <!-- CSS links -->
    
    <style>
        /* 🌟 Local styling for About Us page only */
        .about-container {
            max-width: 1100px;
            margin: 40px auto;
            padding: 40px;
            background: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            font-family: Arial, sans-serif;
            color: #333;
            line-height: 1.8;
        }

        .about-container h1 {
            text-align: center;
            color: #2c3e50;
            font-size: 42px;
            margin-bottom: 20px;
        }

        .about-container hr.blueline {
            border: 6px solid #00004d;
            border-radius: 5px;
            width: 80%;
            margin: 20px auto;
        }

        .about-container p {
            font-size: 20px;
            text-align: justify;
            margin: 20px 0;
        }

        /* 🌟 Responsive Design */
        @media (max-width: 768px) {
            .about-container {
                padding: 20px;
            }

            .about-container h1 {
                font-size: 32px;
            }

            .about-container p {
                font-size: 18px;
            }
        }

        @media (max-width: 576px) {
            .about-container h1 {
                font-size: 28px;
            }

            .about-container p {
                font-size: 16px;
            }
        }
    </style>
</head>

<body>

<?php require 'utils/header.php'; ?>

<!-- 🌟 About Us Section -->
<div class="about-container">

    <h1>About Us</h1>

    <hr class="blueline">

    <p>
        <strong>Amrutvahini College of Engineering (AVCOE)</strong>, located in **Sangamner, Maharashtra**, is a premier institution committed to delivering high-quality technical education. Established in **1983** under the aegis of **Amrutvahini Sheti and Shikshan Vikas Sanstha**, AVCOE is approved by **AICTE**, New Delhi, and is affiliated with **Savitribai Phule Pune University (SPPU)**.
    </p>

    <p>
        AVCOE is renowned for its **state-of-the-art infrastructure**, modern laboratories, and highly qualified faculty members. The institution offers **undergraduate and postgraduate programs** in various engineering disciplines, equipping students with the skills and knowledge needed to excel in their careers.
    </p>

    <p>
        The college is driven by its mission to provide **value-based technical education** and promote **research and innovation**. AVCOE continuously strives to foster **creativity, critical thinking, and technical expertise** among its students, preparing them to meet the challenges of the dynamic industry landscape.
    </p>

    <p>
        The institution also focuses on **extracurricular and co-curricular activities** to promote overall personality development. **Sanchalana**, the annual cultural fest, is a highlight of the college, bringing together students from various disciplines to participate in a range of events, including **music, dance, drama, and technical competitions**.
    </p>

    <p>
        With a strong emphasis on **industry collaboration**, AVCOE regularly organizes **seminars, workshops, and guest lectures** by industry experts. The college also has an active **placement cell**, ensuring excellent job opportunities for students in leading companies.
    </p>

    <hr class="blueline">

    <p style="text-align: center; font-size: 22px; color: #2c3e50;">
        <strong>"Empowering Minds, Enriching Futures"</strong> – AVCOE continues its mission of nurturing future engineers and innovators.
    </p>

</div>

<?php require 'utils/footer.php'; ?>

</body>
</html>
