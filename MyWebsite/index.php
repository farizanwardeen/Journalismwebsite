<?php 
include_once("php_includes/check_login_status.php");
include ("header.php");

?>

<br/>

 <!--Coding the Tab Markup.. for coding tabs-->
            <div class="row" id="moreInfo">
             <!--adding 6 column frame-->
                <div class="col-sm-6 ">
                    <h3>News Articles</h3>
                    <div class="list-group indexfeed">
						<?php
						
						require("newdbc.php");
						$find_article=mysqli_query($conn,"SELECT * FROM wikipedia ORDER BY id DESC LIMIT 7");
						while($row=mysqli_fetch_assoc($find_article))
						{  
							$id=$row['id'];
							$title=$row['title'];
							$image= $row['image'];
							$description= $row['description'];
						?>
						<?php
						
						?>
                        <!--initiating a list group item-->
                        <a href="/websitecopy8/MyWebsite/wikiedit.php?id=<?php echo $id;?>" class="list-group-item">
						    <img src="<?php echo $image?>" style="height:50px; width:50px; float:left; padding-right:5px;"></img>
                            <h4 id="list-group-item-heading"><?php echo $title; ?></h4>
                        </a>
						<?php 
						}
						?>

                    </div> <!--end list-group-->
                </div><!--end col-sm-6 -->
                <!--coding the typography section-->
                <div class="col-sm-6 ">
                    <h3>News Videos</h3>
                    <!--adding the custom content list group-->
                    <div class="list-group indexfeed">
					
					<?php 
						require("newdbc.php");
						$find_videos=mysqli_query($conn,"SELECT * FROM videos ORDER BY id DESC LIMIT 7");
						while($row=mysqli_fetch_assoc($find_videos))
						{  
								$id=$row['id'];
								$name=$row['name'];
								$code=$row['code'];
								$yturl='http://www.youtube.com/embed/';
								$videourl=$yturl.$code;
						?>
                        <!--initiating a list group item-->
                        <a href="/websitecopy8/MyWebsite/watching.php?id=<?php echo $id;?>" class="list-group-item">
                            <img src="https://i.ytimg.com/vi/<?php echo $code;?>/mqdefault.jpg" style="height:50px; width:50px; float:left; padding-right:5px;"></img>
							<h4 id="list-group-item-heading"><?php echo '&nbsp;'.$name;?></h4>
                        </a>
					<?php 
					
						}
					?>
					
                    </div> <!--end list-group-->
                </div><!--end col-sm-6 -->
            </div><!--end moreInfo-->
			
			
			
			 <!--Coding the Tab Markup.. for coding tabs-->
            <div class="row" id="moreInfo">
             <!--adding 6 column frame-->
                <div class="col-sm-6 ">
                    <h3>News Blogs</h3>
                    <div class="list-group indexfeed">
						
                        <!--initiating a list group item-->
                        <a href="/websitecopy8/MyWebsite/newsblog/index.php" class="list-group-item">
                            <img src="images/blog.png" style="height:50px; width:50px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Obama Meets Raul Castro in an Historic Event</h4>
                        </a>
						<!--initiating a list group item-->
                        <a href="/websitecopy8/MyWebsite/newsblog/index.php" class="list-group-item">
                            <img src="images/blog.png" style="height:50px; width:50px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Donald Trump is Running for President</h4>
                        </a>
						
						<a href="/websitecopy8/MyWebsite/newsblog/index.php" class="list-group-item">
                            <img src="images/blog.png" style="height:50px; width:50px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Nasa finds water in Mars</h4>
                        </a>
						
						<a href="/websitecopy8/MyWebsite/newsblog/index.php" class="list-group-item">
                            <img src="images/blog.png" style="height:50px; width:50px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Need more gun control laws</h4>
                        </a>
						
                    </div> <!--end list-group-->
                </div><!--end col-sm-6 -->
                <!--coding the typography section-->
                <div class="col-sm-6 ">
                    <h3>News Forum</h3>
                    <!--adding the custom content list group-->
                    <div class="list-group indexfeed">
					
                        <!--initiating a list group item-->
                        <a href="/websitecopy8/MyWebsite/forumindex.php" class="list-group-item">
                            <img src="images/f.png" style="height:50px; width:70px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Presidential Polls</h4>
                        </a>
						<a href="/websitecopy8/MyWebsite/forumindex.php" class="list-group-item">
                            <img src="images/f.png" style="height:50px; width:70px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Canada Elections on October 19th</h4>
                        </a>
						<a href="/websitecopy8/MyWebsite/forumindex.php" class="list-group-item">
                            <img src="images/f.png" style="height:50px; width:70px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Cecil the Lion Killed in Africa</h4>
                        </a>
						<a href="/websitecopy8/MyWebsite/forumindex.php" class="list-group-item">
                            <img src="images/f.png" style="height:50px; width:70px; float:left; padding-right:5px;"></img><h4 id="list-group-item-heading">Obama says Americans need more gun control law</h4>
                        </a>
					
                    </div> <!--end list-group-->
                </div><!--end col-sm-6 -->
            </div><!--end moreInfo-->
			
			

<?php include("invisiblefooter.php") ?>