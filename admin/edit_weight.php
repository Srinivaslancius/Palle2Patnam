<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['wid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $weight_type = $_POST['weight_type'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `product_weights` SET weight_type = '$weight_type', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='weight.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='weight.php';</script>";
        }
    }    
       
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Weight</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
<?php $getProductWeights = getAllDataWhere('product_weights', 'id', $id); $getProductWeights1 = $getProductWeights->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="weight_type" type="text" class="validate" name="weight_type" required value="<?php echo $getProductWeights1['weight_type'];?>">
                                    <label for="title">Weight Type</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getProductWeights1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getProductWeights1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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