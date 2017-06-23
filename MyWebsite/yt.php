<?php
// Autoloader takes care of dependencies
// underscore is used for each directory
// require is used to include the file

//require 'Zend/Loader/Autoloader.php';
//Zend_Loader_Autoloader::getInstance();
//include('bbcvideos.php');
//function getQuery($thumbnailvar,$videoidvar,$titlevar,$authorname,$descriptionarr){
// using the youtube api located at zend/gdata/youtube

require_once 'google-api-php-client-master/src/Google/autoload.php';
require_once 'google-api-php-client-master/src/Google/Client.php';
require_once 'google-api-php-client-master/src/Google/Service/YouTube.php';


function getQuery($newschannel)
{

        $DEVELOPER_KEY = 'AIzaSyCzD6CEjb7FGEI2xJA1h3XGTdsPzCJ5ln0';
        $client = new Google_Client();
        $client->setDeveloperKey($DEVELOPER_KEY);
        //$youtube = new Google_YoutubeService($client);
        $youtube = new Google_Service_YouTube($client);

        	 try {
    $searchResponse = $youtube->playlistItems->listPlaylistItems('id,snippet', array(
      'playlistId' => $newschannel,
      'maxResults' =>  2
    ));

    foreach ($searchResponse['items'] as $searchResult) {
            $videoId = $searchResult['snippet']['resourceId']['videoId'];
			$video_id = $videoId ;
            $videoTitle = $searchResult['snippet']['title'];
			$title = $videoTitle;
            $videoThumb = $searchResult['snippet']['thumbnails']['high']['url'];
            $videoDesc = $searchResult['snippet']['description'];
			
			require ("newdbc.php");
					$sql = "INSERT INTO videos (id,name,code)
					VALUES ('','$title','$video_id')";
                    
					if ($conn->query($sql) === TRUE) {
						echo "New record created successfully";
					} 
					else {
						echo "Error: " . $sql . "<br>" . $conn->error;
					}
                    
			$conn->close();
			
			
            print '<div>'.
                        $videoTitle.'<br/><br/><img src="'.
                        $videoThumb.'" /><br/>'.
                        $videoId.'<br/>'.
                        $videoDesc.'<br/>'.
                        '</div><br/><br/>';
						
			
			
			       
    }
  } catch (Google_ServiceException $e) {
    return;
  } catch (Google_Exception $e) {
    return;
  }





	/*
	$yt=new Zend_Gdata_Youtube();
	$query=$yt->newVideoQuery();
	$query->setMaxResults(3);
	$query->orderBy='published';
	$query->setTime('today');
	$query->author=$newschannel;
	$query->startIndex=1;
	$bbcfeed=$yt->getUserUploads(null,$query);
	*/
	
	
	/*
	if(isset($GET['q']))
	{
		$queryString = $_GET['q'];
	} 
	else
	{
		$queryString=$newsQuery;
	}
    */

	/*Searching youtube*/
   /* 
	// we start the videoquery
	$q = $yt->newVideoQuery();
	// set the query what do we want to look for
	$q->setQuery("$queryString");
	//$q->setQuery("$queryString");
	// set the start index
	$q->setStartIndex(1);
	//
	$q->setMaxResults(3);
	$q->category = 'News';
	$q->setTime('today');
	//$q->getSubscriptionFeed("$queryString");
	//$q->orderBy='viewCount';
    

	//get videofeed of the query
	$feed=$yt->getVideoFeed($q);
	//$feed=$yt->getTopRatedVideoFeed($q); 
	//$bbcfeed=$ytbbc->getUserUploads('bbcnews');
    */
   
	//foreach($bbcfeed as $key=>$value)
	//{

/*	
			$video_id= $value->getVideoId();
			
			
			$author=$value->author[0]->name->text ;
			//$tags= implode(', ', $value->getVideoDeveloperTags());
			//$tags= $value->getVideoDeveloperTags();
			
			//echo 'Tags: ' . implode(", ", $value->getVideoTags()) . "<br />";
			$view_count=$value->getVideoViewCount();
			$thumbnail= $value->mediaGroup->thumbnail[0]->url;
			$date=$value->getUpdated()->getText();
			
			$title=(string) $value->mediaGroup->title;
			//$author=$value->getName();
			//echo $author;
			$desc=(string) $value->mediaGroup->description;
			$yturl='http://www.youtube.com/embed/';
			$videourl=$yturl.$video_id;
*/			
			
			//$published = $value->getPublished();
			
			
			
		   //if($view_count>50){
		//   if (preg_match("/Al Jazeera English|BBC News|Fox News|ABC News|CBS News|NBC News|Reuters|msnbc|RT America|The Young Turks|The New York Times|Reuters Plus|Wall Street Journal|Bloomberg Business|SourceFed|Yahoo News|Sky News|euronews (in English)/",$author)) 
		//   {
		    
				//echo $author;
			/*	
				echo $date;
				echo $author;
				//echo "<p>tags: " . implode(", ", $value->getVideoTags()) . "</p>";
				//echo "<p>{$view_count}</p>";
				echo "\n";
				echo "<a href=watching.php?video_id=".urlencode($video_id)."&titlename=".urlencode($title)."><h2>{$title}</h2>.\n</a>"; 
				//echo nl2br ("<a href='watch.php?id=$id'>$name");
				echo "<p>{$desc}</p>";
				
				//echo "<p>{$video_id}</p>";
				
				//echo "<img src='{$thumbnail}' height='150' />";
				//echo $thumbnail;
				echo "<a href=watching.php?video_id=".urlencode($video_id)."&titlename=".urlencode($title)."><img src='{$thumbnail}' width='560' height='315' /></a>";
				echo "\t";

				//echo "<iframe width=\"560\" height=\"315\" src=\"{$videourl}\" frameborder=\"0\" controls=\"2\" allowfullscreen ></iframe>";
				
				echo "<hr />";
			
			*/
				/****************************************************/
				
			
					
					
				
					
			
					//header("location: index.php?added=$name");

			//	}
				
			
				
				
				/****************************************************/
				
				
				
			 
		  // }
		 
		
	//	}
}

for($i=0;$i<=17;$i++)
{
		if($i==0)
		{
		getQuery('UUoMdktPbSTixAyNGwb-UYkQ');
		}
		elseif($i==1)
		{
		getQuery('UUSrZ3UV4jOidv8ppoVuvW9Q');
		}
		elseif($i==2)
		{
		getQuery('UU_gE-kg7JvuwCNlbZ1-shlA');
		}
		elseif($i==3)
		{
		getQuery('UUczrL-2b-gYK3l4yDld4XlQ');
		}
		elseif($i==4)
		{
		getQuery('UUXIJgqnII2ZOINSWNOGFThA');
		}
		elseif($i==5)
		{
		getQuery('UUBi2mrWuNuyYy4gbM6fU18Q');
		}
		elseif($i==6)
		{
		getQuery('UCke8IDgVuX-Xc60T_abqdZg');
		}
		elseif($i==7)
		{
		getQuery('UUK7tptUDHh-RYDsdxO1-5QQ');
		}
		elseif($i==8)
		{
		getQuery('UUqnbDFdCpuN8CMEg0VuEBqA');
		}
		elseif($i==9)
		{
		getQuery('UUUMZ7gohGI9HcU9VNsr2FJQ');
		}
		elseif($i==10)
		{
		getQuery('UUeY0bbntWzzVIaj2z3QigXg');
		}
		elseif($i==11)
		{
		getQuery('UU8p1vwvWtl6T73JiExfWs1g');
		}
		elseif($i==12)
		{
		getQuery('UUaXkIU1QidjPwiAYu6GcHjg');
		}
		elseif($i==13)
		{
		getQuery('UUhqUTb7kYRX8-EiaN3XFrSQ');
		}
		elseif($i==14)
		{
		getQuery('UU1yBKRuGpC1tSM73A0ZjYjQ');
		}
		elseif($i==15)
		{
		getQuery('UUNye-wNBqNL5ZzHSJj3l8Bg');
		}
		elseif($i==16)
		{
		getQuery('UUupvZG-5ko_eiXAupbDfxWw');
		
		}
		else
		{
		getQuery('UU16niRr50-MSBwiO3YDb3RA');
		}

}

//getQuery('UUupvZG-5ko_eiXAupbDfxWw');
?>

