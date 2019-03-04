<?php
session_start();
include_once("db.php");

if(isset($_POST['userImage'] && is_uploaded_file($_FILES['userImage']['tmp_name'])) {
    $category = strip_tags($_POST['category']);
    $title = strip_tags($_POST['title']);
    $content = strip_tags($_POST['content']);

    $category = mysqli_real_escape_string($db, $category);
    $title = mysqli_real_escape_string($db, $title);
    $content = mysqli_real_escape_string($db, $content);
    $date = date('jS F Y h:i:s A');

    if(count($_FILES) > 0) {
        if (is_uploaded_file($_FILES['userImage']['tmp_name'])) {
            $con = mysqli_connect("localhost", "root", "");
            mysqli_select_db($con, 'blog');
            $imgData = addslashes(file_get_contents($_FILES['userImage']['tmp_name']));
            $imageProperties = getimageSize($_FILES['userImage']['tmp_name']);
            $sql = "INSERT into posts(category,title, content, date, imageType, imageData) VALUES ('$category','$title','$content', '$date',{$imageProperties['mime']}', '{$imgData})";
        }
    }
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
    header("Location: index66.php");
}
?>


