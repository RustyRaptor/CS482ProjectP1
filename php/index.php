<?php
require_once('connection.php');
?>
<html>

<head>
	<title>ABC media</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./bootstrap.min.css">

</head>

<body>


	<div class="jumbotron">
		<h1>Displays</h1>
		<table class="table table-hover">
			<thead>
				<tr>
					<th scope="col">SerialNo</th>
					<th scope="col">Scheduler</th>
					<th scope="col">ModelNo</th>
				</tr>
			</thead>
			<?php
			$query = "select * from DigitalDisplay;";
			$result = $conn->query($query) or die(mysqli_error($conn));
			if ($result->num_rows > 0) {
				while ($r = $result->fetch_assoc()) {
			?>

					<tbody>
						<tr class="table-primary">
							<td><?php echo $r["serialNo"]; ?></td>
							<td><?php echo $r["schedulerSystem"]; ?></td>
							<td><?php echo $r["modelNo"]; ?></td>
						</tr>


				<?php
				}
			}
				?>
					</tbody>
		</table>
	</div>
	<div class="container">
		<h2>Details</h2>
		<div class="alert alert-dismissible alert-success">
			<strong>Click on a model number below to show that model number's information. If you would like to delete a display from the list, enter it's model number in the "delete" field below..
		</div>
		<table class="table table-hover">

			<h2></h2>
			<thead>
				<tr>
					<th scope="col">ModelNo</th>
					<th scope="col">Screen Size</th>
					<th scope="col">ModelNo</th>
					<th scope="col">Width</th>
					<th scope="col">height</th>
					<th scope="col">weight</th>
					<th scope="col">depth</th>
				</tr>
			</thead>
			<?php
			$query2 = "select modelNo from DigitalDisplay;";
			$result2 = $conn->query($query2) or die(mysqli_error($conn));
			if ($result2->num_rows > 0) {
				$cntid = 0;
				echo "<tbody>";
				while ($r2 = $result2->fetch_assoc()) {
					$cntid = $cntid + 1;
			?>

					<tr class="table-primary">
						<td>
							<p>
								<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample<?php echo "$cntid"; ?>" aria-expanded="false" aria-controls="collapseExample">
									<?php echo $r2["modelNo"]; ?>
								</button>
							</p>
						</td>
						<?php $modelno = $r2["modelNo"];
						$query3 = "select * from Model where modelNo=$modelno;";
						$result3 = $conn->query($query3) or die(mysqli_error($conn));
						if ($result2->num_rows > 0) {
							while ($r3 = $result3->fetch_assoc()) {
						?>

								<div class="collapse" id="collapseExample<?php echo "$cntid"; ?>">


									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["screenSize"]; ?></td>
									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["modelNo"]; ?></td>
									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["width"]; ?></td>
									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["height"]; ?></td>
									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["weight"]; ?></td>
									<td class="collapse" id="collapseExample<?php echo "$cntid"; ?>"><?php echo $r3["depth"]; ?></td>
								</div>



						<?php
							}
						}
						?>


					</tr>


			<?php
				}
			}
			?>
			</tbody>
		</table>
	</div>
	<div class="container">
		<h2>Update</h2>
		<div class="alert alert-dismissible alert-success">
			Update a display by entering the model number you wish to update and the new model number below.

		</div>
		<form action="update_display.php" method="get">
			<fieldset>
				<div class="form-group">
					<label for="exampleInputEmail1">Serial Number to update:</label>
					<input type="text" class="form-control" placeholder="Enter serial number here to be updated" name="original">
				</div>
				<hr>
				<div class="form-group">
					<label for="exampleInputEmail1">New serial number</label>
					<input type="text" class="form-control" placeholder="Enter new serial number here if no change just use the old one" name="serialupd8">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">New model number</label>
					<input type="text" class="form-control" placeholder="Enter new ModelNo here if no change just use the old one" name="upd8">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">New Scheduler System</label>
					<input type="text" class="form-control" placeholder="Enter new ModelNo here if no change just use the old one" name="sched8">
				</div>


				<button type="submit" class="btn btn-primary">Update</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				<input type="hidden" name="servername" value="<?php echo $_GET["servername"] ?>">
				<input type="hidden" name="username" value="<?php echo $_GET["username"] ?>">
				<input type="hidden" name="password" value="<?php echo $_GET["password"] ?>">
				<input type="hidden" name="dbname" value="<?php echo $_GET["dbname"] ?>">
			</fieldset>
		</form>
	</div>
	<div class="container">
		<h2>Delete</h2>
		<div class="alert alert-dismissible alert-success">
			Delete a display by entering the serial number below.

		</div>

		<form action="delete_display.php" method="get">
			<fieldset>
				<div class="form-group">
					<label for="exampleInputEmail1">SerialNo to delete</label>
					<input type="text" class="form-control" placeholder="Enter ModelNO here" name="delSerialNo">
				</div>
				<button type="submit" class="btn btn-primary">Delete</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				<input type="hidden" name="servername" value="<?php echo $_GET["servername"] ?>">
				<input type="hidden" name="username" value="<?php echo $_GET["username"] ?>">
				<input type="hidden" name="password" value="<?php echo $_GET["password"] ?>">
				<input type="hidden" name="dbname" value="<?php echo $_GET["dbname"] ?>">
			</fieldset>
		</form>
	</div>
	<div class="container">
		<h2>Search for a display</h3>


			<div class="alert alert-dismissible alert-success">
				Please input a scheduler system below.

			</div>
			<form action="search_results.php" method="get">
				<fieldset>
					<div class="form-group">
						<label for="exampleInputEmail1">Scheduler System</label>
						<input type="text" class="form-control" placeholder="Enter a valid scheduler system" name="system">
					</div>


					<button type="submit" class="btn btn-primary">Search</button>
					<button type="reset" class="btn btn-primary">Reset</button>
					<input type="hidden" name="servername" value="<?php echo $_GET["servername"] ?>">
					<input type="hidden" name="username" value="<?php echo $_GET["username"] ?>">
					<input type="hidden" name="password" value="<?php echo $_GET["password"] ?>">
					<input type="hidden" name="dbname" value="<?php echo $_GET["dbname"] ?>">
				</fieldset>
			</form>
	</div>
	<div class="container">
		<h2>Insert New</h2>
		<div class="alert alert-dismissible alert-success">
			Insert a new display below. Make sure to input a unique serial number, and make sure that if your model number is not listed <b>below</b>, that you input the correct model information as well. Otherwise, your insertion will fail!
		</div>

		<?php

		$getmodelquery = "SELECT modelNo from Model;";

		$getmodelresults = $conn->query($getmodelquery) or die(mysqli_error($conn));
		echo "
		<table class=\"table table-hover\">
			<thead>
				<tr>
					<th scope=\"col\">ModelNo</th>
				</tr>
			</thead>
			<tbody>
		";
		if ($getmodelresults->num_rows > 0) {
			while ($gmr = $getmodelresults->fetch_assoc()) {
				$model = $gmr["modelNo"];
				echo "
				<tr class=\"table-primary\">
					<td>$model</td>
				</tr>
				";
			}
		}

		echo "
			</tr>
			</tbody>
			</table>
		";

		?>

		<form action="insert_display.php" method="get">
			<fieldset>
				<div class="form-group">
					<label for="exampleInputEmail1">Serial Number</label>
					<input type="text" class="form-control" placeholder="Enter a Serial Number" name="serialNo">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Scheduler System</label>
					<input type="text" class="form-control" placeholder="Enter a valid scheduler system" name="schedulerSystem">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Model Number</label>
					<input type="text" class="form-control" placeholder="Enter a model number" name="modelNo">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Width</label>
					<input type="text" class="form-control" placeholder="Enter the width" name="width">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Height</label>
					<input type="text" class="form-control" placeholder="Enter the height" name="height">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Weight</label>
					<input type="text" class="form-control" placeholder="Enter the weight" name="weight">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Depth</label>
					<input type="text" class="form-control" placeholder="Enter the depth" name="depth">
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Screen Size</label>
					<input type="text" class="form-control" placeholder="Enter the screen size" name="screenSize">
				</div>



				<button type="submit" class="btn btn-primary">Insert</button>
				<button type="reset" class="btn btn-primary">Reset</button>
				<input type="hidden" name="servername" value="<?php echo $_GET["servername"] ?>">
				<input type="hidden" name="username" value="<?php echo $_GET["username"] ?>">
				<input type="hidden" name="password" value="<?php echo $_GET["password"] ?>">
				<input type="hidden" name="dbname" value="<?php echo $_GET["dbname"] ?>">
			</fieldset>
		</form>
		<tr>
			<td><?php echo $r7["serialNo"]; ?></td>
			<td><?php echo $r7["schedulerSystem"]; ?></td>
			<td><?php echo $r7["modelNo"]; ?></td>
			<td><?php echo nl2br("\n"); ?></td>
		</tr>
	</div>
	<div class="container">

		<form action="logout.php" method="get">
			<button type="submit" class="btn btn-danger btn-lg">Log Out</button>
		</form>
	</div>
</body>

</html>