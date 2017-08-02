<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {

            $vendor_name = $_POST['vendor_name']; 
            $created_date = date("Y-m-d h:i:s");                                   
            $status = $_POST['status'];                                                    
            
                    $sql = "INSERT INTO vendors (`vendor_name`,`created_date`,`status`) VALUES ('$vendor_name','$created_date','$status')";
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
            <div class="page-title">Vendor</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="vendor_name" type="text" class="validate" name="vendor_name" autofocus="autofocus" required>
                                    <label for="vendor_name">Vendor Name</label>
                                </div>
                                
                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0">Active</option>
                                        <option value="1">In Active</option>                                        
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