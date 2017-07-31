<?php
include_once('includes/config.php');
$user_id =  $_POST['user_id'];
$sql = "SELECT total_ltr FROM milk_orders WHERE user_id = '$user_id' AND MONTH(`start_date`) = MONTH(CURDATE()) AND YEAR(`start_date`) = YEAR(CURDATE()) ";
$result = $conn->query($sql);
$val=  $result->fetch_assoc();
echo $val['total_ltr'];
?>