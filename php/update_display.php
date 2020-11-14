<?php
require_once('connection.php');
?>
<html>

<body>
	<b>Update successful. Make sure your updated model number is in the list below!</b><br>
	SerialNo Scheduler ModelNo<br>
	------------------------------<br>
	<?php
	$original = $_GET["original"];
	$update = $_GET["upd8"];
	$rmcheck = "SET FOREIGN_KEY_CHECKS=0;";
	$rmgood = $conn->query($rmcheck) or die(mysqli_error($conn));
	$query = "update DigitalDisplay set modelNo='$update' where modelNo='$original';";
	$result = $conn->query($query) or die(mysqli_error($conn));
	$query2 = "update Model set modelNo='$update' where modelNo='$original';";
	$result2 = $conn->query($query2) or die(mysqli_error($conn));
	$query3 = "select * from DigitalDisplay;";
	$setcheck = "SET FOREIGN_KEY_CHECKS=1;";
	$setgood = $conn->query($setcheck) or die(mysqli_error($conn));
	$result3 = $conn->query($query3) or die(mysqli_error($conn));
	if ($result3->num_rows > 0) {
		while ($r3 = $result3->fetch_assoc()) {
			$serialno = $r3["serialNo"];
			$schedsys = $r3["schedulerSystem"];
			$modnum = $r3["modelNo"];
			echo "
			<tr>
				<td>$serialno</td>
				<td>$schedsys</td>
				<td>$modnum</td><br>
			</tr>
			";
		}
	}
	?>

	<form action="logout.php" method="get">
		<button type="submit" class="btn btn-primary">Log Out</button>
	</form>
</body>

</html>