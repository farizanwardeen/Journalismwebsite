<?php
include_once("php_includes/check_login_status.php");
include('header.php');
$idval=$_GET["id"];
?>

<h2>Rate/Review Article</h2>
<div id="wrapper3">
			<div id="webpage1" style="float:left">
			    <?php 
				    $url1="/websitecopy8/MyWebsite/wikiedit.php?id=".$idval;
				?>
				<iframe src="<?php echo $url1; ?>" width="600" height="700" ></iframe>
			</div>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<br/>
			<div >
			
			
			
			
			<?php
// define variables and set to empty values
 $genderErr =  "";
$gender = $comment = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
   if (empty($_POST["comment"])) {
     $comment = "";
   } else {
     $comment = test_input($_POST["comment"]);
   }

   if (empty($_POST["gender"])) {
     $genderErr = "Gender is required";
   } else {
     $gender = test_input($_POST["gender"]);
   }
}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>

<h2>&nbsp; Rate Articles</h2>
<form method="post" action="<?php echo "http://localhost/websitecopy8/MyWebsite/review.php?id=".$idval;?>"> 
    &nbsp;&nbsp;Rating:
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="1") echo "checked";?>  value="1">1
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="2") echo "checked";?>  value="2">2
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="3") echo "checked";?>  value="3">3
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="4") echo "checked";?>  value="4">4
   <input type="radio" name="gender" <?php if (isset($gender) && $gender=="5") echo "checked";?>  value="5">5
   <span class="error">* <?php echo $genderErr;?></span>
   <br><br>
   &nbsp;&nbsp;Comment: <br/>
   &nbsp;&nbsp;<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>
   <br><br>
   &nbsp;&nbsp;<input type="submit" name="submit" value="Submit"> 
</form>

<?php
echo "<h2>Your Input:</h2>";
echo $gender;
echo "<br>";
echo $comment;
require ("newdbc.php");
		if($gender!=="" && $comment!="")
		{
					$sql = "INSERT INTO rate (id,rating,comments,wikiId )
					VALUES ('','$gender','$comment','$idval')";
                    
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} 
					else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
                    
			$conn->close();
		}


?>
			</div>
			
</div>
<?php		
include('invisiblefooter.php');
?>