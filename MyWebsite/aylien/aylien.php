<?php
# To use the SDK either use Composer's autoload
#require __DIR__ . "/vendor/autoload.php";

# Or manually
 require_once("aylien_textapi_php/src/AYLIEN/TextAPI.php");

$textapi = new AYLIEN\TextAPI("4e752f3d", "a91f01c65b5a7a4f02446ff61d16e4be",false);

$url = 'https://en.wikipedia.org/wiki/Edward_Snowden';

$summary = $textapi->Summarize(
array('url' => $url, 'sentences_number' => 5));
foreach ($summary->sentences as $sentece) {
  echo $sentece,"\n";
}
$url2= 'http://techcrunch.com/2015/04/06/john-oliver-just-changed-the-surveillance-reform-debate';
$summary = $textapi->Summarize(
array('url' => $url2, 'sentences_number' => 5));
foreach ($summary->sentences as $sentece) {
  echo $sentece,"\n";
}

?>