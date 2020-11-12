<html>
<body>
<title>ABC media</title>
<?php
$servername = $_GET["servername"];
$username = $_GET["username"];
$password = $_GET["password"];
$dbname = $_GET["dbname"];

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
        die("Connection failed. Reason: " . $conn->connect_error);
}
else{
	echo "Welcome to the database " . $username;
}
$conn->close();
?>
</body>
</html>
