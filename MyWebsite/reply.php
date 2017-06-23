<form method="post" action="reply.php?id=5">
    <textarea name="reply-content"></textarea>
    <input type="submit" value="Submit reply" />
</form>
<?php
//create_cat.php
include_once("php_includes/check_login_status.php");
include 'forumconnect.php';
include 'header.php';
$sessionname= $_SESSION['username'];
$getuserid= mysqli_query($con,"SELECT * FROM forumusers WHERE user_name='$sessionname'");

			
while($row=mysqli_fetch_assoc($getuserid))
{
	$userid=$row['user_id'];
				
}

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//someone is calling the file directly, which we don't want
	echo 'This file cannot be called directly.';
}
else
{
	//check for sign in status
	if($user_ok == false)
	{
		echo 'You must be signed in to post a reply.';
	}
	else
	{
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						" . mysqli_real_escape_string($con, $_GET['id']) . ",
						" . $userid . ")";
						
		$result = mysqli_query($con, $sql);
						
		if(!$result)
		{
			echo 'Your reply has not been saved, please try again later.';
		}
		else
		{
			echo 'Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}
	}
}

//include 'footer.php';
?>