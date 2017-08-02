<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php 
error_reporting(0); 
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

            $admin_name = $_POST['admin_name'];
            $admin_email = $_POST['admin_email'];
            $admin_password = encryptPassword($_POST['admin_password']);
            $created_at = date("Y-m-d h:i:s");
            
            $sql = "UPDATE `admin_users` SET admin_name='$admin_name', admin_email='$admin_email', admin_password='$admin_password',created_at= '$created_at' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='admin_users.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='admin_users.php';</script>";
            }
        }
?>

    <main class="mn-inner">
        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Admin Users</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    <?php $getAdminUsers = getAllDataWhere('admin_users', 'id', $id); $getAdminUsers1 = $getAdminUsers->fetch_assoc(); ?>
                                    <div class="input-field col s6">
                                        <input id="admin_name" type="text" class="validate" name="admin_name" required value="<?php echo $getAdminUsers1['admin_name'];?>">
                                        <label for="admin_name">Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_email" type="email" class="validate" name="admin_email" required value="<?php echo $getAdminUsers1['admin_email'];?>">
                                        <label for="admin_email">Email</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="admin_password" type="password" class="validate" name="admin_password" required value="<?php echo decryptPassword($getAdminUsers1['admin_password']);?>">
                                        <label for="admin_password">Password</label>
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