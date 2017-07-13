<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $status = $_POST['status'];
    

    $sql = "INSERT INTO products (`product_name`, `price`, `status`) VALUES ('$product_name', '$price', '$status')";
    if($conn->query($sql) === TRUE){
       echo "<script>alert('Data Updated Successfully');window.location.href='products.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='products.php';</script>";
    }
}
?>

    <main class="mn-inner">

        <div class="row">
            
            <div class="col s12 m12 l2"></div>
            <div class="col s12 m12 l8">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title">Products</span><br>
                        <div class="row">
                           <form class="col s12" method="post">
                                <div class="row">
                                    
                                    <div class="input-field col s6">
                                        <input id="product_name" type="text" class="validate" name="product_name" required>
                                        <label for="product_name">Product Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="price" type="text" class="validate" name="price" required>
                                        <label for="price">Price</label>
                                    </div>

                                <?php
                                    $sql1 = "SELECT * FROM categories where status = '0'";
                                    $result1 = $conn->query($sql1);
                                ?>
                                       <select name="category_name[]">
                                        <option value="">Select Category</option>
                                            <?php while($row = $result1->fetch_assoc()) {  ?>
                                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                            <?php } ?>
                                       </select> 
                                    
                                    <div class="input-field col s6">
                                        <input id="special_price" type="text" class="validate" name="special_price" required>
                                        <label for="special_price">Special Price</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="discount_percentage" type="text" class="validate" name="discount_percentage" required>
                                        <label for="discount_percentage">Discount Percentage</label>
                                    </div>

                                    <?php
                                        $sql1 = "SELECT * FROM product_weights where status = '0'";
                                        $result1 = $conn->query($sql1);
                                    ?>
                                        <select name="weight_type[]">
                                            <option value="">Select Weighy Type</option>
                                            <?php while($row = $result1->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['weight_type']; ?></option>
                                        <?php } ?>                                      
                                        </select>                                    
                                    
                                    <div class="input-field col s6">
                                        <input id="key_features" type="text" class="validate" name="key_features" required>
                                        <label for="key_features">Key Features</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <input id="product_info" type="text" class="validate" name="product_info" required>
                                        <label for="product_info">Product Info</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <input id="about" type="text" class="validate" name="about" required>
                                        <label for="about">About</label>
                                    </div>

                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="" disabled selected>Avalability</option>
                                            <option value="0">In Stock</option>
                                            <option value="1">Out Of Stock</option>                                        
                                        </select>                                    
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="" disabled selected>Choose your status</option>
                                            <option value="0">Active</option>
                                            <option value="1">In Active</option>                                        
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