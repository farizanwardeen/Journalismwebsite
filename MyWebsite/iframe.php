<?php
include_once("php_includes/check_login_status.php");
include('header.php');
$idval=$_GET["id"];
?>

<h2>Edit Article</h2>
<div id="wrapper3">
			<div id="webpage1" style="float:left">
			    <?php 
				    $url1="/websitecopy8/MyWebsite/wikiedit.php?id=".$idval;
					
					$url2="/websitecopy8/MyWebsite/editpage.php?id=".$idval;
					
				?>
				<iframe src="<?php echo $url1; ?>" width="600" height="700"></iframe>
			</div>
			<div id="webpage2" style="float:left">
				<iframe src="<?php echo $url2; ?>" width="600" height="700"></iframe>
			</div>
</div>
<?php		
include('invisiblefooter.php');
?>
