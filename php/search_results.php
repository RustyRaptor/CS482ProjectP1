<?php
require_once('connection.php');
?>
<html>

<body>
	<h1>Search results</h1>
	<?php
	$system = $_GET["system"];
	$query = "select * from DigitalDisplay where schedulerSystem='$system';";
	#result isn't getting set properly for some reason
	$result = $conn->query($query) or die(mysqli_error($conn));

	#var_dump($query, $result);
	if ($result->num_rows > 0) {
		while ($r = $result->fetch_assoc()) {
			// Store each one in a variable
			$sn = $r["serialNo"];
			$ss = $r["schedulerSystem"];
			$mn = $r["modelNo"];
			// Insert them into the table
			echo "<tr>
				<td>$sn</td>
				<td>$ss</td>
				<td>$mn</td>
				<td><br></td>
			</tr>";
		}
	}
	?>

	<h5>Please <b>SMASH THAT MF</b> back button on your browser to return to the main page.</h5>
	<form action="logout.php" method="get">
		<button type="submit" class="btn btn-primary">Log Out</button>
	</form>
</body>

</html>