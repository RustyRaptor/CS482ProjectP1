<?php
require_once('connection.php');
?>
<html>
<body>
<h1>Search results</h1>
<?php
echo $_GET;
$system = $_GET["system"];
$query = "select * from DigitalDisplay where schedulerSystem='$system';";
echo $query;
#result isn't getting set properly for some reason
$result = $conn->query($query) or die(mysqli_error($conn));
echo $result;
#var_dump($query, $result);
		if($result->num_rows > 0){
			while($r = $result->fetch_assoc()){
?>
<tr>
				<td><?php echo $r["serialNo"];?></td>
				<td><?php echo $r["schedulerSystem"];?></td>
				<td><?php echo $r["modelNo"];?></td>
				<td><?php echo nl2br("\n");?></td>
</tr>
<?php
			}
		}
#no idea why this doesn't work
#$system = $_GET["system"];
#echo "i am here\n";
#$query = "select * from DigitalDisplay;";
#echo "i am here\n";
#	$result = $conn->query($query) or die(mysqli_error($conn));
#echo "i am here\n";
#if($result->num_rows > 0){
#	while($r = $result->fetch_assoc()){
?>
<tr>
		<td><?php echo $r["serialNo"];?></td>
		<td><?php echo $r["schedulerSystem"];?></td>
		<td><?php echo $r["modelNo"];?></td>
</tr>
<?php
#	}
#}
#else{
#	echo "result unset";
#}
?>
<h5>Please hit the back button on your browser to return to the main page.</h5>
</body>
</html>
