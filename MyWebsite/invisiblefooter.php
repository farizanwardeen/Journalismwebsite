 </div><!--end container-->
 <!--coding the footer-->
		
	

	<!-- All Javascript at the bottom of the page for faster page loading -->
		
	<!-- First try for the online version of jQuery-->
	<script src="http://code.jquery.com/jquery.js"></script>
	
	<!-- If no online access, fallback to our hardcoded version of jQuery -->
	<script>window.jQuery || document.write('<script src="includes/js/jquery-1.8.2.min.js"><\/script>')</script>
	
	<!-- Bootstrap JS -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	
	<!-- Custom JS -->
	<script src="includes/js/script.js"></script>
	
	

<script type="text/javascript">
 $(document).ready(function() {
   
   $("#contactform").submit(function (event) {
    event.preventDefault();
	
    var name = $("#name").val();
    var comment = $("#comment").val();
    var submit = $("#submit").val();
	var videosid = $("#videosid").val();
	
    var dataString = 'name='+name+'&comment='+comment+'&submit=' + submit+'&videosid=' + videosid;
	
	
    $.ajax({
			type: 'POST',
			data: dataString,
			url: 'commentindex.php',
			success: function (data) {
			//alert('success');
				$("#created").hide();
				//$('#result').html(data);
				
			    
				$("#result").load('read.php',{'getvideoid':videosid});
				
				//$('html, body').scrollTop( $(document).height() );
				
				$('html, body').animate({
			 scrollTop: $("#endofpage").offset().top
			}, 1000);
			$( '#contactform' ).each(function(){
				this.reset();
			});
	       
        }
    });
});
 
  });

 
</script>
	
	</body>
</html>
