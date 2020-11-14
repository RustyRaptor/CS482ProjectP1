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
	<b>Update successful. Make sure your updated model number is in the list below!</b><br>
	SerialNo Scheduler ModelNo<br>
	<div class="alert alert-dismissible alert-info">
		Click back in your browser to return to the main page
	</div>
	------------------------------<br>
	<?php
	$original = $_GET["original"];
	$update = $_GET["upd8"];
	// $rmcheck = "SET FOREIGN_KEY_CHECKS=0;";
	// $rmgood = $conn->query($rmcheck) or die(mysqli_error($conn));
	$query = "update DigitalDisplay set modelNo='$update' where modelNo='$original';";
	$result = $conn->query($query) or die(mysqli_error($conn));
	// $query2 = "update Model set modelNo='$update' where modelNo='$original';";
	// $result2 = $conn->query($query2) or die(mysqli_error($conn));
	$query3 = "select * from DigitalDisplay;";
	// $setcheck = "SET FOREIGN_KEY_CHECKS=1;";
	// $setgood = $conn->query($setcheck) or die(mysqli_error($conn));
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
		<button type="submit" class="btn btn-danger btn-lg">Log Out</button>
	</form>
</body>

</html>