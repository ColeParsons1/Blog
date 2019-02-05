<?php
session_start();
include_once("db.php");

if(!isset($_SESSION['username'])){
    header("Location:login.php");
    return ;
}
if(!isset($_GET['pid'])){
    header("Location:index.php");
    return ;
}

$pid = $_GET['pid'];

if(isset($_POST['update'])){

    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);

    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);
    $date = date('1 jS \of F Y h:i:s A');

    $sql= "UPDATE  posts SET title='$title', content='$content' ,date='$date' WHERE id=$pid";

    if($title=="" || $content==""){
        mysqli_query($db, $sql);
        header("Location: index66.php");
        return;
    }
    mysqli_query($db, $sql);
    header("Location: index66.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <link rel="stylesheet" href="StyleSheet55.css" type="text/css" />
    <script type="text/javascript" src="C:\xampp\htdocs\blog\blogjs.js"></script>
</head>
<meta charset="utf-8" />
<title></title>
<div id='stars'></div>
<div id="stars2"></div>
<div id="stars3"></div>

<aside id="heading">
    JENIBEEE
</aside>
<aside id="glowbar"></aside>

<div>
    <ul>
        <aside id="tealGlow">
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.php">Home</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html"> MindBodySoul</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html">Youtube</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html"> Poetry</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html"> The Podcast</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html"> Life Coaching</a></li>
            <li><a href="C:\Users\cole\Desktop\Jenibee blog\HTMLPage3.html"> Contact</a></li>
        </aside>
    </ul>
</div>
<body>
<?php
echo '<figure <a href="AboutJeni.php"><img src="IMG_20171008_181042565_HDR.jpg" class="img2" width="999"  height="360"  /></a></figure>';
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
$sql_get="SELECT * FROM posts WHERE id=$pid LIMIT 1";
$res = mysqli_query($db,$sql_get);

if(mysqli_num_rows($res)> 0){
while($row=mysqli_fetch_assoc($res)){
    $title=$row['title'];
    $content=$row['content'];

   echo "<form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data'>";
   echo" <input placeholder='title' name='title' type='text'value='$title' autofocus size='48'<br><br>";
   echo "<textarea placeholder='content' name='content' rows='20' cols='50'>$content</textarea>";
}
}
?>
<form action="edit_post.php" method="post" enctype="multipart/form-data">
    <input placeholder="title" name="title" type="text" autofocus size="48"<br><br>
    <textarea placeholder="content" name="content" rows="20" cols="50"></textarea>
    <input name="update" type="submit" value="update">
    <form action = "" method = "POST" enctype = "multipart/form-data">
        <input type = "file" name = "image" />
        <input type = "submit"/>
        <ul>
            <li>Sent file: <?php echo $_FILES['image']['name'];  ?>
            <li>File size: <?php echo $_FILES['image']['size'];  ?>
            <li>File type: <?php echo $_FILES['image']['type'] ?>
        </ul>
    </form>
    <aside id="category">Category</aside>
    <select name="cars">
        <aside id="category">Category:</aside>
        <option value="">Mind</option>
        <option value="">Body</option>
        <option value="">Soul</option>
    </select>
</form>
</body>
</html>
