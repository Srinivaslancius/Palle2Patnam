<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $price = $_POST['price'];
    $special_price = $_POST['special_price'];
    $discount_percentage = $_POST['discount_percentage'];
    $weight_type_id = $_POST['weight_type_id'];
    $key_features = $_POST['key_features'];
    $product_info = $_POST['product_info'];
    $about = $_POST['about'];
    $availability_id = $_POST['availability_id'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    
    
     $sql1 = "INSERT INTO products (`product_name`,`category_id`, `price`, `special_price`,`discount_percentage`,`weight_type_id`,`key_features`,`product_info`,`about`,`availability_id`,`status`,`created_by`,`created_at`) VALUES ('$product_name','$category_id', '$price', '$special_price','$discount_percentage','$weight_type_id','$key_features','$product_info','$about','$availability_id','$status','$created_by','$created_at')";
     $result1 = $conn->query($sql1);
     $last_id = $conn->insert_id;
     $product_images = $_FILES['product_images']['name'];
    foreach($product_images as $key=>$value){                  

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../uploads/product_images/' . $product_images1;
        move_uploaded_file($file_tmp, $file_destination);        
        $sql = "INSERT INTO product_images ( `product_id`,`product_image`) VALUES ('$last_id','$product_images1')";
        $result = $conn->query($sql);
    }
     
     if( $result1 == 1){
    echo "<script>alert('Data Updated Successfully');window.location.href='products.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='products.php';</script>";
    }
}
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Products</div>
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
                                    <select name="category_id" required>
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
                                    <select name="weight_type_id" required>
                                        <option value="">Select Weighy Type</option>
                                        <?php while($row = $getWeights->fetch_assoc()) {  ?>
                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['weight_type']; ?></option>
                                        <?php } ?>                                      
                                    </select> 
                                </div>

                                <label for="name" class="col-lg-3 col-sm-3 control-label">Key Features</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea id="key_features" name="key_features" required><?php echo $row['key_features'];?></textarea>                                        
                                    </div>
                                </div>

                                <label for="name" class="col-lg-3 col-sm-3 control-label">Product Info</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea name="product_info"required id="product_info"><?php echo $row['product_info'];?></textarea>                                        
                                    </div>
                                </div>  

                                <label for="name" class="col-lg-3 col-sm-3 control-label">About</label>
                                <div class="input-field col s12">
                                    <div class="col-lg-9">
                                        <textarea name="about" required id="about"><?php echo $row['about'];?></textarea>
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <select name="availability_id" required>
                                        <option value="" disabled selected>Avalability</option>
                                        <option value="0">In Stock</option>
                                        <option value="1">Out Of Stock</option>                                        
                                    </select> 
                                </div>

                                <div class="input-field col s12">
                                    Product Images : <br /><br />
                                    <div class="input_fields_wrap">                                        
                                        <div><input type="file" name="product_images[]" requird> <a style="cursor:pointer" class="add_field_button">Add More Fields</a> </div><br/>
                                    </div>

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

<script type="text/javascript">
$(document).ready(function() {
    
    var max_fields      = 5; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div><input type="file" name="product_images[]"/><a href="#" class="remove_field">Remove</a></div>'); //add input box
        }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>