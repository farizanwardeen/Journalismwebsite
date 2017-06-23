<?php
include 'connect.php';
session_start();
unset ($_SESSION['signed_in']);
session_destroy();
echo "you successfully logged out";
header ("refresh:1;url=thumbnail.php" );
mysqli_close($con);
exit ();
?>