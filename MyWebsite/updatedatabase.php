<?php
include_once("php_includes/check_login_status.php");
$val=$_GET["wikiId"];
$tempwikiId= $_GET["tempId"];
require("newdbc.php");
$find_temparticle=mysqli_query($conn,"SELECT description, wikiId FROM tempwiki WHERE wikiId=".$val." AND id=".$tempwikiId );

while($row=mysqli_fetch_assoc($find_temparticle))
{  
	$description= $row['description'];
	$wikiId= $row['wikiId'];
	//echo $description;
}
$sql = "UPDATE wikipedia SET description='".mysqli_real_escape_string($conn,$description) ."' WHERE id=".$wikiId;

if ($conn->query($sql) === TRUE) {
    echo "<h2>The Article has successfully been UPDATED.</h2>";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();
header('Refresh: 1;url=user.php?u='.$log_username);


?>