<?php 
include 'connect.php';
include 'newheader.php';
	  if(isset($_POST['submit'])){ 
	   
	  
	  $name=$_POST['name']; 
	  $sql="SELECT p.catego_id, t.pos_id, c.cat_id,  c.cat_name, c.cat_description, p.post_id, p.post_content, t.topic_id, t.topic_subject
	  FROM categories c  
	  join posts p on c.cat_id=p.catego_id  left join topics t on t.pos_id=p.post_id	  
	  WHERE (c.cat_name like '%".$name."%' or c.cat_description like '%".$name."%' or p.post_content like '%".$name."%' or t.topic_subject like '%".$name."%') ";
	  //-run  the query against the mysql query function 
	  $result=mysqli_query($con, $sql) or die(mysqli_error($con));
	$row=mysqli_fetch_array($result);
	echo "$row";
	  //-create  while loop and loop through result set 
	  while($row=mysqli_fetch_array($result)){ 
	 
	  $catname  = $row['c.cat_name']; 
				$postcon  = $row['p.post_content']; 
				$topicsub  = $row['t.topic_subject']; 
				 $catdesc  = $row['c.cat_description'];  
	  //-display the result of the array 
	  echo '$catname';
	  echo '$postcon';
		echo '$topicsub';
	echo	'$catdesc';	
	  } 
		}
  else{ 
	  echo  "<p>Please enter a search query</p>"; 
  
   
  } 
	include 'footer.php';
	?> 