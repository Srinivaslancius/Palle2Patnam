<?php
error_reporting(0);
include_once('includes/config.php');
include_once('includes/functions.php');
@session_start();

if($_SERVER["REQUEST_METHOD"]=="POST") {

	$admin_email = $_POST["admin_email"];
	//Set Password encrypt and decrypt	
	$pwd=$_POST["admin_password"];	
	$admin_password = encryptPassword($pwd);	
	//$decrypted=decryptPassword($admin_password);
	$sql = "SELECT * FROM admin_users WHERE admin_email = '$admin_email' AND admin_password = '$admin_password' AND flag=0";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();

	if($row) {
	    $_SESSION['admin_user_id'] = $row['id'];
	    $_SESSION['admin_user_name'] = $row['admin_name'];
	    if(isset($_SESSION["admin_user_name"])) {
		    echo "<script type='text/javascript'>window.location='dashboard.php'</script>";
		}
	} else {
	    echo "<script language=javascript>alert('Entered Username or Password is incorrect!')</script>";
	    echo "<script type='text/javascript'>window.location='index.php'</script>";
	}

} else {

	echo "<script language=javascript>alert('Invalid Request!')</script>";
    echo "<script type='text/javascript'>window.location='index.php'</script>";
}

?>
