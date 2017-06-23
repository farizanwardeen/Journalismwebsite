<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Embed Videos From Link Tutorial</title>
</head>
<body>
<?php 
include_once("php_includes/check_login_status.php");
include_once("header.php"); ?>
<h1>Submit youtube videos</h1>
<p>
<form action="addvideo.php" method="POST">
	<input type="text" name="name" placeholder="Video Name..."/><br/>
	<input type="text" name="link" placeholder="Share Link"><br/>
	<input type="submit" value="Share!">
</form>
<?php if(isset($_GET['added'])){$added=$_GET['added'];echo "Added $added to the video list";} ?>
</p>
<?php include_once("invisiblefooter.php"); ?>
</body>
</html>