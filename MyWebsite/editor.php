<?php
$val=$_GET["id"];

require("newdbc.php");
$find_article=mysqli_query($conn,"SELECT id, title, image FROM wikipedia WHERE id= ".$val." ORDER BY id DESC LIMIT 10");

include_once("php_includes/check_login_status.php");
include('header.php');
echo '<h1>Editor\'s Lounge</h1>';
echo '<hr>';
while($row=mysqli_fetch_assoc($find_article))
{  
	$id=$row['id'];
	$title=$row['title'];
	$image= $row['image'];
	echo'<div id="wikiimagediv">';
	echo '<h3>'.$title.'</h3>'.'<br/>';
	echo '<p><img id="wikiimage" style="width:400px; height: 400px;" src="'.$image.'"></img>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
	echo '<hr>';
	echo '</div>';
}

?>


<?php 
//Checks if the user is logged in
require("newdbc.php");
$find_article=mysqli_query($conn,"SELECT id, name, description, wikiId, description FROM tempwiki WHERE wikiId= ".$val." ORDER BY id DESC LIMIT 10");

while($row=mysqli_fetch_assoc($find_article))
{  
    $id= $row['id'];
	$name=$row['name'];
	$description=$row['description'];
	$wikiId= $row['wikiId'];
	$description= $row['description'];
	
		echo'<div id="wikiimagediv">';
		//echo '<h3>'.$wikiId.'</h3>'.'<br/>';
		echo '<h3> Submitted By: '.$name.'</h3>';
		echo '<a href="plague.php?id='.$id.'&wikiId='.$wikiId.' ">Check Plagarism</a>'.'<br/>';
		echo '<p>'.$description.'</p>';
		
	

?>	
	
	 <form id="form1" name="form1" method="post" action="updatedatabase.php?wikiId=<?php echo $wikiId?>&tempId=<?php echo $id?>">
        <input type="submit" name="btnLogin" id="btnLogin" value="Update" />
      </form>
	
	
	<hr>
	</div>
<?php	
} 
include('invisiblefooter.php');
?>
<script>

