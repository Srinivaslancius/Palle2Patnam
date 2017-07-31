<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {
            //echo "<pre>"; print_r($_POST); die;
            $user_id = $_POST['user_id'];
            $product_id = $_POST['product_id'];
            $total_ltr = $_POST['total_ltr'];
            $price_per_ltr = $_POST['price_ltr'];
            $total_ltr_price = $_POST['total_ltr_price'];
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $created_at = date("Y-m-d h:i:s");          
            //$status = $_POST['status'];   
            $sql = "INSERT INTO milk_orders (`user_id`, `product_id`, `total_ltr`,`price_ltr`,`total_ltr_price`, `start_date`, `end_date`, `created_at`) VALUES ('$user_id','$product_id', '$total_ltr','$price_per_ltr','$total_ltr_price', STR_TO_DATE('$start_date', '%m/%d/%Y'), STR_TO_DATE('$end_date', '%m/%d/%Y'), '$created_at')";
            if($conn->query($sql) === TRUE){
               echo "<script>alert('Data Updated Successfully');window.location.href='milk_orders.php';</script>";
            } else {
               echo "<script>alert('Data Updation Failed');window.location.href='milk_orders.php';</script>";
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
                                    <input id="price_ltr" type="text" class="validate" name="price_ltr" required>
                                    <label for="price_ltr">Price per Ltr</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="total_ltr_price" type="text" class="validate" placeholder="Total Price Ltrs" name="total_ltr_price" required readonly="readonly">                                   
                                </div>

                                <div class="input-field col s12">
                                    <label for="start_date">Start Date</label>
                                    <input id="start_date" name="start_date" type="text" class="datepicker">
                                </div>

                                <div class="input-field col s12">
                                    <label for="end_date">End Date</label>
                                    <input id="end_date" name="end_date" type="text" class="datepicker">
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
<script type="text/javascript">
$('#price_ltr').on('keyup', function(){
    if($('#total_ltr').val()!='') {
        var total = 0.00;
        var total_ltr = parseInt($('#total_ltr').val());
        var price_ltr = parseInt($('#price_ltr').val());
        total += parseFloat(price_ltr*total_ltr);
        textbox3= $("#total_ltr_price").val((total).toFixed(2));
    } else {
        alert("Please Enter total Ltrs");
        $('#price_ltr').val('');
        $('#total_ltr_price').val('');
    }
});
</script>