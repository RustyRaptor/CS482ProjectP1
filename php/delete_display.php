<?php
require_once('connection.php');
?>
<html>

<body>
	<h1>Deletion page</h1>
	<?php
	$delmodel = $_GET["delmodelNo"];
	$rmcheck = "SET FOREIGN_KEY_CHECKS=0;";
	$rmgood = $conn->query($rmcheck) or die(mysqli_error($conn));
	$query = "delete from DigitalDisplay where modelNo='$delmodel';";
	$result = $conn->query($query) or die(mysqli_error($conn));
	$query2 = "select modelNo from Model where modelNo='$delmodel';";
	$result2 = $conn->query($query2) or die(mysqli_error($conn));
	$query3 = "delete from Model where modelNo='$delmodel';";
	if ($result2->num_rows === 0) {
		$result3 = $conn->query($query3) or die(mysqli_error($conn));
	}
	$setcheck = "SET FOREIGN_KEY_CHECKS=1;";
	$setresult = $conn->query($setcheck) or die(mysqli_error($conn));
	$query4 = "select * from DigitalDisplay;";
	$result4 = $conn->query($query4) or die(mysqli_error($conn));
	$query5 = "select * from Model;";
	$result5 = $conn->query($query5) or die(mysqli_error($conn));
	?>
	<b>Deletion successful. Make sure the model number does not appear in the list below!</b><br>
	SerialNo Scheduler ModelNo<br>
	------------------------------<br>
	<?php
	if ($result4->num_rows > 0) {
		while ($r4 = $result4->fetch_assoc()) {
	?>
			<tr>
				<td><?php echo $r4["serialNo"]; ?></td>
				<td><?php echo $r4["schedulerSystem"]; ?></td>
				<td><?php echo $r4["modelNo"]; ?></td>
				<td><?php echo nl2br("\n"); ?></td>
			</tr>
	<?php
		}
	}
	?>
	ModelNo Width Height Weight Depth ScreenSize<br>
	------------------------------------------------<br>
	<?php
	if ($result5->num_rows > 0) {
		while ($r5 = $result5->fetch_assoc()) {
	?>
			<tr>
				<td><?php echo $r5["modelNo"]; ?></td>
				<td><?php echo $r5["width"]; ?></td>
				<td><?php echo $r5["height"]; ?></td>
				<td><?php echo $r5["weight"]; ?></td>
				<td><?php echo $r5["depth"]; ?></td>
				<td><?php echo $r5["screenSize"]; ?></td>
				<td><?php echo nl2br("\n"); ?></td>
			</tr>
	<?php
		}
	}
	?>
	<h6>Please hit the back button in your browser to return to the main page.</h6>
	<form action="logout.php" method="get">
		<button type="submit" class="btn btn-danger">Log Out</button>
	</form>
</body>

</html>