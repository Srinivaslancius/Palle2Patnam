<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $user_address = $_POST['user_address'];
    $created_admin_id = $_SESSION['admin_user_id'];
    $created_at = date("Y-m-d h:i:s");
    $sql = "INSERT INTO users (`user_name`, `user_email`, `user_mobile`, `user_address`,`created_admin_id`, `created_at`, `status`) VALUES ('$user_name', '$user_email', '$user_mobile', '$user_address', '$created_admin_id', '$created_at', 2)";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='users.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='users.php';</script>";
    }
}
?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Users</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s6">
                                        <input id="user_name" type="text" class="validate" name="n" required>
                                        <label for="user_name">User Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_email" type="email" class="validate" name="user_email" required>
                                        <label for="user_email">User Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_mobile" type="text" class="validate" name="user_mobile" required>
                                        <label for="user_mobile">User Mobile</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="user_address" class="materialize-textarea" name="user_address" ></textarea>
                                        <label for="user_address">User Address</label>
                                    </div>
                                   
                                </div>
                                <div class="row">                                            
                                    <div class="col s12 l3">                                                
                                        <input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn blue m-b-xs">
                                    </div>                                            
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col s12 m12 l2"></div>
        </div>
    </main>

<?php include_once 'footer.php'; ?>