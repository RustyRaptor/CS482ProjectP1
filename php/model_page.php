<?php
echo "i am here";
$modelno = $_GET["modelNo"];
echo $modelno;
$query3 = "select * from Model where modelNo=$modelno;";
echo $query3;
#$result3 = $conn->query($query3) or die(mysqli_error($conn));
#if(isset($_POST["modelNo"]){
 #                               if($result3->num_rows > 0){
  #                                      while($r3 = $result3->fetch_assoc()){
?>
