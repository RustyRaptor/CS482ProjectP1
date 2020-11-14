<?php
require_once('connection.php');
?>
<html>

<body>
        <b>Insertion successful. Check below to make sure your display appears below!</b><br>
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

                while ($r = $result3->fetch_assoc()) {
                        $serno = $r["serialNo"];
                        $schedsys = $r["schedulerSystem"];
                        $modno = $r["modelNo"];

                        echo "
                        <tr>
                                <td>$serno</td>
                                <td>$schedsys</td>
                                <td>$modno</td>
                                <td><br></td>
                        </tr>
                        ";
                }
        }

        ?>
        <b>Please hit the back button in your browser to return to the main page.</b>
        <form action="logout.php" method="get">
                <button type="submit" class="btn btn-primary">Log Out</button>
        </form>

</html>
</body>