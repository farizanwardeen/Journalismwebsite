<?php 
//Checks if the user is logged in
require("newdbc.php");
$find_article=mysqli_query($conn,"SELECT id, title, image, description FROM wikipedia ORDER BY id DESC LIMIT 10");

include_once("php_includes/check_login_status.php");
include('header.php');
echo '<h1>Editors Lounge</h1>';
echo '<hr>';
while($row=mysqli_fetch_assoc($find_article))
{  
	$id=$row['id'];
	$title=$row['title'];
	$image= $row['image'];
	$description= $row['description'];
	echo'<div id="wikiimagediv">';
	echo '<h3>'.$title.'</h3>'.'<br/>';
	echo '<p><img id="wikiimage" src="'.$image.'"></img>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<a href="/websitecopy8/MyWebsite/editor.php?id='.$id.'" class="btn btn-primary btn-small" target="_blank">View Submissions</a>&nbsp;&nbsp;&nbsp;';
	echo '<a href="/websitecopy8/MyWebsite/mashupframe.php?id='.$id.'" class="btn btn-primary btn-small" target="_blank">View Mashup Review</a>'.'</p><br/>';
	echo '<hr>';
	echo '</div>';
}
include('invisiblefooter.php');
?>