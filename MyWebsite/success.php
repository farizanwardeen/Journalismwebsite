<?php
//require("newdbc.php");
$videoid= $_GET['id'];
//$videoid= 3964;
header("Location:watching.php?id=".$videoid);

exit;
//header("Location:commentindex.php");
//header("location:readcomment.php?id=".$videoid);


?>