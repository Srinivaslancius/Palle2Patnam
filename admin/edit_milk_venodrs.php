<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['id'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {
    //Save data into database
    $vendor_id = $_POST['vendor_id'];
    $milk_in_ltrs  = $_POST['milk_in_ltrs'];
    $created_date = date("Y-m-d");
  
        $sql = "UPDATE vendor_milk_assign SET vendor_id = '$vendor_id',milk_in_ltrs = '$milk_in_ltrs',created_date = '$created_date' WHERE id='$id'";
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
                                    $getMilkVendors = getAllDataWhere('vendor_milk_assign', 'id', $id); $getMilkVendors1 = $getMilkVendors->fetch_assoc();
                                ?>
                                <div class="input-field col s12">
                                    <select name="vendor_id" required>
                                        <option value="">Milk Vendors</option>
                                        <?php while($row = $getVendors->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $getMilkVendors1['vendor_id']) { echo "selected=selected"; }?> ><?php echo $row['vendor_name']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>

                                 <div class="input-field col s12">
                                    <input id="milk_in_ltrs" type="text" class="validate" name="milk_in_ltrs" value="<?php echo $getMilkVendors1['milk_in_ltrs'];?>" onkeypress="return isNumberKey(event)" required>
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

<!--Script allowed only numeric values-->
<script type="text/javascript">
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
} 
</script>