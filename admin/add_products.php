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
        <div class="col s12">
            <div class="page-title">Banners</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">

                                <div class="input-field col s12">
                                    <input id="product_name" type="text" class="validate" name="product_name" required>
                                    <label for="product_name">Product Name</label>
                                </div>
                               
                                <?php
                                    $getCategories = getAllDataCheckActive('categories',0);                             
                                    $getWeights = getAllDataCheckActive('product_weights',0);
                                ?>
                                <div class="input-field col s12">
                                    <select name="category_name[]">
                                        <option value="">Select Category</option>
                                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>

                                <div class="input-field col s12">
                                    <input id="price" type="text" class="validate" name="price" required>
                                    <label for="price">Price</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="special_price" type="text" class="validate" name="special_price" required>
                                    <label for="special_price">Special Price</label>
                                </div>

                                <div class="input-field col s12">
                                    <input id="discount_percentage" type="text" class="validate" name="discount_percentage" required>
                                    <label for="discount_percentage">Discount Percentage</label>
                                </div>

                                <div class="input-field col s12">
                                    <select name="weight_type[]">
                                        <option value="">Select Weighy Type</option>
                                        <?php while($row = $getWeights->fetch_assoc()) {  ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['weight_type']; ?></option>
                                        <?php } ?>                                      
                                    </select> 
                                </div>

                                <label for="name" class="col-lg-3 col-sm-3 control-label">Key Features</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea name="key_features" id="key_features"><?php echo $row['key_features'];?></textarea>                                        
                                    </div>
                                </div>

                                <label for="name" class="col-lg-3 col-sm-3 control-label">Product Info</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea name="product_info" id="product_info"><?php echo $row['product_info'];?></textarea>                                        
                                    </div>
                                </div>  

                                <label for="name" class="col-lg-3 col-sm-3 control-label">About</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea name="about" id="about"><?php echo $row['about'];?></textarea>                                        
                                    </div>
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

<?php include_once('ck_editor.php'); include_once 'footer.php'; ?>