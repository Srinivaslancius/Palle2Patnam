<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_info = $_POST['product_info'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    
    
     $sql1 = "INSERT INTO products (`product_name`,`category_id`, `product_info`,`status`,`created_by`,`created_at`) VALUES ('$product_name','$category_id', '$product_info', '$status','$created_by','$created_at')";
     $result1 = $conn->query($sql1);
     $last_id = $conn->insert_id;

    $product_weights = $_REQUEST['weight_type_id'];
    foreach($product_weights as $key=>$value){

        $product_weights1 = $_REQUEST['weight_type_id'][$key];
        $price = $_REQUEST['price'][$key];      
        $sql = "INSERT INTO product_weight_prices ( `product_id`,`weight_type_id`,`price`) VALUES ('$last_id','$product_weights1','$price')";
        $result = $conn->query($sql);
    }

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
                                    <input id="product_name" type="text" class="validate" name="product_name" required>
                                    <label for="product_name">Product Name</label>
                                </div>

                                <div>
                                    <div class="input-field col s4">
                                        <select name="weight_type_id[]" required>
                                            <option value="">Select Weighy Type</option>
                                            <?php while($row = $getWeights->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>"><?php echo $row['weight_type']; ?></option>
                                            <?php } ?>
                                        </select> 
                                    </div>
                                    <div class="input-field col s4">
                                       <input id="price" type="text" class="validate" name="price[]" required onkeypress="return isNumberKey(event)">
                                       <label for="price">Price</label>
                                    </div>
                                    <div class="input-field col s4">
                                       <a href="javascript:void(0);"  ><img src="add-icon.png" onkeypress="return isNumberKey(event)" onclick="addInput('dynamicInput');"/></a>
                                    </div>
                                    <div id="dynamicInput" class="input-field col s12"></div>
                                </div>
                                <div class="input-field col s12">
                                    <span for="name" class="col-lg-3 col-sm-3 control-label">Product Info</span> <br /><br />
                                    <div class="col-lg-9">
                                        <textarea id="product_info" name="product_info" required></textarea>
                                    </div>
                                </div>  
                                <div class="input-field col s12">
                                    Product Images : <br /><br />
                                    <div class="input_fields_wrap">
                                        <div>
                                            <img id="img-preview"/>
                                            <input type="file" id="product_images" name="product_images[]" accept="image/*" onchange="imgPreview(this);" required>
                                            <a style="cursor:pointer" id="add_more" class="add_field_button">Add More Fields</a>
                                        </div><br/>
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

<?php
    $sql1 = "SELECT * FROM product_weights where status = '0'";
    $result1 = $conn->query($sql1);
?>

<?php while($row = $result1->fetch_assoc()) { 
   $choices1[] = $row['id'];
   $choices_names[] = $row['weight_type'];
} ?>

<script type="text/javascript">

function addInput(divName) {
    var choices = <?php echo json_encode($choices1); ?>; 
    var choices_names = <?php echo json_encode($choices_names); ?>;
    var newDiv = document.createElement('div');
    newDiv.className = 'new_appen_class';
    var selectHTML = "";    
    selectHTML="<div class='input-field col s4'><select name='weight_type_id[]' required style='display:block !important'><option value=''>Select Weighy Type</option>";
    var newTextBox = "<div class='input-field col s4'><input type='text' required name='price[]' onkeypress='return isNumberKey(event)''><label for='price'>Price</label></div>";
    removeBox="<div class='input-field col s4'><a class='remove_button' ><img src='remove-icon.png'/></a></div><div class='clearfix'></div>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices_names[i] + "</option>";
    }
    selectHTML += "</select></div>";
    newDiv.innerHTML = selectHTML+ " &nbsp;" +newTextBox +" "+ removeBox;
    document.getElementById(divName).appendChild(newDiv);
}

$(document).ready(function() {
    $(dynamicInput).on("click",".remove_button", function(e){ //user click on remove text
        e.preventDefault();
        $(this).parent().parent().remove();
    })
    //Script for Multilpe Images Preview
    var abc = 0;
    $('#add_more').click(function () {
        $(this).before("<div><input type='file' id='file' name='product_images[]' accept='image/*' required><a href='#' class='remove_field'>Remove</a> </div>");
    });
    $('body').on('change', '#file', function () {
        if (this.files && this.files[0])
        {
            abc += 1; //increementing global variable by 1
            var z = abc - 1;
            var x = $(this).parent().find('#previewimg' + z).remove();
            $(this).before("<div><img id='previewimg" + abc + "' src='' width='150' height='150'/></div>");
            var reader = new FileReader();
            reader.onload = imageIsLoaded;
            reader.readAsDataURL(this.files[0]);
        }
    });
        //image preview
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
    $(this).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
//Multilpe Images Preview script end here

//Script allowed only numeric value
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}
</script>

   
