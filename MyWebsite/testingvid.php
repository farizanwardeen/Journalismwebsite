<?php include('header.php'); ?>
<div class="row" id="thum">
	<div class="col-12">
	<?php include('mostviewed.php'); ?> 
	<?php include('thumbnail.php'); ?> 
	</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
/*
var thumbauto_refresh = setInterval(
function ()
{
$('#loadthumb_videos').load('thumbnail.php').fadeIn("slow");
}, 100);
 
var auto_refresh = setInterval(
function ()
{
$('#load_videos').load('username.php').fadeIn("slow");
}, 10000); // refresh every 10000 milliseconds , for 1 hour put 3,600,000 milliseconds
*/
</script> 
<div id="loadthumb_videos"> </div>
<div id="load_videos"> </div>
<?php include('footer.php'); ?>




