<?php

// little helper function to print the results
require("newdbc.php");
//$idval=17;
$idval=$_GET["id"];
$find_article=mysqli_query($conn,"SELECT * FROM mashupeval WHERE wikiId=".$idval." ORDER BY id DESC LIMIT 1");

include_once("php_includes/check_login_status.php");
include('header.php');
echo '<h1>MANUAL MASHUP</h1>';
while($row=mysqli_fetch_assoc($find_article))
{  
    $quality= $row['vocabulary'];
	$readability=$row['difficulty'];
	$errors=$row['effort'];
	//$description= $row['description'];
	echo '<br/>';
	echo '<br/>';
	echo "<b>1. Vocabulary of the article: ".'0.'.$quality.'</b><br/>';
	echo '<br/>';
	echo '<br/>';
	echo "<b>2. Difficulty in understanding: ".'0.'.$readability.'</b><br/>';
	echo '<br/>';
	echo '<br/>';
	echo "<b>3. Effort for mashup: ".'0.'.$errors.'</b><br/>';
	echo '<br/>';
	echo '<br/>';
	echo "<b>4. Length of Article: ".'Same as Automatic'.'</b><br/>';
	echo '<br/>';
	echo '<br/>';
	echo "<b>5. Time Required to mashup: ".'Does not apply'.'</b><br/>';
	echo '<br/>';
	echo '<br/>';
}
			
?>