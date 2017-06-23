<?php //include config
require_once('newdbc.php');
include_once("php_includes/check_login_status.php");
//if not logged in redirect to login page
//if(!$user->is_logged_in()){ header('Location: login.php'); }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title> </title>
  <link rel="stylesheet" href="/websitecopy8/MyWebsite/newsblog/style/normalize.css">
  <link rel="stylesheet" href="/websitecopy8/MyWebsite/newsblog/style/main.css">
  <script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
  <script>
          tinymce.init({
              selector: "textarea",
              plugins: [
                  "advlist autolink lists link image charmap print preview anchor",
                  "searchreplace visualblocks code fullscreen",
                  "insertdatetime media table contextmenu paste "
              ],
              toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
          });
  </script>
</head>
<body>

<div id="wrapper">


	<h2>Add Post</h2>

	<?php
    $wikiId=$_GET["id"];
	$postName=$log_username;
	//if form has been submitted process it
	if(isset($_POST['submit'])){

		$_POST = array_map( 'stripslashes', $_POST );

		//collect form data
		extract($_POST);

	
		//very basic validation

		if($postDesc ==''){
			$error[] = 'Please enter the description.';
		}
       

		if(!isset($error)){

			try {

				//insert into database
				/*
				$stmt = $db->prepare('INSERT INTO tempwiki (id,name,description) VALUES (:postId, :postName, :postDesc)') ;
				$stmt->execute(array(
					':postId' => $postId,
					':postName' => $postName,
					':postDesc' => $postDesc,
				));
                */
				$sql = "INSERT INTO tempwiki(id,name,description,wikiId)
					VALUES ('','$postName',' " . mysqli_real_escape_string($conn,$postDesc) ."','$wikiId')";
                    
					if ($conn->query($sql) === TRUE) {
						//echo "New record created successfully";
					} 
					else {
						//echo "Error: " . $sql . "<br>" . $conn->error;
					}
                    
			       $conn->close();
				
				
				
				//redirect to index page
				header('Location: thank.php?action=added');
				exit;

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}

		}

	}

	//check for any errors
	if(isset($error)){
		foreach($error as $error){
			echo '<p class="error">'.$error.'</p>';
		}
	}
	?>

	<form action='' method='post'>
<!--
		<p><label>Title</label><br />
		<input type='text' name='postTitle' value='<?php if(isset($error)){ echo $_POST['postTitle'];}?>'></p>
-->
		<p><label>Description</label><br />
		<textarea name='postDesc' cols='60' rows='22'><?php if(isset($error)){ echo $_POST['postDesc'];}?></textarea></p>
        <p><input type='submit' name='submit' value='Submit'></p>
	</form>

</div>