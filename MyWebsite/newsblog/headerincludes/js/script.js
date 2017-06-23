
/* Adding jquery function for the alert box*/
$(function(){
/*Tells jquery to wait until the browser has loaded rest of the website and then execute this code*/
	/*By default we dont want the alert box to show up*/
    /*Select alertMe button and a function to it*/
    $('#alertMe').click(function(e){
    	/*prevent default behavior of link (which is navigate to a page or referesh the page) we perform function on the
    	link */
    	e.preventDefault();
    /* The Success Alert box we added*/
    /*slideDown is jquery function which is use to slide the success alert down*/
    	$('#successAlert').slideDown();
    });

/*selecting the pop up */
    $('a.pop').click(function(e){
        e.preventDefault();
        /*creates a pop over*/
        $('a.pop').popover();
        });

    /*adding the tool tip*/
    /*selecting all instances with the rel of tooltip*/
     $('[rel="tooltip"]').tooltip();


});