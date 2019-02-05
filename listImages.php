<?php
$db = mysqli_connect("localhost", "root", "");
$sql = "SELECT imageId FROM output_images ORDER BY imageId DESC";
$result = mysqli_query($db,$sql);
?>
<HTML>
<HEAD>
    <TITLE>List BLOB Images</TITLE>
</HEAD>
<BODY>
<?php
while($row = mysqli_fetch_array($result)) {
    ?>
    <img src="imageView.php?image_id=<?php echo $row["imageId"]; ?>" /><br/>
    <?php
}
mysqli_close($db);
?>
</BODY>
</HTML>
