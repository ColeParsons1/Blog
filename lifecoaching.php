<?php
session_start();
include_once("db.php");
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>JENIBEEE | Blog</title>
    <meta name="description" content="Social sharing and listing social accounts jquery plugin">
    <script src="popup.js"></script>
    <link rel="stylesheet" href="normalize1.css">
    <link rel="stylesheet" href="arthref.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<div id='stars'></div>
<div id="stars2"></div>
<div id="stars3"></div>
<aside id="heading" style="margin-left:30px; margin-right:0; margin-bottom:-25px;">
    JENIBEEE
    <a class="fa fa-twitter-square" href="https://twitter.com/jenibeeeee"  style="font-size:36px; text-shadow: none; margin-left:-30px; "></a>
    <a class="fa fa-tumblr-square" href="http://jenibeeee.tumblr.com/" style="font-size:36px; text-shadow: none; margin-left:-70px; "></a>
    <a  href="s9g3v.php" style="letter-spacing: 0; margin-right:-390px; margin-left:324px;">Post</a>
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
echo '<figure <a  href="AboutJeni.php"><img src="IMG_20171008_181042565_HDR.jpg" class="img2"  width="1120" style="margin-left:45px; margin-right:0;"  height="365"  /></a></figure>';
echo'<div class="container">     
        <div class="content">
        <div class="content-overlay">
            <a href="AboutJeni.php" target="AboutJeni.php" ></a>          
                <a class="eh2" href="AboutJeni.php">About JENIBEEE                
                <img href="" src="White Sands 8.jpg" class="img3" width="250" height="360">
            </a>
        </div>
    </div>';
?>
<?php
require_once("nbbc/nbbc.php");

$bbcode = new BBCode;

$sql = "SELECT * FROM posts ORDER BY id DESC";

$res = mysqli_query($db, $sql) or die(mysql_error());

$posts = "";

$sql2="SELECT * FROM images ORDER BY id DESC";

$res2=mysqli_query($db, $sql2);

if(mysqli_num_rows($res2) > 0){
    while ($row = mysqli_fetch_assoc($res2)){
        $image=$row['image'];
    }
}
if(mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $category = $row['category'];
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];
        $output = $bbcode->Parse($content);
        $posts .= "<a class='demo shareSelector' <a class='eh3' style='' href='javascript:;' ><h2 class='eh4' href=''> Category: $category</h2><h1 style='color:cyan; text-align:center; '>$title</h1><h3 >$date</h3><h2 class='eh4'>$output</h2></a></a>
<hr>";
    }
}
?>
<span class="socialShare"> <!-- The share buttons will be inserted here --> </span>
</p>
<?php
echo'<div class="container">     
        <div class="content">
        <div class="content-overlay" style="margin-left: 1167px";>
            <a href="" target="_blank" ></a>            
                <a class="eh2" href="">              
                    <a class="twitter-timeline"  href="https://twitter.com/jenibeeeee?ref_src=twsrc%5Etfw" height="360" width="254">Tweets by jenibeeeee <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></a>
            </a>
        </div>
    </div>';
?>
<a class="eh1" style="margin-top:-420px; font-size:35px;  float:left; margin-left:534px;" href>Life Coaching</a>

<a class="eh" href="" style="margin-top:-350px; width:70%; float:left; margin-left:100px;" >Do you feel lost with no sense of direction? Do you feel sad or angry? Do you long to live a life with passion and<br> purpose?<br><br>

    The truth is that it’s there. Your passion, your purpose is there, it’s just hidden. You have amazing potential,<br> and you definitely have a life worth living.<br> Let me help you overcome your obstacles so you can fulfill your life purpose and find happiness, by unveiling what’s always been there.<br><br>

    As someone who has gone through normal counseling therapy, I was able to see that it wasn’t my cup of tea.<br> What works for some people might not work for others. Personally, I found that by listening to life coaches,<br> and by putting in the work, myself, to improve my life one day at a time, I have been able to heal my wounds and<br> lead a more positive and full life. These alternative methods have worked best for me, and may help you too.<br><br>

    So let’s start your journey to help you become the best YOU possible!

    For free consultation with absolutely no strings attached, and more information on packages, please email jenifer@jenibeee.com

    -xox JeniB<br><br></a>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script src="socialShare.min.js"></script>
<script src="socialProfiles.min.js"></script>
<script>
    $(document).ready(function () {
        $('.shareSelector').socialShare({
            social: 'twitter,tumblr,pinterest,stumbleupon',
            whenSelect: true,
            selectContainer: '.shareSelector',
            blur: true
        });
        $('.followSelector').socialProfiles({
            animation: 'chain',
            blur: true,
            facebook: '',
            google: '',
            twitter: '',
            pinterest: '',
            
        });
    });
</script>
</body>
</html>
