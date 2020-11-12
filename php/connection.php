<?php
$servername = "dbclass.cs.nmsu.edu";
$username = "bmoffett";
$password = "7z4Yv0bJ";
$dbname = "bmoffett_482502fa20";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
        die("Connection failed. Reason: " . $conn->connect_error);
}
else{
        echo "Welcome to the database " . $username;
        echo nl2br("\n");
}
?>
