<?php
require("newdbc.php");
$videoid= $_GET['id'];
$sql = "SELECT * FROM videocomments WHERE videoid=".$videoid." ORDER BY id";
$find_videos=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($find_videos))
{
$name=$row['name'];
$comment=$row['comment'];
 echo '<div class="news">';
			echo $name.'<br>';
			echo $comment.'<br>';
 echo '</div><!--end news-->';
}
?>