<?php

session_start();
include_once("db.php");

if(isset($_POST['category'])) {
    
    $category = strip_tags($_POST['category']);
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);

    $category = mysqli_real_escape_string($db, $category);
    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);
    $date = date('jS F Y h:i:s A');

    if(count($_FILES) > 0) {

        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);
        
        $category = mysqli_real_escape_string($db, $category);
        $title = mysqli_real_escape_string($db, $title);
        $content = mysqli_real_escape_string($db, $content);

        $date = date('jS F Y h:i:s A');

        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

            $con=mysqli_connect("localhost", "root", "");

            mysqli_select_db ($con,'blog');

            $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));

            $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

            $sql = "INSERT INTO posts (category, title, content, date) VALUES('$category','$title','$content','$date')";

            $current_id = mysqli_query($con,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));

            if(isset($current_id)) {

                header("Location: listImages2.php");

            }}}


    if ($title == "" || $content == "" && $category == "") {
        mysqli_query($db, $sql);

        header("Location: signup.php");
        return;

    }

    if ($title == "" || $content == "" && $category == "mindbodysoul" || $category == "MindBodySoul") {
        mysqli_query($db, $sql);

        header("Location: mindbodysoul.php");
        return;

    }

    if ($title == "" || $content == "" && $category == "poetry" || $category == "Poetry") {
        mysqli_query($db, $sql);

        header("Location: poetry.php");
        return;

    }

    mysqli_query($db, $sql);

    header("Location: index.php");

}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>JENIBEEE | Blog</title>
    <meta name="description" content="Social sharing and listing social accounts jquery plugin">
    <script src="popup.js"></script>
    <link rel="stylesheet" href="normalize.css">


    <link rel="stylesheet" href="arthref.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div id='stars'></div>
<div id="stars2"></div>
<div id="stars3"></div>

<aside id="heading" style="margin-left:30px; margin-right:0; margin-bottom:-25px;">
    JENIBEEE
    <a class="fa fa-twitter-square" href=""  style="font-size:36px; text-shadow: none; margin-left:-30px; "></a>
    <a class="fa fa-tumblr-square" href="" style="font-size:36px; text-shadow: none; margin-left:-70px; "></a>
    <a  href="sec.php" style="letter-spacing: 0; margin-right:-390px; margin-left:324px;">Post</a>

</aside>


<aside id="glowbar">
</aside>
<div>
    <ul>
        <aside id="tealGlow" style="margin-bottom:20px; margin-top:-7px;">
            <li><a href="index66.php">Home</a></li>
            <li><a href="mindbodysoul.php"> MindBodySoul</a></li>
            <li><a href="https://www.youtube.com/channel/UCirLu5zUTw2qopvPsm6G7Cg" >Youtube</a></li>
            <li><a href="poetry.php"> Poetry</a></li>
            <li><a href="podcast.php"> The Podcast</a></li>
            <li><a href="lifecoaching.php"> Life Coaching</a></li>
            <li ><a href="contactJeni.php"> Contact</a></li>
        </aside>
    </ul>
</div>
    <body>
    <?php
        
echo '<figure <a href="AboutJeni.php"><img src="IMG_20171008_181042565_HDR.jpg" class="img2" width="1070"  height="360"  /></a></figure>';

    echo'<div class="container">
        <div class="content">
        <div class="content-overlay">
            <a href="" target="_blank" ></a>
                <a class="eh2" href="">About JENIBEEE
                <img href="" src="White Sands 8.jpg" class="img3" width="250" height="360">
            </a>
        </div>
    </div>';

    echo'<div class="container">
        <div class="content">
        <div class="content-overlay">
            <a href="" target="_blank" ></a>
                <a class="eh2" href="">
                    <a class="twitter-timeline" href="https://twitter.com/jenibeeeee?ref_src=twsrc%5Etfw" height="360" width="254">Tweets by jenibeeeee <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></a>                    
            </a>
        </div>
    </div>';
    ?>
        
<style>
    form{
        border-radius: 17px 17px 17px 17px;
        -moz-border-radius: 17px 17px 17px 17px;
        -webkit-border-radius: 17px 17px 17px 17px;
        border: 5px solid #faf7fa;
        margin-left:50px;
    }


    textarea{
        border-radius: 17px 17px 17px 17px;
        -moz-border-radius: 17px 17px 17px 17px;
        -webkit-border-radius: 17px 17px 17px 17px;
        border: 5px solid #faf7fa;
        margin-left:100px;
    }

    textarea.cat{
        border-radius: 17px 17px 17px 17px;
        -moz-border-radius: 17px 17px 17px 17px;
        -webkit-border-radius: 17px 17px 17px 17px;
        border: 5px solid #faf7fa;
        margin-left:20px;
    }


    input{
        border-radius: 17px 17px 17px 17px;
        -moz-border-radius: 17px 17px 17px 17px;
        -webkit-border-radius: 17px 17px 17px 17px;
        border: 5px solid #faf7fa;
        margin-left:100px;
        margin-top:100px;
        margin-bottom:15px;
        font-size:30px;
        font-family:System-ui;
    }

</style>

    <?php
    if(count($_FILES) > 0 && isset($_POST['category']) ) {

        $category = strip_tags($_POST['category']);
        $title = strip_tags($_POST['title']);
        $content = strip_tags($_POST['content']);

        $category = mysqli_real_escape_string($db, $category);
        $title = mysqli_real_escape_string($db, $title);
        $content = mysqli_real_escape_string($db, $content);
        $date = date('jS F Y h:i:s A');

        $sql2 = "INSERT INTO posts (category, title, content, date, imageType ,imageData) 
        VALUES('$category','$title','$content','$date',{$imageProperties['mime']}', '{$imgData}')";

        if(is_uploaded_file($_FILES['userImage']['tmp_name'])) {

            $con=mysqli_connect("localhost", "root", "");

            mysqli_select_db ($con,'blog');

            $imgData =addslashes(file_get_contents($_FILES['userImage']['tmp_name']));

            $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);

            $sql = "INSERT INTO posts (imageType ,imageData)
            VALUES('{$imageProperties['mime']}', '{$imgData}')";

            $current_id = mysqli_query($con,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($con));

            if(isset($current_id)) {

                header("Location: listImages2.php");

            }}}
    ?>

    <form action="post.php" method="post" enctype="multipart/form-data">
        <input placeholder="title" name="title" type="text" autofocus size="48"<br><br>
        <textarea placeholder="content" name="content" rows="20" cols="50"></textarea>
        <textarea class="cat" placeholder="category" name="category" rows="4" cols="37"></textarea>
        <input name="post" type="submit" value="Post">
        </form>
    <div>

        <form name="frmImage" enctype="multipart/form-data" action="" method="post" class="frmImageUpload">
            <label>Upload Image File:</label><br/>
            <input placeholder="title" name="title" type="text" autofocus size="48"<br><br>
            <textarea placeholder="content" name="content" rows="20" cols="50"></textarea>
            <textarea class="cat" placeholder="category" name="category" rows="4" cols="37"></textarea>
            <input name="userImage" type="file" class="inputFile" />
            <input type="submit" value="Submit" class="btnSubmit" />
        </form>
    </div>
    </body>
    <footer> &copy; Tetra Computing   </footer>
    </html>
