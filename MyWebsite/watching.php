<?php 
include_once("php_includes/check_login_status.php");
include("header.php");
require("newdbc.php");

$id=$_GET['id'];
$newid= $_GET['id'];
$find_video=mysqli_query($conn,"SELECT * FROM videos WHERE id='$id'");
while($row=mysqli_fetch_assoc($find_video))
{
	$name=$row['name'];
	$code=$row['code'];
	
}


?>
<title><?php echo $name; ?></title>
<div class="container" id="main">
		<div class="row videoalignment">
		<!--col-12 for spaning the full width of the browser-->
           <!--     <div class="col-12"> -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <h1><?php echo $name; ?></h1>
					
                </div><!--end col-12-->
		</div><!--end row videoalignment-->
		
		<div class="row videoalignment" >
		<!--col-12 for spaning the full width of the browser-->
                <!-- <div class="col-12"> -->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <iframe width="860" height="515" src="http://www.youtube.com/embed/<?php echo $code ?>" frameborder="0" allowfullscreen></iframe>
                </div><!--end col-12-->
		</div><!--end row videoalignment-->
		
			<!--
			<table border="0"  style="width:75%" align="center" cellpadding="10">
			<tr>
			<td>
			-->
			

    
		

		<!-- Including twitter results-->


		<?php 
		
		    echo '<div id="alignnews">';
				include('googlenewsalt.php');
				echo '<h1>Related News Stories</h1>';
				getKeyWord($name);
			echo '</div><!--end alignnews-->';
			
		?>
		
		
		<?php 
		/*
		echo '<h1>Comments</h1>';

		echo '<div id=created>';
		$videoid=$id;
		include('read.php');
		echo '</div>';
		echo '<div id=result>';


		echo '</div>';
        */
		?>
		<br/>
		<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Comments </h1>
		<?php
			if($user_ok == false)
			{   
				echo '
					<div class="row " id="signuptext">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">							
							<p>
								You must be <a href="signin.php">signed in</a> to post a comment. You can also <a href="signup.php">sign up</a> for an account.
							</p>
						</div><!--end col-12-->
					</div><!--end signuptext-->
			';
				
			}
			else
			{
				echo '
					 <div class="container" id="formsubmission">
					  <form role="form" action="commentindex.php" method="post" class="ajax " id="contactform" name="contactform" >
					  <div class="form-group">
				';
                echo '<input class="form-control" type="hidden" name="name" id="name" value=" '. $_SESSION['username'].'" /> ';
                echo '				
						  <textarea class="form-control" rows="5" id="comment" name="comment" placeholder="Your comment..."></textarea>
						</div><!--end form-group -->
						<div class="form-group">
						<input class="form-control" type="submit" name="submit" id="submit" value="Post" style="font-family: sans-serif; font-size: 25px; font-weight: bold; ">
			    ';
				echo '<input class="form-control" type="hidden" name = "videosid" id="videosid" value="'.$newid.'" /> ';
				echo'
						</div><!--end form-group -->
					  </form>
					</div><!--end container-->
				';
		    }
        ?>
		
		<div class="row " id="aligncomments">
		<!--col-12 for spaning the full width of the browser-->
		        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="created">
                <!-- <div class="col-12" id=created> -->
					
                    <?php 
						$videoid=$id;
						include('read.php');
                    ?>
				</div><!--end col-12-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="result">
                

		        </div><!--end col 12 result-->
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" id="endofpage">


		        </div><!--end col 12 result-->
				
		</div><!--end comments-->
        <!--
		</td>
		</tr>
		</table>
		-->
</div><!--end container-->
<?php include("invisiblefooter.php"); ?>
