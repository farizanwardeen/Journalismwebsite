<?php
//if(isset($_SESSION['user_name'])){$name =$_SESSION['user_name'];  }
if(isset($_POST['name'])){ $postername = $_POST['name'];} 
if(isset($_POST['comment'])){ $comment = $_POST['comment']; } 
if(isset($_POST['videosid'])){ $videosid =$_POST['videosid'];  } 
if(isset($_POST['submit'])){ $submit = $_POST['submit'];  } 

//$videoid = $_GET['id'];


if (isset($_POST['submit']))
{
  
	if( isset($_POST['comment']) && isset($_POST['name']))
	{
		
	    require ("newdbc.php");
		$insert = "INSERT INTO videocomments (id,name,comment,videoid)
					VALUES ('','$postername','$comment','$videosid')";
		
		
        if ($conn->query($insert) === TRUE) {
						//echo "New record created successfully";
					} 
					else {
						//echo "Error: " . $insert . "<br>" . $conn->error;
					}
		
		$conn->close();
		//header("location:readcomment.php?id=".$videoid);
		 header("Location:success.php");
		//header("Location:watching.php?id=".$videoid);
	}
	else
	{
		echo "Please fill out all the fields";
	}
}


?>





