<?php
include "../admin/includes/config.php";
include "../admin/includes/functions.php";

$response = array(); 

if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_REQUEST['mobile']) && !empty($_REQUEST['mobile']) && !empty($_REQUEST['password']) && !empty($_REQUEST['password']))  {

    $mobile = $_REQUEST['mobile'];
    $password = encryptPassword($_REQUEST['password']);

    $sql = "SELECT * FROM users WHERE user_mobile = '$mobile'";
    $result = $conn->query($sql);   

      if($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $result = "UPDATE `users` SET `user_password`='$password' WHERE `user_mobile`='$mobile'";
          if ($conn->query($result) === TRUE) {
            $response['success']=0;
            $response['message']='Success';        
          } else {
            $response['success']=4;
            $response['message']='Error oops!';
          }            

        } else {
          $response['success']=1;
          $response['message']='Your Mobile Number Not Valid ,Pelase Enter Valid Number.';          
        }

    } else {
      $response['success']=2;
      $response['message']='Parameters missing';     
    }
    
} else {
    $response['success']=3;
    $response['message']='Invalid request';   
}
  echo json_encode($response);
?>