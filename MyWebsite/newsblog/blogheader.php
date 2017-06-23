<!DOCTYPE html>

<html>
	<head>
		
		<!-- Website Title & Description for Search Engine purposes -->
		<title></title>
		<meta name="description" content="">
		
		<!-- Mobile viewport optimized -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		
		<!-- Bootstrap CSS -->
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="includes/css/bootstrap-glyphicons.css" rel="stylesheet">
		
		
		<!-- Custom CSS -->
		<link href="includes/css/styles.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Libre+Baskerville:700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Abril+Fatface' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="style/normalize.css">
        <link rel="stylesheet" href="style/main.css">
		
		<!-- Include Modernizr in the head, before any other Javascript -->
		<script src="includes/js/modernizr-2.6.2.min.js"></script>
		
		
		
		
	</head>
	<body>
	
	    <!--container bootstrap3 feature-->
	    <!--container is a wrapper that centers the website in middle of the browser and it cuts of the edges-->
		<div class="container" id="main">
			<!--for the navbar, navbar-fixed-top is boostrap 3 class-->
			<!--this class with give the div the styles of the navbar that are prestyled in the boostrap css-->
			<!--navbar-fixed-top is going to stick the navbar to the top of the web browser and it will stay there when you scroll down rather than getting lost at the top of the website we dont have to scroll back up to see the navigation menu-->
			<div class="navbar navbar-fixed-top">
				<!--aligns the content of the navbar to the center-->
					<div class="container">

						<!--we add this button to create a small symbol when clicked it shows you the stuff that was cut off when shrinking the browser size like using it in mobile-->
						<button class="navbar-toggle" data-target=".navbar-responsive-collapse" data-toggle="collapse" type="button">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>

						</button>
                          
                    <!--add the navbar logo-->
                    <!--bootstrap3 css class-->
                    <!--href="/" means goes to the root of the website with homepage-->
                    <!--alt is used to explain what it is -->
                    	<a class="navbar-brand" href="#"><img src="images/logo.png" alt="Your Logo"></a> 
                    	<!--adding the content of the navbar all the nav items, drop items and so on -->
                    	<!--nav-collapse is a bootstrap3 css class which allows our nav bar to be responsive so when you shrink it to mobile size the navbar is collapsed-->
                    	<div class="nav-collapse collapse navbar-responsive-collapse">

                    		<!--we add an unordered list-->
                    		<ul class="nav navbar-nav">
                             <!--we add our nav items-->
                             <!-- we have active because we have show nav item with an active class-->
                             
                             	<li class="active work">
                             		<a href="/../websitecopy8/MyWebsite/thumbnail.php">News</a>
                             	</li>
								
								<li>
                             		<a href="#">Entertainment</a>
                             	</li>
								<li>
                             		<a href="index.php">News Blog</a>
                             	</li>
								
								<li>
                             		<a href="/../websitecopy7/MyWebsite/index.php">Forum</a>
                             	</li>
								
								
								
								<li>
                             		<a href="/../websitecopy7/MyWebsite/aindex.php">Submit</a>
                             	</li>
								
								


                              <!--we dont want this one to be active-->
                              <!--add drop down for Services-->
                             	<li class="dropdown">
                             		<!--dropdown-toggle is a bootstrap3 attribute on a tag-->
                             		<!--calls the bootstrap3 class to be a toggle for the drop down-->
                             		<!--we add a drop down arrow by using strong bootstrap class="caret" -->
                             		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Services
                             			<strong class="caret"></strong></a>

                                    <!--adding the unordered list-->
                                    <ul class="dropdown-menu">
                                    	<!--adding the list item-->
                                    	<li>
                                            <a href="#">Web Design</a>

                                    	</li>

                                    	<li>
                                            <a href="#">Web Development</a>

                                    	</li>

                                    	<li>
                                            <a href="#">SEO</a>

                                    	</li>

                                    	<!--adding a horizontal divider-->
                                    	<li class="divider"></li>

                                    	<li class="dropdown-header">More Services </li>

                                    	<li>
                                            <a href="#">Content Creation</a>

                                    	</li>

                                    	<li>
                                            <a href="#">Social Media Marketing</a>

                                    	</li>
                                    </ul><!--end drop down menu-->

                             	</li>

                            </ul><!--end nav-->
							
                            <!--we are going to create the search input-->
                            <form class="navbar-form pull-left">
                            	<!--adding an input within the form of type text form-control is bootstrap3 class -->
                            	<!--placeholder is what you will see as hint for what you will type in-->
                                <input type="text" class="form-control" placeholder="Search this site..." id="searchInput">
                                
                                <!--we add a button-->
                                <!--with the button we are going to use bootstrap glyphicon icon's font icon-->
                                <!--glyphicon is the search logo -->
                                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                            </form><!--end navbar-form--> 

                            <!--pull-right is going to add the css style of float right, it will float the element to the element to the right side of the nav bar-->
                            <ul class="nav navbar-nav pull-right">
                            	<!--adding drop down for My Account-->
                            	<li class="dropdown">
                            		<!--we also add a glyphicon for user-->
                            		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span>My Account<strong class="caret"></strong></a>

                                    <!--adding an unordered list-->
                                    <ul class="dropdown-menu">
									   <li>
                                    		<!--adding font icon with span-->
                                            <a href="signin.php"><span class="glyphicon glyphicon-wrench"></span>Sign In</a>
                                    	</li>
										 
										 <li>
                                    		<!--adding font icon with span-->
                                            <a href="signup.php"><span class="glyphicon glyphicon-pencil"></span>Create an Account</a>
                                    	</li>
										
									   <li>
                                            <a href="#"><span class="glyphicon glyphicon-refresh"></span>Update Profile</a>

                                    	</li>
									 
                                    	<li>
                                    		<!--adding font icon with span-->
                                            <a href="#"><span class="glyphicon glyphicon-wrench"></span>Settings</a>
                                    	</li>
                                    	
                                    	<li>
                                            <a href="#"><span class="glyphicon glyphicon-briefcase"></span>Billing</a>

                                    	</li>
                                    	<li class="divider"></li>
                                    	<li>
                                            <a href="signout.php"><span class="glyphicon glyphicon-wrench"></span>Sign out</a>

                                    	</li>
                                    </ul>

                            	</li>
                    		</ul><!--end nav pull-right-->

                    	</div><!--end nav-collapse-->


					</div><!--end container-->
			</div> <!--end navbar-->
			
			<div class="row" id="logo">
                <div class="col-12">
                    <div class="thumbnails row">
                        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                            <div class="brandlogo">
                                <img class="img-responsive" id="logoimage" src="images/buzzfeednew.jpg" width="1170" height="40" alt="PSD to HTML5 & CSS3">
                            </div><!--end thumbnail-->
                        </div><!--end col-6-->
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                            <div class="brandlogo">
                                <img class="img-responsive" id="logoimage" src="images/buzzard2.jpg" width="1170" height="40" alt="PSD to HTML5 & CSS3">
                            </div><!--end thumbnail-->
                        </div><!--end col-6-->
			        </div><!--end thumbnails row-->
                </div><!--end col-12-->
            </div><!--end logo-->
		  