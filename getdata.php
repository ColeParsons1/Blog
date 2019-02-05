<?php
session_start();
$db = mysqli_connect("localhost",
    "root",
    "",
    "blog");
//Get the content of the image and then add slashes to it
$pic=addslashes(file_get_contents($_FILES['pic']));
//Insert the image name and image content in image_table
$sql = "INSERT into posts(pic) VALUES ('$pic')";
mysqli_query($db, $sql);
?>
