<?php
require("newdbc.php");
$idval=$_GET["wikiId"];

$find_article=mysqli_query($conn,"SELECT id, description FROM wikipedia WHERE id= ".$idval." ORDER BY id DESC LIMIT 1");

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
