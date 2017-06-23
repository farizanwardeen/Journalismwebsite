<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Embed Videos From Link Tutorial</title>
</head>
<body>
<h1>           </h1>
<p>
	<?php 
		// check the duration and remove anything less that 0.10 
		
		//include("username.php");
		//function read(){
		require("newdbc.php");
		$find_videos=mysqli_query($conn,"SELECT * FROM videos ORDER BY id DESC LIMIT 10");
		$count=1;
		
		include ("header.php");
		//echo "<table border=\"0\"  style=\"width:75%\" align=\"left\" cellpadding=\"10\" >";
		//echo "<tr>";
		echo "<div class=\"row\" id=\"moreCourses\">";
		echo "       <div class=\"col-12\"> ";
        echo "<div class=\"thumbnails row\">";
		while($row=mysqli_fetch_assoc($find_videos))
		{  
		  //if($count<50){
				$id=$row['id'];
				$name=$row['name'];
				$code=$row['code'];
				$yturl='http://www.youtube.com/embed/';
				$videourl=$yturl.$code;
				//echo nl2br ("<h1><a href='watching.php?id=$id'>$name.\n</a></h1>");
				//echo nl2br("<a href='watching.php?id=$id'><img src='https://i.ytimg.com/vi/$code/0.jpg' width='560' height='315' />.\n</a>");
				
				
				if($count % 2 != 0){
				/*
				
					echo nl2br ("<td><h2><a href='watching.php?id=$id'>$name.\n</a></h2>");
					echo nl2br ("<a href='watching.php?id=$id'><img src='https://i.ytimg.com/vi/$code/0.jpg' width='560' height='315' />.\t</a></td>");
					
				*/
				
				//echo "<hr>";
				
        //coding the thumbnail
		
						if (strlen($name) >=100)
						{
						$name = substr($name, 0, 100);
						}
						else
						{
						//strlen($name);
						$value=100-strlen($name);
						//$name = str_pad($name,$value,'.&nbsp;');
						$name = str_replace('~', '&nbsp;', str_pad($name,$value, '~'));
						//$name=$name.str_repeat('&nbsp;', $value);
						}
                    echo " <div class=\"lg-col-6\">";
					echo "<div class=\"caption\">";
					echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
					echo "</div><!--end caption-->"; 
					echo           " <div class=\"thumbnail\">";
			        echo  "<a href='watching.php?id=$id'> <img src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='560' height='315' ></a>";     
					echo        " </div>";
                    echo        "</div>";			
				
				
					
				}
				else{
				/*
					echo nl2br ("<td><h2><a href='watching.php?id=$id'>$name.\n</a></h2>");
					echo nl2br ("<a href='watching.php?id=$id'><img src='https://i.ytimg.com/vi/$code/0.jpg' width='560' height='315' />.\t</a></td>");
					
					echo "</tr>"; */
			    if (strlen($name) >=100)
				{
						$name = substr($name, 0, 100);
				}
				else
				{
						//strlen($name);
						$value=100-strlen($name);
						$name = str_replace('~', '&nbsp;', str_pad($name,$value, '~')); 
						//$name = str_pad($name,$value,".");
						//$name=$name.str_repeat('&nbsp;', $value);
				}
                				
				echo	"<div class=\"lg-col-6\">"; 
				echo "<div class=\"caption\">";
                echo "<h4><a href='watching.php?id=$id'>$name</a></h4>";
                echo "</div><!--end caption-->";
                echo     "       <div class=\"thumbnail\">";
                //echo    "<a href='watching.php?id=$id'><img src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='560' height='315'></a>";
				echo    "<a href='watching.php?id=$id'><img src=\"https://i.ytimg.com/vi/$code/mqdefault.jpg\" width='560' height='315'></a>";
                
			    echo     "       </div><!--end thumbnail--> ";
                echo    "    </div><!--end col-6--> ";
				
				}
				
				
				$count++;
		 // 	}
		}
		//}
	echo "</div><!--end thumbnails row-->";
	echo "</div><!--end col-12-->";
	echo "</div><!--end moreCourses-->";
		//echo "</table>";
		include ("footer.php");
	?>
</p>
</body>
</html>