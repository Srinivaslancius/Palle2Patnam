<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {
            //echo "<pre>"; print_r($_POST); die;
            $user_id = $_POST['user_id'];
            $product_id = $_POST['product_id'];
            $total_ltr = $_POST['total_ltr'];
            $extra_ltr = $_POST['extra_ltr'];
            $order_date = $_POST['order_date'];            
            $created_at = date("Y-m-d h:i:s");          
            //$status = $_POST['status'];                                               
        
            $sql = "INSERT INTO extra_milk_orders (`user_id`, `product_id`, `total_ltr`, `extra_ltr`, `end_date`, `created_at`) VALUES ('$user_id','$product_id', '$total_ltr', '$start_date', '$end_date', '$created_at')";
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
            <div class="page-title">Milk Order</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php $getUserData = getAllDataCheckActive('users','0');
                                      $getProductData = getAllDataCheckActive('products','0'); 
                                 ?>
                                <div class="input-field col s12">
                                    <select name="user_id" required>
                                        <option value="" disabled selected>Select Users</option>
                                        <?php while($row = $getUserData->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['user_name']; ?></option>
                                        <?php } ?>                                    
                                    </select>
                                </div>

                                <div class="input-field col s12">
                                    <select name="product_id" required>
                                        <option value="" disabled selected>Select Product</option>
                                        <?php while($row = $getProductData->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['product_name']; ?></option>
                                        <?php } ?>                                    
                                    </select>
                                </div>

                                <div class="input-field col s12">
                                    <input id="total_ltr" type="text" class="validate" name="total_ltr" required>
                                    <label for="total_ltr">Total Ltrs</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="extra_ltr" type="text" class="validate" name="extra_ltr" required>
                                    <label for="extra_ltr">Extra Ltrs</label>
                                </div>

                                <div class="input-field col s12">
                                    <label for="order_date">Order Date</label>
                                    <input id="order_date" name="order_date" type="text" class="datepicker">
                                </div>                                                             
                                
                                <!-- <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0">Active</option>
                                        <option value="1">In Active</option>                                        
                                    </select>                                    
                                </div > -->
                                
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