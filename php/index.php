<?php
$servername = "dbclass.cs.nmsu.edu";
$username = "bmoffett";
$password = "7z4Yv0bJ";
$dbname = "MariaDB";

$conn = new mysqli($servername, $username, $password);
if ($conn->connect_error){
	die("Connection failed. Reason: " . $conn->connect_error);
}
else{
	echo "Connection sucessful!";
}
$conn->close();
