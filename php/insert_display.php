<?php
require_once('connection.php');
?>
<html>

<body>
        <?php
        $serialNo = $_GET["serialNo"];
        $schedulerSystem = $_GET["schedulerSystem"];
        $modelNo = $_GET["modelNo"];
        $width = $_GET["width"];
        $height = $_GET["height"];
        $weight = $_GET["weight"];
        $depth = $_GET["depth"];
        $screensize = $_GET["screenSize"];

        $query = "insert into `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`)
                VALUES ('$modelNo',$width, $height, $weight, $depth, $screensize);";
        $result = $conn->query($query) or die(mysqli_error($conn));
        $query2 = "insert into `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`)
                values ('$serialNo', '$schedulerSystem', '$modelNo');";
        $result2 = $conn->query($query2) or die(mysqli_error($conn));
        $query3 = "select * from DigitalDisplay;";
        $result3 = $conn->query($query3) or die(mysqli_error($conn));
        if ($result3->num_rows > 0) {
        ?>
                <b>Insertion successful. Check below to make sure your display appears below!</b><br>
                <?php
                while ($r = $result3->fetch_assoc()) {
                ?>
                        <tr>
                                <td><?php echo $r["serialNo"]; ?></td>
                                <td><?php echo $r["schedulerSystem"]; ?></td>
                                <td><?php echo $r["modelNo"]; ?></td>
                                <td><?php echo nl2br("\n"); ?></td>
                        </tr>
        <?php
                }
        }

        ?>
        <b>Please hit the back button in your browser to return to the main page.</b>
        <form action="logout.php" method="get">
                LOGOUT: <input type="submit">
        </form>

</html>
</body>