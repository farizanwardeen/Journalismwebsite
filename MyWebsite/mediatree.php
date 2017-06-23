<?php


// load Zend classes
require_once 'Zend/Loader.php';
Zend_Loader::loadClass('Zend_Rest_Client');

// define search query
//$query = 'Cuba United States relations';
$query ="";
$query = htmlspecialchars($_GET["name"]);
//$query = 'Gujarat Riots';

try {
  // initialize REST client
  $wikipedia = new Zend_Rest_Client('http://en.wikipedia.org/w/api.php');
  
  // set query parameters
  $wikipedia->action('query');
  $wikipedia->list('search');
  $wikipedia->srwhat('text');
  $wikipedia->format('xml');
  $wikipedia->srlimit(50);
  $wikipedia->srsearch($query);
  

  // perform request
  // iterate over XML result set
  $result = $wikipedia->get();
} catch (Exception $e) {
    die('ERROR: ' . $e->getMessage());
}
?>







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<title><?php echo $query; ?></title>
	<link rel="stylesheet" href="treecss/style.css">
	<script src="http://code.jquery.com/jquery-1.7.2.min.js" type="text/javascript" > </script>
	
	<script type="text/javascript">

		$( document ).ready( function( ) {
				$( '.tree li' ).each( function() {
						if( $( this ).children( 'ul' ).length > 0 ) {
								$( this ).addClass( 'parent' );     
						}
				});
				
				$( '.tree li.parent > a' ).click( function( ) {
						$( this ).parent().toggleClass( 'active' );
						$( this ).parent().children( 'ul' ).slideToggle( 'fast' );
				});
				
				$( '#all' ).click( function() {
					
					$( '.tree li' ).each( function() {
						$( this ).toggleClass( 'active' );
						$( this ).children( 'ul' ).slideToggle( 'fast' );
					});
				});
				
				$( '.tree li' ).each( function() {
						$( this ).toggleClass( 'active' );
						$( this ).children( 'ul' ).slideToggle( 'fast' );
				});
				
		});
        
	</script>
</head>
<body>
<div id="pgtitle">
<?php echo $query; ?>
</div>	
<div id="wrapper">
<div class="tree">
		<button id="all">Toggle All</button>
		
<ul>
		
    <?php foreach ($result->query->search->p as $r): ?>
	<!--
      <li><a href="http://www.wikipedia.org/wiki/
        <?php //echo $r['title']; ?>"><b>
	-->
	
      <li><a href="wikipage3.php?name=<?php echo $r['title']; ?>"><b>
	
        <?php echo $r['title']; ?></b></a>
	   	
			<ul>
				<li><a><?php echo $r['snippet']; ?></a></li>
			</ul>
	  </li>
    <?php endforeach; ?>


</ul>
</div>
</div>

</body>
</html>