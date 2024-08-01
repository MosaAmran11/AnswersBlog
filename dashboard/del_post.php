<?php
require('../config.php');
$n = $_GET['val'];
$exe = mysqli_query($conn, "DELETE FROM posts WHERE post_id = $n");
if (!$exe) {
    echo "error" . mysqli_error($conn);
}
header("location:index.php");
mysqli_close($conn);
