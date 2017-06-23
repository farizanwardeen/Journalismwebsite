

<?php

//create_cat.php
include 'connect.php';
include 'newheader.php';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form method="post" action="">
 	 	Category name: <input type="text" name="cat_name" />
		<br>
		<br>
 		Category description: 
		<br>
		<br>
		<textarea name="cat_description" /></textarea>
 		<input type="submit" value="Add category" />
 	 </form>';
}
else
{
    //the form has been posted, so save it
    $sql = "INSERT INTO categories(cat_name, cat_description)
 	   VALUES( '".mysqli_real_escape_string($con,$_POST['cat_name'])."',
 		      '".mysqli_real_escape_string($con,$_POST['cat_description'])."' )";
    $result = mysqli_query($con, $sql);
    if(!$result)
    {
        //something went wrong, display the error
        echo 'Error' ;
    }
    else
    {
        echo 'New category successfully added.';
    }
}




include 'footer.php';
?>
