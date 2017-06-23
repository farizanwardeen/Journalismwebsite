<?php
$id=$_GET["id"];
$wikiId= $_GET["wikiId"];
?>


<html>
<head>
<title>Statiscal Parser</title>
<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
<style>
#wrapper2{
width:1300px;
margin-left:60px;
}
#wrapper3{
width: 1200px;
height:700px;
border: 1px solid black;
overflow: hidden; /* will contain if #first is longer than #second */
}
#webpage1{
float:left;
width: 600px;
height: 700px;
}
#webpage2{
float:left;
width: 600px;
height: 700px;
}

</style>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
</head>
<body>
<div id="wrapper">
	<div id="wrapper2">
		<div id="header">
			<div id="logo">
				<h1>Check Plagarism</h1>
			</div>	
		</div>
		<div id="wrapper3">
			<div id="webpage1">
			    <?php 
				    $url1="http://localhost/websitecopy8/MyWebsite/wikiplagedit.php?wikiId=".$wikiId;
					if (isset($_POST["url1"])){ $url1= $_POST["url1"];}
					$url2="http://localhost/websitecopy8/MyWebsite/wikiupdateedit.php?id=".$id."&wikiId=".$wikiId;
					if (isset($_POST["url2"])){ $url2= $_POST["url2"];}
				?>
				<iframe src="<?php echo $url1; ?>" width="600" height="700"></iframe>
			</div>
			<div id="webpage2">
				<iframe src="<?php echo $url2; ?>" width="600" height="700"></iframe>
			</div>
		</div>
		
<div id="page">
<div id="widebar">
<?php

$get_url1 = file_get_contents($url1);
$html=$get_url1;

$start = strpos($html, '<p>');
$end = strpos($html, '</p>', $start);

$i=0;
while($i<150)
{
$end = strpos($html, '</p>', $end+1);
$i++;
}
$paragraph = strip_tags(substr($html, $start, $end-$start+4));
//echo $paragraph;
$fd = fopen("./ref/bond.txt","w");
fwrite($fd, $paragraph);
fclose($fd);

//url2
$get_url2 = file_get_contents($url2);
$html=$get_url2;

$start = strpos($html, '<p>');
$end = strpos($html, '</p>', $start);

$i=0;
while($i<150)
{
$end = strpos($html, '</p>', $end+1);
$i++;
}
$paragraph = strip_tags( substr($html, $start, $end-$start+4));
//echo $paragraph;
$fd = fopen("./ref/james.txt","w");
fwrite($fd, $paragraph);
fclose($fd);


?>

<?php 
function ncd($x, $y) { 
  $cx = strlen(gzcompress($x));
  $cy = strlen(gzcompress($y));
  $result=(strlen(gzcompress($x . $y)) - min($cx, $cy)) / max($cx, $cy);
  return $result;
} 
function ncd_new($sx, $sy, $prec=0, $MAXLEN=9000) {
# NCD with gzip artifact correctoin and percentual return.
# sx,sy = strings to compare. 
# Use $prec=-1 for result range [0-1], $pres=0 for percentual, 
# For NCD definition see http://arxiv.org/abs/0809.2553
  $x = $min = strlen(gzcompress($sx));
  $y = $max = strlen(gzcompress($sy));
  $xy= strlen(gzcompress($sx.$sy));
  $a = $sx;
  if ($x>$y) { # swap min/max
    $min = $y;
    $max = $x;
    $a = $sy;
  }
  $res = ($xy-$min)/$max; # NCD definition.
  #Little strings):
 	if ($MAXLEN<0 || $xy<$MAXLEN) {
    $aa= strlen(gzcompress($a.$a));
    $ref = ($aa-$min)/$min;
    $res = $res - $ref; # correction
  }
  return ($prec<0)? $res: 100*round($res,2+$prec);
}
//File 1  
$f1 = file_get_contents('./ref/bond.txt', FILE_USE_INCLUDE_PATH);

//echo $f1;
$stripstr = array('/\bis\b/i', '/\bwas\b/i', '/\bthe\b/i', '/\ba\b/i');
$file1 = preg_replace($stripstr, '', $f1);
//var_dump($file1);
$arr1=explode(";;",$file1);
$count1=count($arr1);


//File 2 
$f2 = file_get_contents('./ref/james.txt', FILE_USE_INCLUDE_PATH);
//echo $f2;

$stripstr = array('/\bis\b/i', '/\bwas\b/i', '/\bthe\b/i', '/\ba\b/i');
$file2 = preg_replace($stripstr, '', $f2);

$arr2=explode(";;",$file2);
$count2=count($arr2);
$total=ncd_new($file1,$file2);
$newtotal= 100-$total;
//$fp = fopen('data.txt', 'w');
?>
<div class="output">

<br><p>Matching pattern using <b>Universal Dependencies</b></p><p>Overall pattern match: <b>
<?php 

if($url1==$url2)
{
	echo "100";
}
else
{
	echo $newtotal;
}

?>%</b></p><h1><?php if($newtotal==0) echo "No Pattern Match";?></h1><p><i></i></p>

<tbody>
<?php

for ($i=0;$i<$count1-1;$i++)
{	
	for ($j=0;$j<$count2-1;$j++)
	{
		$value=ncd_new($arr1[$i], $arr2[$j]);
		if($value<=30)
		{ 
		GLOBAL $search;
		$search=$arr1[$i];?>
		<tr><td><?php echo $i+1;?></td><td><?php echo $arr1[$i];?></td><td><?php echo $j+1; ?></td><td><?php echo $arr2[$j];?></td><td><?php echo $value."%";?></td></tr>
		<?php
		$a=$i+1;
		$b=$j+1;
		$out=$a."=".$b.";";
		fwrite($fp,$out);
		}
	}
}
//fclose($fp);
?>
</tbody>
</table><br>
<br>

</div>
</div>
</div>
</div>
</body>
</html>

