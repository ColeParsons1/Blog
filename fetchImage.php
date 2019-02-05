<?php
session_start();
include_once("db.php");
// some basic sanity checks
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
    // get the image from the db
   $sql = "SELECT image FROM image WHERE imageId=".$_GET[id"];
   $result=mysql_query("$sql") or dieContent-type: image/jpeg");
   echo mysql_result($result, 0);"
?>
