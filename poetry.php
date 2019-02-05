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
    </div>';?>
<?php
$db = mysqli_connect("localhost",
    "root",
    "",
    "blog");
require_once("nbbc/nbbc.php");
$bbcode = new BBCode;
$sql = "SELECT * FROM posts ORDER BY id DESC";
$res = mysqli_query($db, $sql);
$poets='';
while ($row = mysqli_fetch_assoc($res)) {
    $category = $row['category'];
    $id = $row['id'];
    $title = $row['title'];
    $content = $row['content'];
    $date = $row['date'];
    $output = $bbcode->Parse($content);
    if($category=="poetry" || $category=="Poetry"){
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result);
        $image = '<img src="imageView2.php?id='.$row["id"].'"/>';
        $poets .= "<a class='demo shareSelector' <a class='eh3' style='' href='javascript:;' ><h2 class='eh4' href=''> Category:$category</h2><h1 style='color:cyan; text-align:center; '>$title</h1><h3 >$date</h3><h2 class='eh4'>$output</h2>$image</a></a>
<hr>";
    }
}
?>
<span class="socialShare"> <!-- The share buttons will be inserted here --> </span>
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
</body>
</html>
<div class="dv_popup" style="display: none;">
    <div class="popup_header">
        <h3>Are you sure you want to cancel?</h3>
        <a class="close" href="#">&times;</a>
    </div>
    <div class="body">
        <p><i class="icon-warning-sign"></i>  If you choose to cancel, your changes will NOT be saved</p>
    </div>
    <br />
    <div class="popup_footer">

    </div>
</div>
<script src="plugin.js"></script>
<script src="demo.js"></script>
<div class="content">
</div>
<section class="main-container">
</section>
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
<table class="myclass" style="margin-left:140px;  margin-right:180px; width:67%; margin-top:-400px; border-left:3px solid white; border-right:3px solid white; border-top:3px solid white; border-bottom:3px solid white; display:inline-block;">
    <td class="demo shareSelector" >
        <a><?php
            $conn = mysqli_connect("localhost", "root", "");
            mysqli_select_db ($conn,'blog');
            $sql = "SELECT id FROM posts ORDER BY id DESC";
            $result = mysqli_query($conn,$sql)
            or die("Error: ".mysqli_error($conn));
            $newtext3 = wordwrap($poets, 75, "\n", true);
            $sql2 = "SELECT imageType,imageData FROM posts ORDER BY id DESC";
            $result2 = mysqli_query($conn,$sql2)
            or die("Error: ".mysqli_error($conn));
                echo "<a href='' >.$newtext3.<hr>";
                mysqli_close($conn);
            ?>
        </a>
    </td>
    </tr>
</table>
</body>
</html>
