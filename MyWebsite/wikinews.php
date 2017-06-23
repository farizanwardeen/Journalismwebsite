<?php
$feed = simplexml_load_file('https://en.wikinews.org/w/index.php?title=Special:NewsFeed&feed=atom&categories=Published&notcategories=No%20publish%7CArchived%7cAutoArchived%7cdisputed&namespace=0&count=15&ordermethod=categoryadd&stablepages=only

');

$limit =15;
$x=1;
?>

<?php
    include_once("php_includes/check_login_status.php");
    include ("header.php");
	echo '<h1>News Articles</h1>';
	echo '<hr>';
	foreach($feed->entry as $item){
		if($x<=$limit){
			$title = $item->title;
			$url = $item->id;
			$description= $item->summary;
			$result=preg_replace('/<a href="(.*?)">(.*?)<\/a>/', "\\2", $description);
			echo '<h3><a href=" ',$url, '">',$title,'</a></h3><br/>';
			echo '<br/>';
			$str = substr($result, strpos($result, 'thumbinner'));
			preg_match_all('/src="([^"]*)"/', $str, $image);
            echo '<img src="'.$image[1][0].'"></img>';
			$removelastsentence = substr($result, 0, strpos($result, '<br style="clear:none;'));		
			$content = preg_replace("/<img[^>]+\>/i", " ", $removelastsentence); 
            echo $content;

			
			if (strlen($content)<4000)
			{
				echo '<div id="blankspaces"></div>';
			}
			//$string = 'Some valid and <script>some invalid</script> text!';
			//$out = delete_all_between('<p><br style="clear:none;', '-->', $result);
			//print($out);
			echo '<br/>';
			echo '<br/>';
			echo '<b>'.'<a href="mediatree.php?name='.$title.'">'.'Generate Timeline'.'</a>'.'</b>';
            echo '<br/>';
			echo '<hr>';
			echo '<br/>';
			require ("newdbc.php");
					$sql = "INSERT INTO wikipedia(id,title,description,image)
					VALUES ('','$title',' " . mysqli_real_escape_string($conn,$content) . "','" . mysqli_real_escape_string($conn,$image[1][0]) . "')";
                    
					if ($conn->query($sql) === TRUE) {
						//echo "New record created successfully";
					} 
					else {
						//echo "Error: " . $sql . "<br>" . $conn->error;
					}
                    
			$conn->close();
	
		}
		$x++;
	}
	include ("footer.php");
?>