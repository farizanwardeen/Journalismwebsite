<?php
require("newdbc.php");
$idval=$_GET["wikiId"];
$id=$_GET["id"];
//$idval=12;
//$id=7;
$find_article=mysqli_query($conn,"SELECT id, name, description, wikiId, description FROM tempwiki WHERE wikiId= ".$idval." AND id=".$id." ORDER BY id DESC LIMIT 1");

while($row=mysqli_fetch_assoc($find_article))
{  
	$id=$row['id'];
	$description= $row['description'];
	echo '<div style="margin-left:100px; margin-right:100px;">';
	echo $description.'<br/>';
    echo '<br/>';
	echo '<br/>';
	echo '<br/>';
	echo '</div>';
}

?>
