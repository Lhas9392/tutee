
<?php
require "db_connect.php";

$tuteeSql = "SELECT * FROM tutee";
$tutorSql = "SELECT * FROM tutor";

$tuteeResult = $conn->query($tuteeSql);
$tutorResult = $conn->query($tutorSql);

if (!$tuteeResult || !$tutorResult) {
    die("Error retrieving records: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutee and Tutor Records</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f4f4f4;
        }

        h1, h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #333;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #eee;
        }
    </style>
</head>

<body>

    <h1>Tutee and Tutor Records</h1>

    <h2>Registered Tutees</h2>

    <table>
        <tr>
            <th>Tutee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Major</th>
            <th>Credit Hours</th>
        </tr>

        <?php
        if ($tuteeResult->num_rows > 0) {
            while ($row = $tuteeResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["tutee_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["major"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["credit_hours"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No tutees found.</td></tr>";
        }
        ?>
    </table>

    <h2>Registered Tutors</h2>

    <table>
        <tr>
            <th>Tutor ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Area of Expertise</th>
            <th>Years of Experience</th>
        </tr>

        <?php
        if ($tutorResult->num_rows > 0) {
            while ($row = $tutorResult->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row["tutor_id"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["first_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["last_name"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["area_of_expertise"]) . "</td>";
                echo "<td>" . htmlspecialchars($row["years_of_experience"]) . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No tutors found.</td></tr>";
        }

        $conn->close();
        ?>
    </table>

</body>
</html>
