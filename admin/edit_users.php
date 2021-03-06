<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

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
            $status = $_POST['status'];
            
            $sql = "UPDATE `users` SET user_name='$user_name', user_email='$user_email', user_mobile='$user_mobile',street_name= '$street_name',street_no = '$street_no',flat_name = '$flat_name',flat_no = '$flat_no',location = '$location',landmark = '$landmark',pincode = '$pincode',status = '$status' WHERE id = '$id' ";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='users.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='users.php';</script>";
            }
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Users</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post">
                            <div class="row">
                                <?php $getUsers = getAllDataWhere('users', 'id', $id); $getUsers1 = $getUsers->fetch_assoc(); ?>                                    
                                    <div class="input-field col s6">
                                        <input id="user_name" type="text" class="validate" name="user_name" required value="<?php echo $getUsers1['user_name'];?>">
                                        <label for="user_name">Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_email" type="email" class="validate" name="user_email" value="<?php echo $getUsers1['user_email'];?>">
                                        <label for="user_email">Email(Optional)</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="user_mobile" type="text" class="validate" name="user_mobile" required maxlength="10"  pattern="[0-9]{10}" onkeypress="return isNumberKey(event)" value="<?php echo $getUsers1['user_mobile'];?>">
                                        <label for="user_mobile">Mobile</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="street_name" type="text" class="validate" name="street_name" required value="<?php echo $getUsers1['street_name'];?>">
                                        <label for="street_name">Street Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="street_no" type="text" class="validate" name="street_no" required value="<?php echo $getUsers1['street_no'];?>">
                                        <label for="street_no">Street Number</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="flat_name" type="text" class="validate" name="flat_name" required value="<?php echo $getUsers1['flat_name'];?>">
                                        <label for="flat_name">Flat Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="flat_no" type="text" class="validate" name="flat_no" required value="<?php echo $getUsers1['flat_no'];?>">
                                        <label for="flat_no">Flat Number</label>
                                    </div>
                                   <div class="input-field col s6">
                                        <input id="location" type="text" class="validate" name="location" required value="<?php echo $getUsers1['location'];?>">
                                        <label for="location">Location</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="landmark" type="text" class="validate" name="landmark" required value="<?php echo $getUsers1['landmark'];?>">
                                        <label for="landmark">Landmark</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="pincode" type="text" class="validate" name="pincode" value="<?php echo $getUsers1['pincode'];?>">
                                        <label for="pincode">Pincode(Optional)</label>
                                    </div>
                                   
                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="" disabled selected>Choose your status</option>
                                            <option value="0" <?php if($getUsers1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                            <option value="1" <?php if($getUsers1['status'] == 1) { echo "Selected"; }?>>In Active</option>
                                            <option value="2" <?php if($getUsers1['status'] == 2) { echo "Selected"; }?>>Member</option>                                       
                                        </select>                                    
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
<!--Script allowed only numeric value-->
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>