<?php 
//Checks if the user is logged in
include_once("php_includes/check_login_status.php");
//creating a connection to the database 
require("newdbc.php");
// sql query to get the video id, title etc
$find_videos=mysqli_query($conn,"SELECT * FROM videos ORDER BY id DESC LIMIT 100");
$count=1;

//the header file
include ("header.php");
echo '<div class="bigheader"><b><h2>Most Recent</h2></b> <hr></div>';

//fetching all the video ids, names and code.
while($row=mysqli_fetch_assoc($find_videos))
{  
	$id=$row['id'];
	$name=$row['name'];
	$code=$row['code'];
	$yturl='http://www.youtube.com/embed/';
	$videourl=$yturl.$code;
	
	// Displaying video title and thumbnail in html making a div for the first 11 videos
	if($count<12)
	{
		
		if($count<6)
		{			
			if($count==1)
			{
				echo "<div class=\"row\" id=\"mostRecent\">";
					echo "<div class=\"col-12\"> ";
						echo "<div class=\"thumbnails row \">";		
							echo " <div class=\"col-xs-6 col-sm-6 col-md-6 col-lg-6\">";
								echo "<div class=\"caption tablecell1\">";
									// displaying the title of the video
									echo "<h4><a href='watching.php?id=$id' id='recentcaption'>$name</a></h4>";
								echo "</div><!--end caption-->"; 
								// displaying the video thumbnail
								echo  "<a href='watching.php?id=$id'> <img class=\"img-responsive recentpicture thumbimages\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='870' height='715' ></a>";
										//echo        "</div><!--end thumbnail-->";	
							echo        "</div><!--end col-6-->";
					
			}
			elseif($count==2||$count==4)
			{
							echo"<div class=\"col-xs-3 col-md-3 col-lg-3 mostrecentside\">"; 
								echo "<div class=\"tablecell2\">";
									// displaying the title
									echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
								echo "</div><!--end tablecell2-->"; 
								//displaying the video
								echo "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages \" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='344' height='350'></a>";		
								echo "<hr>";
			}
			else
			{
								echo "<div class=\"tablecell2\">";
									//displaying the title of the video
									echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
								echo "</div><!--end tablecell2-->"; 
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='344' height='350' ></a>";
								
							echo    "    </div><!--end col-3--> ";
						
				if($count==5)
				{
						echo "</div><!--end thumbnails row-->";
					echo "</div><!--end col-12-->";
				echo "</div><!--end moreSomething-->";
				}
					
					
			}
					
					
		}
				else
				{
					if($count==6 || $count==9)
					{
					
					echo "<div class=\"row tablecontainer\" id=\"moreRecent\">";
						echo "       <div class=\"col-12\"> ";
							echo "<div class=\"thumbnails row\">";
							
							echo " <div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\">";
								echo "<div class=\"caption tablecell3\">";
									echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
								echo "</div><!--end caption-->"; 
								//echo"<div class=\"thumbnail\">";
									echo  "<a href='watching.php?id=$id'> <img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='570' height='315' ></a>";
								//echo "</div><!--end thumbnails-->";			
							
							echo        "</div><!--end col 4-->";	
							
					}
					elseif($count==8 || $count==11)
					{
						 echo	"<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\">"; 
				
							echo "<div class=\"caption tablecell3\">";
								echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
							echo "</div><!--end caption-->"; 
						  
							//echo"<div class=\"thumbnail\">";
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='570' height='315'></a>";
							//echo "</div><!--end thumbnail-->";	
						echo    "    </div><!--end col-4--> ";
							echo "</div><!--end thumbnails row-->";
							echo "</div><!--end col-12-->";
							echo "</div><!--end moreRecent-->";	
							
							
						if($count==11)
						{
						 mostPopular($id);
						}
					}
					else
					{
						echo	"<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\">"; 
				
							echo "<div class=\"caption tablecell3\">";
								echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
							echo "</div><!--end caption-->"; 
							//echo"<div class=\"thumbnail\">";
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='570' height='315'></a>";
							//echo "</div><!--end thumbnail-->";	
						echo    "    </div><!--end col-4--> ";
						
					}
					
				
				}
				
			   
			}
			else
			{
				if($count==12)
				{
					echo "<div class=\"row\" id=\"moreSomething\">";
						echo " <div class=\"col-12\"> ";
							echo "<div class=\"thumbnails row\">";
								echo " <div class=\"col-xs-9 col-sm-9 col-md-9 col-lg-9 \">";
									echo "<p class='paraheader'>Other Stories</p>";
				}					
									echo "<div class=\"row otherstoriesborder\" >";
										echo " <div class=\"col-xs-5 col-sm-5 col-md-5 col-lg-5 \">";
											echo  "<a href='watching.php?id=$id'> <img class=\"img-responsive otherstoriesspace\" src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='370' height='115' ></a>";
										echo        "</div><!--end col-5-->";	
										
										
										echo " <div class=\"col-xs-7 col-sm-7 col-md-7 col-lg-7 otherstoriestext\">";
											echo "<div class=\"caption otherstoriestext2\">";
												echo "<h4><a href='watching.php?id=$id' class='otherstoriestext'>$name</a></h4>";
											echo "</div><!--end caption-->"; 
										echo        "</div><!--end col-7-->";
									echo "</div><!--end row-->";
									
				if($count==100)
				{
								echo        "</div><!--end col-9-->";
								
								echo	"<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">"; 
									echo "<p class='paraheader trendster'>Trending Stories</p>";
									trend($id,$name,$code);
				}
				
				
				
								//echo	"<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">"; 
								//	echo "<p class='paraheader trendster'>Trending Stories</p>";
				
			}
						
			$count++;
		 
}
		
		/* Trending Videos */
		function trend($id,$name,$code)
		{
		 
								/***** Video Repeats for Trending Video Demo*****/
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Robin Thicke blurred lines copyright</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9gfeX5fSawM/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Bob Marley son arrested</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/Q7RWawAd1lg/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>ISIS attack with missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/9qBTG-j75xs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Muslim man in the news</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/evCt34o3TRk/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Vladmir Putin injured in accident</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/jEzMidpXbPw/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Police attack teen</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/bnejiMAXhVc/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Marliyn Monroe look alike</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/4R8OFOrPOUs/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>In prison for 10 years</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/aZvzeeUgHzU/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>North Korea fires missiles</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/UYGsmPx3Az8/mqdefault.jpg\" width='370' height='115'></a>";
										
										echo "<div class=\"caption\">";
											echo "<h4><a href='watching.php?id=$id'>Burglar Alert</a></h4>";
										echo "</div><!--end caption-->";
										
										echo    "<a href='watching.php?id=$id'><img class=\"img-responsive\" src=\"https://i.ytimg.com/vi/SezdTryoM5I/mqdefault.jpg\" width='370' height='115'></a>";
										
										
										
								/*************************** Video Repeats for Trending videos*****************************/
									
								echo    "    </div><!--end col-3--> ";
								
			
							echo "</div><!--end thumbnails row-->";
						echo "</div><!--end col-12-->";
					echo "</div><!--end moreSomething-->";
			
			
		}
		/***********************************************/
		
		
		
		
		/******************************************************************************************************/
			// Most Popular Placeholder
			function mostPopular($id)
			{
				echo"<div class='bigheader'><b><h2>Most Popular</h2></b></div>";
				echo "<hr>";
				echo "<div class=\"row\" id=\"moreSomething\">";
					echo "       <div class=\"col-12\"> ";
						echo "<div class=\"thumbnails row\">";
							
							echo	"<div class=\"col-xs-4 col-sm-4 col-md-4 col-lg-4\">"; 
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>Islamic State's toxic chlorine gas bombs</a></h4>";
								echo "</div><!--end caption-->"; 
					
					
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/MsZhf2OnMKQ/mqdefault.jpg\" width='450' height='350'></a>";
					
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>Jeremy Clarkson suspension: James May says dust-up is not that serious</a></h4>";
								echo "</div><!--end caption-->"; 
				  
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/428vs0E4Ye4/mqdefault.jpg\" width='450' height='350'></a>";
					
							echo    "    </div><!--end col-4--> ";
						
						
							echo " <div class=\"col-xs-8 col-sm-8 col-md-8 col-lg-8\">";
							    //echo"&nbsp";
								//echo"<br /><br />";
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id' class='popularcaption'>Nasa tests enormous rocket booster</a></h4>";
								echo "</div><!--end caption-->"; 
						        //echo"&nbsp";
						        //echo"<br /><br />";
								echo  "<a href='watching.php?id=$id'> <img class=\"img-responsive  thumbimages popularpicture\" src=\"https://i.ytimg.com/vi/Q5r5BNWkSuI/mqdefault.jpg\" width='870' height='615' ></a>";		
							echo"</div><!--end col-8-->";		
					
					
						echo "</div><!--end thumbnails row-->";
					echo "</div><!--end col-12-->";
				echo "</div><!--end moreSomething-->";
				
				echo "<div class=\"row\" id=\"moreSomething\">";
					echo "       <div class=\"col-12\"> ";
						echo "<div class=\"thumbnails row\">";
							echo " <div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">";
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>Apple watches are in stores now so go get it</a></h4>";
								echo "</div><!--end caption-->"; 
								
								echo  "<a href='watching.php?id=$id'> <img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/CABOtzT7008/mqdefault.jpg\" width='270' height='115' ></a>";
									
						
						    echo"</div><!--end col-3 -->";	
						
							echo"<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">"; 
							
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>Some news network and it is bbc news network</a></h4>";
								echo "</div><!--end caption-->"; 
							  
							
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/NglaaQSARLY/mqdefault.jpg\" width='270' height='115'></a>";
								
				   
							echo    "    </div><!--end col-3--> ";
					
					
							echo	"<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">"; 
					
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>crazy bulls on a roll something happened</a></h4>";
								echo "</div><!--end caption-->"; 
					  
						
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/DxCSY91D4Rc/mqdefault.jpg\" width='270' height='115'></a>";
					
							echo    "    </div><!--end col-3--> ";
					
			

							echo	"<div class=\"col-xs-3 col-sm-3 col-md-3 col-lg-3\">"; 
					
								echo "<div class=\"caption\">";
									echo "<h4><a href='watching.php?id=$id'>China: Father continues search for abducted son </a></h4>";
								echo "</div><!--end caption-->"; 
							  
								echo    "<a href='watching.php?id=$id'><img class=\"img-responsive thumbimages\" src=\"https://i.ytimg.com/vi/1UXCloibEeQ/mqdefault.jpg\" width='270' height='115'></a>";
							   
							echo    "</div><!--end col-3--> ";
					
						echo "</div><!--end thumbnails row-->";
					echo "</div><!--end col-12-->";
				echo "</div><!--end moreSomething-->";					
					 
				echo"<hr>";
			}	
			/******************************************************************************************************/
		
		
		
		
		
		
		
		include ("footer.php");
?>

