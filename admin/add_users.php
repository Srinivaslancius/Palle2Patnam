<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    /*echo "<pre>";
    print_r($_POST);die;*/
    $user_name = $_POST['user_name'];
    $user_email = $_POST['user_email'];
    $user_mobile = $_POST['user_mobile'];
    $street_name = $_POST['street_name'];
    $street_no = $_POST['street_no'];
    $flat_name = $_POST['flat_name'];
    $flat_no = $_POST['flat_no'];
    $location = $_POST['location'];
    $landmark = $_POST['landmark'];
    $pincode = $_POST['pincode'];
    $created_admin_id = $_SESSION['admin_user_id'];
    $created_at = date("Y-m-d h:i:s");
    
    $sql = "INSERT INTO users (`user_name`, `user_email`, `user_mobile`,`street_name`,`street_no`,`flat_name`,`flat_no`,`location`,`landmark`,`pincode`,`created_admin_id`, `created_at`, `status`) VALUES ('$user_name', '$user_email', '$user_mobile','$street_name','$street_no','$flat_name','$flat_no','$location','$landmark','$pincode', '$created_admin_id', '$created_at', 0)";
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
                                        <input id="user_name" type="text" class="validate" name="user_name" required>
                                        <label for="user_name">User Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_email" type="email" class="validate" name="user_email">
                                        <label for="user_email">User Email(Optional)</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_mobile" type="text" class="validate" name="user_mobile" required>
                                        <label for="user_mobile">User Mobile</label>
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <input id="street_name" type="text" class="validate" name="street_name" required>
                                        <label for="street_name">Street Name</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="street_no" type="text" class="validate" name="street_no" required>
                                        <label for="street_no">Street Number</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="flat_name" type="text" class="validate" name="flat_name" required>
                                        <label for="flat_name">Flat Name</label>
                                    </div>
                                    
                                    <div class="input-field col s6">
                                        <input id="flat_no" type="text" class="validate" name="flat_no" required>
                                        <label for="flat_no">Flat Number</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="location" type="text" class="validate" name="location" required>
                                        <label for="location">Location</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="landmark" type="text" class="validate" name="landmark" required>
                                        <label for="landmark">Landmark</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="pincode" type="text" class="validate" name="pincode">
                                        <label for="pincode">Pincode(Optional)</label>
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