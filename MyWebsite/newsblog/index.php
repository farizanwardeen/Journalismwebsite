<?php include_once("../php_includes/check_login_status.php"); ?>
<?php require('configincludes/newconfig.php'); ?>
<?php include ("../header.php"); ?>


	<div id="wrapper">

		<h1><b>News Blogs</b></h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postID, postTitle, postDesc, postDate FROM blog_posts ORDER BY postID DESC');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h3><a href="viewpost.php?id='.$row['postID'].'">'.$row['postTitle'].'</a></h3>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postDate'])).'</p>';
						echo '<p>'.$row['postDesc'].'</p>';				
						echo '<p><a href="viewpost.php?id='.$row['postID'].'">Read More</a></p>';				
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>
<?php include ("blogfooter.php"); ?>