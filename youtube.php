<?php
session_start();
include_once("db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="normalize.css" type="text/css" />
    <script type="text/javascript" src="C:\xampp\htdocs\blog\blogjs.js"></script>
</head>
<title>blog</title>
<div id='stars'></div>
<div id="stars2"></div>
<div id="stars3"></div>
<aside id="heading">
    JENIBEEE
</aside>
<aside id="glowbar">
</aside>
<div>
    <ul>
        <aside id="tealGlow">
            <li><a href="index.pho">Home</a></li>
            <li><a href="mindbodysoul.php"> MindBodySoul</a></li>
            <li><a href="youtube.php" >Youtube</a></li>
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
            <a href="" target="_blank">
                <div class="content-overlay">About JENIBEEE</div>
                <img class="content-image" src="White Sands 8.jpg" class="img3" width="250" height="360">
            </a>
        </div>
    </div>';
?>
<aside id="twitter">
    <a class="twitter-timeline" href="https://twitter.com/jenibeeeee?ref_src=twsrc%5Etfw" height="360" width="250">Tweets by jenibeeeee</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
</aside>
<?php
require_once("nbbc/nbbc.php");
$bbcode = new BBCode;
$sql = "SELECT * FROM posts ORDER BY id DESC";
$res = mysqli_query($db, $sql) or die(mysql_error());
$utube = "";
    
if(mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $category = $row['category'];
        $id = $row['id'];
        $title = $row['title'];
        $content = $row['content'];
        $date = $row['date'];
        $output = $bbcode->Parse($content);
        
        if($category=="youtube" || $category=="Youtube"|| $category=="YouTube" ){
            $utube .= "<a class='demo shareSelector' <a class='eh3' style='padding:200px;' href='javascript:;' ><h2 class='eh4' href=''>Category: $category</h2><h2>$title</h2><h3 >$date</h3><h2 class='eh4'>$output</h2></a></a></div></div>
<hr>";
        }
    }
}
?>
<table class="myclass">
    <tr>
        <td><?php echo"<h3>.$utube.</h3>"; ?></td>
    </tr>
</table>
<a href='post.php' target='_blank'>post</a>
</body>
</html>
