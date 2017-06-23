<?php 

include_once("php_includes/check_login_status.php");
$sql = "SELECT username, avatar FROM users WHERE avatar IS NOT NULL AND activated='1' ORDER BY RAND() LIMIT 32";
$query = mysqli_query($db_conx, $sql);
$userlist="";
while($row = mysqli_fetch_array($query, MYSQLI_ASSOC)){
	$u = $row["username"];
	$avatar = $row["avatar"];
	$profile_pic = 'user/'.$u.'/'.$avatar;
	$userlist .= '<a href="user.php?u='.$u.' " title= " '.$u.'"><img src="'.$profile_pic.'" alt="'.$u.'"style="width:100px; height:100px; margin:10px;"></a>';
	
}
$sql = "SELECT COUNT(id) FROM users WHERE activated='1'";
$query = mysqli_query($db_conx, $sql);
$row = mysqli_fetch_row($query);
$usercount = $row[0];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Reporters</title>
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="style/style.css">
<script src="js/main.js"></script>
</head>
<body>
<?php include_once("header.php") ?>
	<div id="pageMiddle">
		<h1>Reporters</h1>
		<br/></br/>
		<h3>Total Reporters:<?php echo $usercount; ?> </h3>
	    <h3>Want more newsfeeds from your favourite reporters? Follow them...</h3>
		<?php echo $userlist; ?>
	</div>
<?php include_once("footer.php") ?>
</body>
</html>