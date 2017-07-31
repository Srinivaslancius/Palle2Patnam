<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else {
    //Save data into database
    $vendor_id = $_POST['vendor_id'];
    $milk_in_ltrs  = $_POST['milk_in_ltrs'];
    $created_date = date("Y-m-d h:i:s");
  
        $sql = "INSERT INTO vendor_milk_assign (`vendor_id`,`milk_in_ltrs`,`created_date`) VALUES ('$vendor_id','$milk_in_ltrs', '$created_date')";
        if($conn->query($sql) === TRUE) {
                echo "<script>alert('Data Updated Successfully');window.location.href='milk_vendors.php';</script>";
        }else {
                echo "<script>alert('Data Updation Failed');window.location.href='milk_vendors.php';</script>";
        }
     
}
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Milk Vendors</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                               
                                <?php
                                    $getVendors = getAllDataCheckActive('vendors',0);                             
                                    $getMilkVendors = getAllDataCheckActive('vendor_milk_assign',0);
                                ?>
                                <div class="input-field col s12">
                                    <select name="vendor_id" required>
                                        <option value="">Milk Vendors</option>
                                        <?php while($row = $getVendors->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['vendor_name']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>

                                 <div class="input-field col s12">
                                    <input id="milk_in_ltrs" type="text" class="validate" name="milk_in_ltrs" required onkeypress="return isNumberKey(event)">
                                    <label for="milk_in_ltrs">Milk In Ltrs</label>
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

<!--Script allowed only numeric value-->
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
} 
</script>