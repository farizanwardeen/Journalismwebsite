<?php
//include config
require_once('../configincludes/config.php');

//log user out
$user->logout();
header('Location: index.php'); 

?>