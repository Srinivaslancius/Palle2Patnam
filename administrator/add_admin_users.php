       
<div class="mn-content fixed-sidebar">
 <header class="mn-header navbar-fixed">
    <?php include_once'header.php';?>
</header> 

<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  { 

            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_password = encryptPassword($_POST['admin_password']);
            $created_at = date("Y-m-d h:i:s");
            $sql = "INSERT INTO admin_users (`admin_name`, `admin_password`, `admin_email`, `created_at`) VALUES ('$admin_name', '$admin_password', '$admin_email','$created_at')";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='admin_users.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='admin_users.php';</script>";
            }
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Admin Users</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post">
                            <div class="row">
                                
                                <div class="input-field col s6">
                                    <input id="admin_name" type="text" class="validate" name="admin_name" required>
                                    <label for="admin_name">Admin Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="admin_email" type="email" class="validate" name="admin_email" required>
                                    <label for="admin_email">Admin Email</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="admin_password" type="password" class="validate" name="admin_password" required>
                                    <label for="admin_password">Admin Password</label>
                                </div>
                                
                                 <div class="input-field col s12">
                                    <input type="submit" name="submit" value="Submit" class="waves-effect waves-light btn teal">
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