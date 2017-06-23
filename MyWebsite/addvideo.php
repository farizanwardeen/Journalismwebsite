<?php
//connection to database
require ("newdbc.php");
//get the name of the video from user.
if(isset($_POST['name'])&&isset($_POST['link']))
//if(isset($_POST['submit']))
{

$name=mysqli_real_escape_string($conn,$_POST['name']);
$link=mysqli_real_escape_string($conn,$_POST['link']);
$newlink=substr($link,17);

$sql = "INSERT INTO videos (id,name,code)
VALUES ('','$name','$newlink')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
header("location: aindex.php?added=$name");

}

?>