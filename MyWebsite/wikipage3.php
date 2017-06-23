<?php
$name ="";
$name = htmlspecialchars($_GET["name"]);
?>

<!DOCTYPE html>
<html>
<head>
<title><?php echo $name; ?></title>
<link rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.js"></script> 
<style>
#title{

}
#article{
margin-left: 100px;
margin-right:100px;
}
</style>
</head>
<body>
<div id="title">
<h1 align="center"><?php echo $name?></h1>
</div>
<div id="article"></div>

<script type="text/javascript">
    
    
	var urlfront= "http://en.wikipedia.org/w/api.php?action=parse&format=json&prop=text&section=0&page=";
	var urlmiddle="<?php echo $name; ?>"
	var urlback= "&callback=?";
	var urladd= urlfront+urlmiddle+urlback;
    $(document).ready(function(){

	$.ajax({
	    type: "GET",
	    url: urladd,
	    contentType: "application/json; charset=utf-8",
	    async: false,
	    dataType: "json",
	    success: function (data, textStatus, jqXHR) {
	    
		var markup = data.parse.text["*"];
		var i = $('<div></div>').html(markup);
		
		
		// remove links as they will not work
		i.find('a').each(function() { $(this).replaceWith($(this).html()); });
		
		// remove any references
		i.find('sup').remove();
		
		// remove cite error
		i.find('.mw-ext-cite-error').remove();
		
		$('#article').html($(i).find('p'));
			
		
	    },
	    error: function (errorMessage) {
	    }
	});    
    
    });
    
	
    
</script>
 
 <!-- Google Analytics -->
<script type="text/javascript">

	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-44644611-1']);
	_gaq.push(['_setDomainName', 'none']);
	_gaq.push(['_setAllowLinker', true]);
	_gaq.push(['_trackPageview']);
	
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	
</script>
 
</body>
</html>