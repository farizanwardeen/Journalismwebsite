
<?php
require("newdbc.php");
$idval=$_GET["id"];
$find_article=mysqli_query($conn,"SELECT * FROM wikipedia WHERE id=".$idval." ORDER BY id DESC LIMIT 1");

include_once("php_includes/check_login_status.php");
include('header.php');
while($row=mysqli_fetch_assoc($find_article))
{  
	$id=$row['id'];
	$title=$row['title'];
	$image= $row['image'];
	$description= $row['description'];
	echo '<div style="margin-left:100px; margin-right:100px;">';
	echo '<h3>'.$title.'</h3>'.'<br/>';
	echo '<img src="'.$image.'"></img>';
	echo $description.'<br/>';
	echo '<b>'.'<a href="mediatree.php?name='.$title.'">'.'Related Articles'.'</a>'.'</b>';
    echo '<br/>';
	echo '<br/>';
	echo '<br/>';
	echo '</div>';
}

?>

<?php 
include('invisiblefooter.php');
?>