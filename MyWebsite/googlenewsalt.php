<?php
function getKeyWord($name)
{
$chars = 200; /* Characters in the news story */

//$sterm = $_GET['q']; /* Search term */
$sterm= $name;

/* alternatively, $sterm = "your+term+here"; */

$news = simplexml_load_file('https://news.google.com/news/feeds?hl=en&gl=ca&q='.$sterm.'&um=1&ie=UTF-8&output=rss'); /* URL of Google News RSS feed*/

$feeds = array();

$i = 0;

foreach ($news->channel->item as $item) 
{
    if ($i < 5) {
        preg_match('@src="([^"]+)"@', $item->description, $match);
        $parts = explode('<font size="-1">', $item->description);

        $feeds[$i]['title'] = mb_convert_encoding((string) $item->title, "HTML-ENTITIES", "UTF-8");
        $feeds[$i]['link'] = (string) $item->link;
        $feeds[$i]['story'] = mb_convert_encoding(strip_tags($parts[2]), "HTML-ENTITIES", "UTF-8");
		if(!empty($match))
		{
			$feeds[$i]['image'] = $match[1];
			//echo  $feeds[$i]['image'];
			//echo '<img src="http:' . $feeds[$i]['image'] . '" />';
		}
		else
		{
			$feeds[$i]['image'] = "";
		}
        
        $stringCut = substr($feeds[$i]['story'], 0, $chars);
        $feeds[$i]['story'] = substr($stringCut, 0, strrpos($stringCut, ' ')).' ...<br /><a class="rmorelink" href="'.$feeds[$i]['link'].'">Read More »</a>';         
        
        $feeds[$i]['date'] = (string) $item->pubDate;
        echo '<div class="news">';
			echo '<img class="picture" src="http:' . $feeds[$i]['image'] . '" />';
				echo '<div class="newsarticle"><a href="';
				print($feeds[$i]['link']);
				echo '" taget="_blank"><b>';
				print($feeds[$i]['title']);
				echo '</b></a><br />';
				print($feeds[$i]['story']);
					echo '<div id="date"><h5>';
						print($feeds[$i]['date']);
					echo '</h5></div>';
				echo '</div>';
			//echo '</div><!--end something-->';
		echo '</div><!--end news-->';
		
        //echo "__________________________";
        $i++;
    }
}
}

?>