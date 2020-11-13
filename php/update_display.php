<?php
require_once('connection.php');
?>
<html>

<body>
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
	?>
		<b>Update successful. Make sure your updated model number is in the list below!</b><br>
		SerialNo Scheduler ModelNo<br>
		------------------------------<br>
		<?php
		while ($r3 = $result3->fetch_assoc()) {
		?>
			<tr>
				<td><?php echo $r3["serialNo"]; ?></td>
				<td><?php echo $r3["schedulerSystem"]; ?></td>
				<td><?php echo $r3["modelNo"]; ?></td><br>
		<?php
		}
	}
		?>

		<form action="logout.php" method="get">
			LOGOUT: <input type="submit">
		</form>
</body>

</html>