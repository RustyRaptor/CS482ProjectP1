<?php
require_once('connection.php');
?>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./bootstrap.min.css">
</head>

<body>
	<div class="jumbotron">
	<h1>Deletion page</h1>
	<?php
	$delSerial = $_GET["delSerialNo"];
	// $rmcheck = "SET FOREIGN_KEY_CHECKS=0;";
	// $rmgood = $conn->query($rmcheck) or die(mysqli_error($conn));
	$query7 = "select modelNo from DigitalDisplay where serialNo='$delSerial';";
	$result7 = $conn->query($query7) or die(mysqli_error($conn));
	$modelnohold = $result7->fetch_assoc();
	$modelno = $modelnohold["modelNo"];
	$query = "delete from DigitalDisplay where serialNo='$delSerial';";
	$result = $conn->query($query) or die(mysqli_error($conn));
	$query6 = "select modelNo from DigitalDisplay where serialNo='$delSerial';";
	$result6 = $conn->query($query6) or die(mysqli_error($conn));
	if ($result6->num_rows === 0) {
		$query3 = "delete from Model where modelNo='$modelNo';";
		$result3 = $conn->query($query3) or die(mysqli_error($conn));
	}


	$query2 = "select modelNo from Model where modelNo='$modelno';";
	$result2 = $conn->query($query2) or die(mysqli_error($conn));

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
	</div>
	<div class="alert alert-dismissible alert-info">
		Click back in your browser to return to the main page
	</div>
	<form action="logout.php" method="get">
		<button type="submit" class="btn btn-danger btn-lg">Log Out</button>
	</form>
</body>

</html>