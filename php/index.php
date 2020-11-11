<?php
$servername = servername;
$username = username;
$password = password;
$dbname = dbname;

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
        die("Connection failed. Reason: " . $conn->connect_error);
}
$conn->close();
?>
