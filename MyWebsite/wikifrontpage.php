<?php
include_once("php_includes/check_login_status.php");
include('header.php');
require("newdbc.php");
$find_article=mysqli_query($conn,"SELECT * FROM wikipedia ORDER BY id DESC LIMIT 12");
?>
<!--creating the More Features Layout-->
            <div class="row" id="featuresHeading">
                <!--col-12 for spaning the full width of the browser-->
                <div class="col-12">
                    <h2>News Articles</h2>
					<hr>
                </div><!--end col-12-->
            </div><!--end featuresHeading-->
<?php 
$count=1;
echo '
<div class="row" id="featuresHeading">
<!--col-12 for spaning the full width of the browser-->
<div class="col-12">';
while($row=mysqli_fetch_assoc($find_article))
{  
	$id=$row['id'];
	$title=$row['title'];
	$image= $row['image'];
	$description= $row['description'];
	/*
	echo '<h3>'.$title.'</h3>'.'<br/>';
	echo '<img src="'.$image.'"></img>';
	echo $description.'<br/>';
	echo '<br/>';
	echo '<br/>';
	*/
?>

<div class="row" id="features">
                <!--bootstrap3 class that allows us to have a column -->
                <!--the 3 boxes are 4 columns wide each .. if you need 3 sections 12/4=3 (12 is the full width)-->
                <!--maintains layout even when it is small that is why col-sm-->
                <div class="col-sm-4 feature">
                    <!--panel is a boostrap3 class-->
                    <div class="panel">
                        <!--Having heading at the top, the top bar with the grey background-->
                        <div class="panel-heading" style="height:50px;">
                            <!--part of the panel component-->
                            <h3 class="panel-title"><?php echo $title; ?></h3>
                         </div><!--end panel-heading-->
                         <!--adding image and a badge called HTML5-->
                         <!--class-"img-circle" converts a squre image into a circle-->
                         <img src="<?php echo $image;?>" alt="HTML5" class="img-rounded" style="height:200px; width:250px;">
                         <!--adding the text for the panel-->
                        
                         <!--we add a button-->
                         <!--target="_blank" opens in a new window-->
                         <!--btn btn-warning btn-block is css bootstrap class give an orange button-->
                          <a href="/websitecopy8/MyWebsite/wikiedit.php?id=<?php echo $id;?>" target="_blank" 
                         class="btn btn-warning btn-block"> Read More </a>
                    </div><!--end panel-->
                </div><!--end col-sm-4 feature-->
	
<?php	
	if($count == 3 || $count == 6|| $count == 9){
		echo ' </div><!--end features--> ';
		echo '</div><!--end col-12-->';
        echo '</div><!--end featuresHeading-->';
		echo '<hr>';
	}
	$count++;
}
?>
          


           

<?php 
include('invisiblefooter.php');
?>
