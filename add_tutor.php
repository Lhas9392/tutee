<?php
    echo "<h1>Adding the following tutor to database</h1> <br>";

    $trId = $_POST["trId"];
    $trFname = $_POST["trFname"];
    $trLname = $_POST["trLname"];
    $trEmail = $_POST["trEmail"];
    $trExpert = $_POST["trExpert"];
    $trYears = $_POST["trYears"];

    echo "Tutor ID: $trId <br>";
    echo "Tutor First Name: $trFname <br>";
    echo "Tutor Last Name: $trLname <br>";
    echo "Tutor Email: $trEmail <br>";
    echo "Tutor Expertise: $trExpert <br>";
    echo "Tutor Years of Experience: $trYears <br>";

    $servername = "localhost";
    $username = "DB_Tutee";
    $password = "1234";
    $dbname = "tutees_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tutor (tutor_id, first_name, last_name, email, area_of_expertise, years_of_experience)
            VALUES ('$trId', '$trFname', '$trLname', '$trEmail', '$trExpert', $trYears)";

        if ($conn->query($sql) === TRUE) {
            echo "<h4 style=\"color:green;\"> New record created successfully!</h4>";
        }else{
            echo "<h4 style=\"color:red;\"> Error: " . $sql . "<br>" . $conn->error . "</h4>";
        }

    $conn->close();
?>