<?php
require ("newdbc.php");
if(isset($_POST['getvideoid'])){ $getvideoid = $_POST['getvideoid']; $videoid = $getvideoid;} 

//$videoid = 3964;

$sql = "SELECT * FROM videocomments WHERE videoid=".$videoid." ORDER BY id";
$find_videos=mysqli_query($conn,$sql);

while($row=mysqli_fetch_assoc($find_videos))
{
$id=$row['id'];
$postername=$row['name'];
$comment=$row['comment'];
$dellink="<a href=\"delete.php?id=".$id."&videoid=".$videoid."\">DELETE</a>";


 echo '<div class="news">';
			echo $postername.'<br>';
			echo $comment.'<br>';
			echo $dellink.'<br>';
			echo '<hr>';
 echo '</div><!--end news-->';
}

?>