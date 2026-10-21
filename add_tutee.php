<?php
    echo "<h1>Adding the following student to database</h1> <br>";

    $teId = $_POST["teId"];
    $teFname = $_POST["teFname"];
    $teLname = $_POST["teLname"];
    $teEmail = $_POST["teEmail"];
    $teMajor = $_POST["teMajor"];
    $teCredits = $_POST["teCredits"];


    echo "Tutee ID: $teId <br>";
    echo "Tutee First Name: $teFname <br>";
    echo "Tutee Last Name: $teLname <br>";
    echo "Tutee Email: $teEmail <br>";
    echo "Tutee Major: $teMajor <br>";
    echo "Tutee Credits: $teCredits <br>";

    $servername = "localhost";
    $username = "DB_Tutee";
    $password = "1234";
    $dbname = "tutees_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO tutee (tutee_id, first_name, last_name, email, major, credit_hours)
            VALUES ('$teId', '$teFname', '$teLname', '$teEmail', '$teMajor', $teCredits)";

        if ($conn->query($sql) === TRUE) {
            echo "<h4 style=\"color:green;\"> New record created successfully!</h4>";
        }else{
            echo "<h4 style=\"color:red;\"> Error: " . $sql . "<br>" . $conn->error . "</h4>";
        }

    $conn->close();
?>