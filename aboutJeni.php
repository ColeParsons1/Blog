<?php
session_start();
include_once("db.php");

if(isset($_POST['post'])){
$title = strip_tags($_POST['title']);
$content = strip_tags($_POST['content']);
$title = mysqli_real_escape_string($db, $title);
$content = mysqli_real_escape_string($db, $content);
$date = date('1 jS  F Y h:i:s A');

$sql= "INSERT into posts(title, content, date) VALUES ('$title','$content', '$date')";

if($title=="" || $content==""){
echo"do a post plz";
return;
}
mysqli_query($db, $sql);
header("Location: AboutJeni.php");
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
            <a href="" target="_blank" ></a>
            
                <a class="eh2" href="">About JENIBEEE
                
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
        $posts .= "<a class='active' <a class='eh3' style='' href='javascript:;' ><h2 class='eh4' href=''> Category: $category</h2><h1 style='color:cyan; text-align:center; '>$title</h1><h3 >$date</h3><h2 class='eh4'>$output</h2></a></a>
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
<a class="eh1" style="margin-top:-420px; font-size:35px;  float:left; margin-left:583px;" href>About</a>

<a class="eh" href="" style="margin-top:-350px; width:70%; float:left; margin-left:100px;" >Hey babes!!<br><br>

My name is Jenifer, but you can call me Jeni!<br><br>

I’m 21 years young, and my passion is to inspire people. My purpose in this world is to show you how to find your own potential so that you can live a full and happy life fulfilling your own purpose.<br>

I am a Psychology undergrad, currently earning my BA.<br><br>

My blog is a platform for self-love and self-care, and will show you how you can incorporate it into your every day life. Here, you will see the world through my lens. Here you will find reviews on music/books/art that I love and recommend. You will find random poetry and written pieces that come from my heart. You will see my social networks and what I keep up with everyday. And last but not least, you will learn the secrets to living a life of peace and happiness.

Thank you for everything you do. May positive vibes always flow your way. Enjoy!<br><br>

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



