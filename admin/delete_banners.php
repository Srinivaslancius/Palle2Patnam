<?php
include_once('includes/config.php');
include_once('includes/functions.php');
$id = $_GET['bid'];
$target_dir = '../uploads/banner_images/';
$getImgUnlink = getImageUnlink('banner','banners','id',$id,$target_dir);
$qry = "DELETE FROM banners WHERE id ='$id'";
$result = $conn->query($qry);
if(isset($result)) {
   echo "<script>alert('Banner Deleted Successfully');window.location.href='banners.php';</script>";
} else {
   echo "<script>alert('Banner Deletion Failed');window.location.href='banners.php';</script>";
}
?>