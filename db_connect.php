
<?php
$servername = "localhost";
$username = "DB_Tutee";
$password = "1234";
$dbname = "tutees_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
