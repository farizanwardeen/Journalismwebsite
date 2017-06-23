<?php
require_once 'library/twitteroauth.php';
 
define('CONSUMER_KEY', '1KTA8CZ5bquJwYnDk4gFSOlnr');
define('CONSUMER_SECRET', '2lB07Rs5U6sbIaE85tR932dnZmxGM62aGkScqeNBzdIl9JSDmS');
define('ACCESS_TOKEN', '2842587357-lQV1KZjrx9zZ2CcpXBAaeVCnx4DGXc2Yx77rkGi');
define('ACCESS_TOKEN_SECRET', '29cNxfiqLqh1YVDzLuq76VOfy0OmYJFzNjLv6zKImwM8K');
 
function search(array $query)
{
  $toa = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, ACCESS_TOKEN, ACCESS_TOKEN_SECRET);
  return $toa->get('search/tweets', $query);
}

function getKeyWord($keyword)
{
$i=0;
/********Filtering stop words*************/
$string = strtolower($keyword);
$stopwords = array('i','a','about','an','and','are','as','at','be','by','com','de','en','for','from','how','in',"is",'it','la','of','on','or','that','the','this','to','was','what','when','where','who','will','with','und','the','www','too');
foreach ($stopwords as &$word) {
    $word = '/\b' . preg_quote($word, '/') . '\b/';
}
$tempkeyword= preg_replace($stopwords, '', $string);
$removedspacestring=ltrim($tempkeyword);
$newkeyword= preg_replace('/[^a-zA-Z0-9 -]/', '', $removedspacestring);
echo $newkeyword.'<br/>';

$editkeyword=preg_replace('/[\s-]+/', ' OR ', $newkeyword);

$query = array(
  "q" => $editkeyword,
  "count" => 10,
  "result_type" => "popular",
  "lang" => "en",
);
  
$results = search($query);
$reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
echo '<div id="outerbox">';
echo '<h2>Related Tweets</h2>';
echo '<div id="tweetscroll">';
foreach ($results->statuses as $result) {
  //echo $result->user->screen_name . ": " . $result->text . "\n";
  $firsttext=$result->text;
  if(preg_match($reg_exUrl, $firsttext, $url)) {
    // make the urls hyper links
	 $text= preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $firsttext);
  }
  else {

				   // if no urls in the text just return the text
				   $text=$firsttext;

   }
  echo '<div id="tweetbg"><img src="'.$result->user->profile_image_url.'" /> '.$text.'</div><br/>';
  $i++;
} 
if($i!=10)
  {
     echo '_____________________'.'<br/>';
	  $query = array(
	  "q" => $editkeyword,
	  "count" => 10-$i,
	  "result_type" => "mixed",
	  "lang" => "en",
	   );
	   $results = search($query);
	   foreach ($results->statuses as $result) {
	  //echo $result->user->screen_name . ": " . $result->text . "\n";
		  $firsttext=$result->text;
			if(preg_match($reg_exUrl, $firsttext, $url)) {

				   // make the urls hyper links
				   $text= preg_replace($reg_exUrl, '<a href="'.$url[0].'" rel="nofollow">'.$url[0].'</a>', $firsttext);
                   
				} 
			else {

				   // if no urls in the text just return the text
				   $text=$firsttext;

			}
		  echo '<img src="'.$result->user->profile_image_url.'" /> '.$text.'<br/>';
		  $i++;
	  }
  }
  echo '</div><!--end scroll-->';
  echo '</div><!--end outerbox-->';
}
