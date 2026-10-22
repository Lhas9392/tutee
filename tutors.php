
<?php
require "../db_connect.php";


$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tuteeId = trim($_POST["tutee_id"]);
    $tutorId = trim($_POST["tutor_id"]);

    $checkTutee = $conn->prepare(
        "SELECT tutee_id FROM tutee WHERE tutee_id = ?"
    );
    $checkTutee->bind_param("s", $tuteeId);
    $checkTutee->execute();
    $checkTutee->store_result();

    if ($checkTutee->num_rows == 0) {
        $message = "Tutee ID not found.";
    } else {
        $checkTutee->close();

        $checkTutor = $conn->prepare(
            "SELECT tutor_id FROM tutor WHERE tutor_id = ?"
        );
        $checkTutor->bind_param("s", $tutorId);
        $checkTutor->execute();
        $checkTutor->store_result();

        if ($checkTutor->num_rows == 0) {
            $message = "Tutor not found.";
        } else {
            $checkTutor->close();

            $insertRequest = $conn->prepare(
                "INSERT INTO requests
                (tutee_id, tutor_id, request_date, request_status)
                VALUES (?, ?, CURRENT_TIMESTAMP, 'Pending')"
            );

            $insertRequest->bind_param(
                "ss", $tuteeId, $tutorId
            );

            if ($insertRequest->execute()) {
                $message = "Tutor request submitted successfully!";
            } else {
                $message = "Could not submit the request.";
            }

            $insertRequest->close();
        }
    }
}



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
    background: white;
    color: #222;
    padding: 24px;
    border-radius: 12px;
    box-shadow: 0 2px 8px #0001;
    overflow: hidden;
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
    <?php
if ($message != "") {
    echo "<p>" . htmlspecialchars($message) . "</p>";
}
?>
    <p class="section-intro">
        Find experienced peers who can help you succeed.
    </p>

    <div class="tutor-list">
        <?php
        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<article class="tutor-card">';
                $photos = [
    "TR0001" => "mcqueen.webp",
    "TR0002" => "white.webp",
    "TR0003" => "scoob.webp",
    "TR0004" => "mj.webp",
    "TR0005" => "batman.webp"
];

$tutorId = $row["tutor_id"];

if (isset($photos[$tutorId])) {
    echo '<img class="tutor-photo" src="' .
        htmlspecialchars($photos[$tutorId]) .
        '" alt="Tutor headshot">';
}

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

                    
echo '<form method="POST" action="tutors.php">';

echo '<label for="tutee_id_' .
    htmlspecialchars($row["tutor_id"]) .
    '">Your Tutee ID:</label>';

echo '<input type="text" name="tutee_id" id="tutee_id_' .
    htmlspecialchars($row["tutor_id"]) .
    '" maxlength="6" required placeholder="TE0001">';

echo '<input type="hidden" name="tutor_id" value="' .
    htmlspecialchars($row["tutor_id"]) . '">';

echo '<button type="submit">Request This Tutor</button>';

echo '</form>';


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
