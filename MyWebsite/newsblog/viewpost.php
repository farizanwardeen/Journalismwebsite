<?php include_once("../php_includes/check_login_status.php"); ?>
<?php require('configincludes/newconfig.php'); 


?>
<?php include ("../header.php"); ?>


	<div id="wrapper">

		<h1>Blog</h1>
		<hr />
		<p><a href="./">Blog Index</a></p>


		<?php
			try {
				
				$stmt = $db->prepare('SELECT postID, postTitle, postCont, postDate FROM blog_posts WHERE postID = :postID');
				$stmt->execute(array(':postID' => $_GET['id']));
				$row = $stmt->fetch();

				//if post does not exists redirect user.
				if($row['postID'] == ''){
					header('Location: ./');
					exit;
				}
				echo '<div>';
					echo '<h1>'.$row['postTitle'].'</h1>';
					echo '<p>Posted on '.date('jS M Y', strtotime($row['postDate'])).'</p>';
					echo '<p>'.$row['postCont'].'</p>';				
				echo '</div>';
			} 
			catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>

<?php include ("blogfooter.php"); ?>