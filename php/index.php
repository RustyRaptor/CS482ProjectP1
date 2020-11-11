<?php
$servername = echo $_POST["servername"];
$username = echo $_POST["username"];
$password = echo $_POST["password"];
$dbname = echo $_POST["dbname"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
        die("Connection failed. Reason: " . $conn->connect_error);
}
$conn->close();
?>
