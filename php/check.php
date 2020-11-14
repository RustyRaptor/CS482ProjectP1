<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
    echo 'We don\'t have mysqli!!!';
} else {
    echo 'Phew we have it!';
}
?>
<form action="logout.php" method="get">
    <button type="submit" class="btn btn-danger">Log Out</button>
</form>