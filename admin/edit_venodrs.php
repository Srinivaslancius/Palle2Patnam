<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['id'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $vendor_name = $_POST['vendor_name']; 
    $created_date = date("Y-m-d h:i:s");                                   
    $status = $_POST['status'];
    
        $sql = "UPDATE `vendors` SET vendor_name = '$vendor_name', created_date = '$created_date',status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='vendors.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='vendors.php';</script>";
        }
    }    
       
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Vendors</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php $getVendors = getAllDataWhere('vendors', 'id', $id); $getVendors1 = $getVendors->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="vendor_name" type="text" class="validate" name="vendor_name" required value="<?php echo $getVendors1['vendor_name'];?>">
                                    <label for="title">Weight Type</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getVendors1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getVendors1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
                                    </select>                                    
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