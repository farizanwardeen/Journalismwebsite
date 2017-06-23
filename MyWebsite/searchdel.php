<?php
include_once("php_includes/check_login_status.php");
include('header.php');
require("newdbc.php");

if(isset($_GET['keywords'])){
	$keywords = $conn->escape_string($_GET['keywords']);
	$query=$conn->query("
		Select title, id
		FROM wikipedia
		WHERE title LIKE '%{$keywords}%'
	");
?>

	<div class ="result-count"></div>
		Found <?php echo $query->num_rows; ?> results.
	<?php
	
	if($query->num_rows)
	{
		while($r = $query->fetch_object()){
		?>
			<div clss="result">
				<a href="http://localhost/websitecopy8/MyWebsite/wikiedit.php?id=<?php echo $r->id; ?>"><?php echo $r->title; ?></a>
			</div>
		<?php 
		}
	}
}


?>
<?php 
include('invisiblefooter.php');
?>