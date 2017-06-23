<?php
require('newdbc.php');
$deleteid=$_GET['id'];
$videoid= $_GET['videoid'];
$delete = "DELETE FROM videocomments WHERE id='$deleteid'";
        if ($conn->query($delete) === TRUE) {
						//echo "New record created successfully";
					} 
					else {
						//echo "Error: " . $insert . "<br>" . $conn->error;
					}
		
		$conn->close();
		header("Location:success.php?id=".urlencode($videoid));
?>