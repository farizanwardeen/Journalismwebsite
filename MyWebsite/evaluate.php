<?php
include_once("php_includes/check_login_status.php");
include('header.php');
$idval=$_GET["id"];
?>

<h2>Evaluate Automatic Mashup</h2>
<div id="wrapper3">
			<div id="webpage1" style="float:left">
			    <?php 
				    $url1="/websitecopy8/MyWebsite/wikiedit.php?id=".$idval;
				?>
				<iframe src="<?php echo $url1; ?>" width="600" height="700" ></iframe>
			</div>
			<br/>
		
<div>
			
			
		<?php
		// define variables and set to empty values
		$errorsErr= $qualityErr = $readabilityErr =$comphrensionErr=$degreeOfComprehnsionErr=$mashupleveldifficultyErr="";
		$errors= $quality = $readability = $comment= $comphrension=$degreeOfComprehnsion=$mashupleveldifficulty= "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
		  
		   if (empty($_POST["comment"])) {
			 $comment = "";
		   } else {
			 $comment = test_input($_POST["comment"]);
		   }

		   if (empty($_POST["quality"])) {
			 $qualityErr = "Input is required";
		   } else {
			 $quality = test_input($_POST["quality"]);
		   }
		    if (empty($_POST["readability"])) {
			 $readabilityErr = "Input is required";
		   } else {
			 $readability= test_input($_POST["readability"]);
		   }
		   if (empty($_POST["errors"])) {
			 $errorsErr = "Input is required";
		   } else {
			 $errors= test_input($_POST["errors"]);
		   }
		   if (empty($_POST["comprehension"])) {
			 $comprehensionErr = "Input is required";
		   } else {
			 $comprehension= test_input($_POST["comprehension"]);
		   }
		   if (empty($_POST["degreeofcomprehension"])) {
			 $degreeofcomprehensionErr = "Input is required";
		   } else {
			 $degreeofcomprehension= test_input($_POST["degreeofcomprehension"]);
		   }
		   if (empty($_POST["mashupleveldifficulty"])) {
			 $mashupleveldifficultyErr = "Input is required";
		   } else {
			 $mashupleveldifficulty= test_input($_POST["mashupleveldifficulty"]);
		   }
		}

		function test_input($data) {
		   $data = trim($data);
		   $data = stripslashes($data);
		   $data = htmlspecialchars($data);
		   return $data;
		}
		?>

		<h2>&nbsp; Evaluating Automatic Mashup</h2>
		<form method="post" action="<?php echo "http://localhost/websitecopy8/MyWebsite/evaluate.php?id=".$idval;?>"> 
		<!--Rate the Quality of Mashup:-->
		   &nbsp; &nbsp; 1. Vocabulary of the article </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="0") echo "checked";?>  value="0">0
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="1") echo "checked";?>  value="1">1
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="2") echo "checked";?>  value="2">2
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="3") echo "checked";?>  value="3">3
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="4") echo "checked";?>  value="4">4
		    <input type="radio" name="quality" <?php if (isset($quality) && $quality=="5") echo "checked";?>  value="5">5
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="6") echo "checked";?>  value="6">6
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="7") echo "checked";?>  value="7">7
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="8") echo "checked";?>  value="8">8
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="9") echo "checked";?>  value="9">9
		   <input type="radio" name="quality" <?php if (isset($quality) && $quality=="10") echo "checked";?>  value="10">10
		   
		   <br><br>
		   <!--Readability of the Article:-->
		   &nbsp; &nbsp; 2. Difficulty in understanding: </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="0") echo "checked";?>  value="0">0
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="1") echo "checked";?>  value="1">1
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="2") echo "checked";?>  value="2">2
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="3") echo "checked";?>  value="3">3
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="4") echo "checked";?>  value="4">4
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="5") echo "checked";?>  value="5">5
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="6") echo "checked";?>  value="6">6
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="7") echo "checked";?>  value="7">7
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="8") echo "checked";?>  value="8">8
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="9") echo "checked";?>  value="9">9
		   <input type="radio" name="readability" <?php if (isset($readability) && $readability=="10") echo "checked";?>  value="10">10
		   
		   <br><br>
		   <!--Errors in the Article:-->
		   &nbsp; &nbsp; 3. Effort for mashup:  </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="0") echo "checked";?>  value="0">0
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="1") echo "checked";?>  value="1">1
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="2") echo "checked";?>  value="2">2
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="3") echo "checked";?>  value="3">3
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="4") echo "checked";?>  value="4">4
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="5") echo "checked";?>  value="5">5
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="6") echo "checked";?>  value="6">6
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="7") echo "checked";?>  value="7">7
		    <input type="radio" name="errors" <?php if (isset($errors) && $errors=="8") echo "checked";?>  value="8">8
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="9") echo "checked";?>  value="9">9
		   <input type="radio" name="errors" <?php if (isset($errors) && $errors=="10") echo "checked";?>  value="10">10
		   
		   <br><br>
		
		   &nbsp; &nbsp; 4. Comprehension of article:  </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="comprehension" <?php if (isset($comprehension) && $comprehension=="understandable") echo "checked";?>  value="understandable">Understandable
		   <input type="radio" name="comprehension" <?php if (isset($comprehension) && $comprehension=="notunderstandable") echo "checked";?>  value="notunderstandable">Not Understandable
		   
		     <br><br>
		   &nbsp; &nbsp; 5. Time to understand:  </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="degreeOfComprehnsion" <?php if (isset($degreeOfComprehnsion) && $degreeOfComprehnsion=="verycomprehensible") echo "checked";?>  value="verycomprehensible">Alot
		   <input type="radio" name="$degreeOfComprehnsion" <?php if (isset($degreeOfComprehnsion) && $degreeOfComprehnsion=="not comprehensible") echo "checked";?>  value="notunderstandable">Very Little
		   
		     <br><br>
		   &nbsp; &nbsp; 5. Mashup difficulty level :  </br></br>
		   &nbsp; &nbsp; 
		   <input type="radio" name="mashupleveldifficulty" <?php if (isset($mashupleveldifficulty) && $mashupleveldifficulty=="easy") echo "checked";?>  value="easy">Easy
		   <input type="radio" name="$mashupleveldifficulty" <?php if (isset($mashupleveldifficulty) && $mashupleveldifficulty=="difficult") echo "checked";?>  value="difficult">Difficult
		  
		   
		   <br><br>
		   <!--
		   &nbsp; &nbsp;Comment: 
		   <br><br>
		   &nbsp; &nbsp;<textarea name="comment" rows="5" cols="40"><?php echo $comment;?></textarea>	
           -->		   
		   <input type="submit" name="submit" value="Submit"> 
		</form>

		<?php
		/*
		echo "<h2>Your Input:</h2>";
		echo $quality;
		echo "<br>";
		echo $readability;
		echo "<br>";
		echo $errors;
		echo "<br>";
		echo $comment;
		echo "<br>";
		echo $comprehension;
		echo "<br>";
		*/
		
		require ("newdbc.php");
		if($quality!=="" && $readability!="" && $errors!="")
		{
					echo "<h2>Your Answers has been submitted</h2>";
					$sql = "INSERT INTO mashupeval (id,vocabulary,difficulty,effort,wikiId )
					VALUES ('','$quality','$readability','$errors','$idval')";
                    
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