
<?php
require "../db_connect.php";


$sql = "SELECT tutor_id, first_name, last_name,
               years_of_experience, area_of_expertise
        FROM tutor
        ORDER BY last_name, first_name";


$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meet Our Tutors | Tutee</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .tutor-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            padding: 20px 0;
        }

        .tutor-card {
            background: white;
            color: #222;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 2px 8px #0001;
        }

        .tutor-card h2 {
            margin-top: 0;
        }
    </style>
</head>
<body>

 

<header class="site-header">
    <nav class="navbar">
        <a href="index.html" class="logo">tutee<span>.</span></a>
        <ul class="nav-links">
            <li><a href="index.html">Home</a></li>
            <li><a href="sign-up.html">Sign Up</a></li>
            <li><a href="become-a-tutor.html">Become a Tutor</a></li>
            <li><a href="../view_records.php">View Records</a></li>
        <li><a href="tutors.php">Meet Our Tutors</a></li>
        </ul>
    </nav>
</header>

<main class="section">
    <h1>Meet Our Tutors!</h1>
    <p class="section-intro">
        Find experienced peers who can help you succeed.
    </p>

    <div class="tutor-list">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<article class="tutor-card">';

                echo '<h2>' .
                    htmlspecialchars($row["first_name"]) . ' ' .
                    htmlspecialchars($row["last_name"]) .
                    '</h2>';

                echo '<p><strong>Expertise:</strong> ' .
                    htmlspecialchars($row["area_of_expertise"]) .
                    '</p>';

                echo '<p><strong>Experience:</strong> ' .
                    htmlspecialchars($row["years_of_experience"]) .
                    ' years</p>';

                echo '</article>';
            }
        } else {
            echo "<p>No tutors are listed yet.</p>";
        }

        $conn->close();
        ?>
    </div>
</main>

</body>
</html>
