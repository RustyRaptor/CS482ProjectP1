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
	echo nl2br("\n");
}
?>
<h3>Displays</h3>
<?php
	$query = "select * from DigitalDisplay;";
	$result = $conn->query($query) or die(mysqli_error($conn));
?>
<?php
		if($result->num_rows > 0){
			while($r = $result->fetch_assoc()){
?>
<tr>
				<td><?php echo $r["serialNo"];?></td>
				<td><?php echo $r["schedulerSystem"];?></td>
				<form action="" method="POST">
				<td><input type="submit" name"modelNo" value="<?php echo $r["modelNo"];?>"/><br></td>
				</form>
				<td><?php echo nl2br("\n");?></td>
</tr>
<?php
			}
		}
		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			if(isset($_POST['modelNo'])){
				$aquery = "select * from Model;";
				$qresult = $conn->aquery($aquery) or die(mysqli_error($conn));
				while($qr = $qresult->fetch_assoc()){
?>					<h3>Information for selected model number:</h3>
					<td><?php echo $r["modelNo"];?></td>
					<td><?php echo $r["width"];?></td>
					<td><?php echo $r["height"];?></td>
					<td><?php echo $r["depth"];?></td>
					<td><?php echo $r["screenSize"];?></td>
<?php
				}
			}
		}
		else{
			echo "sorry buddy";
		}
?>
</body>
</html>
