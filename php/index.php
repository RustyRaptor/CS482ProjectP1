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
<html>
<body>
<title>ABC media</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#hide").click(function(){
    $("p").hide();
  });
  $("#show").click(function(){
    $("p").show();
  });
});
</script>
<h3>Displays</h3>
SerialNo Scheduler ModelNo<br>
-----------------------------<br>
<?php
	$query = "select * from DigitalDisplay;";
	$result = $conn->query($query) or die(mysqli_error($conn));
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
?>
<h2>Click on a model number below to show that model number's information. If you would like to delete a display from the list, enter it's model number in the "delete" field below.</h2>
<?php
	$query2 = "select modelNo from DigitalDisplay;";
	$result2 = $conn->query($query2) or die(mysqli_error($conn));
	if($result2->num_rows > 0){
		while($r2 = $result2->fetch_assoc()){
?>
<tr>
			<td><?php echo $r2["modelNo"];?></td>
			<p><?php $modelno = $r2["modelNo"];
			         $query3 = "select * from Model where modelNo=$modelno;";
				 $result3 = $conn->query($query3) or die(mysqli_error($conn));
				 if($result2->num_rows > 0){
					 while($r3 = $result3->fetch_assoc()){
?>
<tr>
						<td><?php echo $r3["modelNo"];?></td>
						<td><?php echo $r3["width"];?></td>
						<td><?php echo $r3["height"];?></td>
						<td><?php echo $r3["weight"];?></td>
						<td><?php echo $r3["depth"];?></td>
						<td><?php echo $r3["screenSize"];?></td>
</tr>
</p>
<?php
					 }
				 }
?>
			<td><button id="hide">Hide</button></td>
			<td><button id="show">Show</button></td>
</tr>
<?php
		}
	}
?>
<b>Update a display by entering the model number you wish to update and the new model number below.</b><br>
<form action="update_display.php" method="get">
	Old model number:<input type="text" name="original"><br>
	New model number:<input type="text" name="upd8"><br>
	<input type="submit" value="Update"><input type="reset">
</form>
<b>Delete a display by entering the model number below.</b><br>
<form action="delete_display.php" method="get">
	<input type="text" name="delmodelNo"><br>
	<input type="submit" value="Delete"><input type="reset">
</form>
<h2>Search for a display</h3>
<h5>Please input a scheduler system below.</h5>
<form action="search_results.php" method="get">
	<input type="text" name="system"><br>
	<input type="submit"><input type="reset">
</form>
<?php echo nl2br("\n");?>
<h2>Insert a new display below. Make sure to input a unique serial number, and make sure that if your model number is not listed above, that you input the correct model information as well. Otherwise, your insertion will fail!</h2>
<form action="insert_display.php" method="get">
        Serial number<input type="text" name="serialNo"><br>
        Scheduler system<input type="text" name="schedulerSystem"><br>
	Model number<input type="text" name="modelNo"<br>
	<?php echo nl2br("\n");?>	
	<b>Insert relevant info (sans model number) for the model below.</b><br>
	Width<input type="text" name="width"><br>
	Height<input type="text" name="height"><br>
	Weight<input type="text" name="weight"><br>
	Depth<input type="text" name="depth"><br>
	Screen size<input type="text" name="screenSize"><br>
	<input type="submit"<input type="reset">
</form>
<?php
#	$query6 = "INSERT INTO `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`)
#		VALUES ('1045',40.00, 0.00, 643.00, 9999.99, 9999.99);";
#	$result6 = $conn->query($query6) or die(mysqli_error($conn));
#	$query5 = "insert into `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`)
#		values ('8002', 'Random', '1045');";
#	$result5 = $conn->query($query5) or die(mysqli_error($conn));
#	$query7 = "select * from DigitalDisplay;";
#	$result7 = $conn->query($query7) or die(mysqli_error($conn));
#	if($result7->num_rows > 0){
 #                       while($r7 = $result7->fetch_assoc()){
?>
<tr>
                                <td><?php echo $r7["serialNo"];?></td>
                                <td><?php echo $r7["schedulerSystem"];?></td>
                                <td><?php echo $r7["modelNo"];?></td>
                                <td><?php echo nl2br("\n");?></td>
</tr>
<?php
#                        }
 #               }

?>
</body>
</html>
