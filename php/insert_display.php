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
        $query4 = "select * from Model where modelNo = '$modelNo';";
        $result4 = $conn->query($query4) or die(mysqli_error($conn));
        if ($result4->num_rows === 0) {
                $query = "insert into `Model` (`modelNo`, `width`, `height`, `weight`, `depth`, `screenSize`)
                VALUES ('$modelNo',$width, $height, $weight, $depth, $screensize);";
                $result = $conn->query($query) or die(mysqli_error($conn));
        }


        $query2 = "insert into `DigitalDisplay` (`serialNo`, `schedulerSystem`, `modelNo`)
                values ('$serialNo', '$schedulerSystem', '$modelNo');";
        $result2 = $conn->query($query2) or die(mysqli_error($conn));
        $query3 = "select * from DigitalDisplay;";
        $result3 = $conn->query($query3) or die(mysqli_error($conn));
        $query5 = "select * from Model;";
        $result5 = $conn->query($query4) or die(mysqli_error($conn));
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
                while ($r = $result5->fetch_assoc()) {
                        $modno = $r["modelNo"];

                        echo "
                        <tr>
                                <td>$modno</td>
                                <td><br></td>
                        </tr>
                        ";
                }
        }

        ?>
        <div class="alert alert-dismissible alert-info">
                Click back in your browser to return to the main page
        </div>
        <form action="logout.php" method="get">
                <button type="submit" class="btn btn-danger btn-lg">Log Out</button>
        </form>

</html>
</body>