<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['pid'];
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //echo "<pre>"; print_r($_POST); die;
    //Save data into database
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    //$price = $_POST['price'];
    //$special_price = $_POST['special_price'];
    //$discount_percentage = $_POST['discount_percentage'];
    //$weight_type_id = $_POST['weight_type_id'];
    $key_features = $_POST['key_features'];
    $product_info = $_POST['product_info'];
    $about = $_POST['about'];
    $availability_id = $_POST['availability_id'];
    $status = $_POST['status'];
    //save product images into product_images table    
    
    $sql1 = "UPDATE products SET product_name = '$product_name',category_id ='$category_id', key_features = '$key_features',product_info = '$product_info',about = '$about',availability_id = '$availability_id',status = '$status' WHERE id = '$id'"; 
    
    if ($conn->query($sql1) === TRUE) {
    echo "Record updated successfully";
    } else {
    echo "Error updating record: " . $conn->error;
    }
    $result1=$conn->query($sql1);

    //Delete weight and prices
    $del = "DELETE FROM product_weight_prices WHERE product_id = '$id' ";
    $result = $conn->query($del);

    $product_weights = $_REQUEST['weight_type_id'];
    foreach($product_weights as $key=>$value){

        $product_weights1 = $_REQUEST['weight_type_id'][$key];
        $price = $_REQUEST['price'][$key];      
        $sql = "INSERT INTO product_weight_prices ( `product_id`,`weight_type_id`,`price`) VALUES ('$id','$product_weights1','$price')";
        $result = $conn->query($sql);
    }


    $product_images = $_FILES['product_images']['name'];
    foreach($product_images as $key=>$value){

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../uploads/product_images/' . $product_images1;
        if($product_images1!=''){
            move_uploaded_file($file_tmp, $file_destination);        
            $sql = "INSERT INTO product_images ( `product_id`,`product_image`) VALUES ('$id','$product_images1')";
            $result = $conn->query($sql);
        }        
    }
     
     if($result1==1){
        echo "<script>alert('Data Updated Successfully');window.location.href='products.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='products.php';</script>";
    }
}
?>
<a href = "dashboard.php">CLICK</a>
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
                                <?php $getProductsData = getAllDataWhere('products', 'id', $_GET['pid']); $getAllProductsData = $getProductsData->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="product_name" type="text" class="validate" name="product_name" required value="<?php echo $getAllProductsData['product_name']; ?>">
                                    <label for="product_name">Product Name</label>
                                </div>
                               
                                <?php
                                    $getCategories = getAllDataCheckActive('categories',0);
                                ?>
                                
                                <div class="input-field col s12">
                                    <select name="category_id" required>
                                        <option value="">Select Category</option>
                                        <?php while($row = $getCategories->fetch_assoc()) {  ?>
                                            <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $getAllProductsData['category_id']) { echo "selected=selected"; }?> ><?php echo $row['category_name']; ?></option>
                                        <?php } ?>
                                    </select> 
                                </div>                                

                                <?php
                                    $sql2 = "SELECT * FROM product_weight_prices where product_id = '$id'";
                                    $result2 = $conn->query($sql2);                                    
                                ?>
                                <div>
                                    <?php while($row2 = $result2->fetch_assoc()) { ?>
                                        <div class="input-field col s6">
                                            <?php $result = getAllData('product_weights'); ?>                                                
                                            <select name="weight_type_id[]">
                                                <?php while($row = $result->fetch_assoc()) { ?>
                                                <?php $getTermName = getIndividualDetails($row2['weight_type_id'],'product_weights','id'); ?>
                                                    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $row2['weight_type_id']) { echo "Selected"; } ?>><?php echo $row['weight_type']; ?></option>
                                                <?php } ?>
                                            </select>  
                                        </div>
                                        <div class="input-field col s6">
                                           <input type="text" name="price[]" value="<?php echo $row2['price']; ?>"/>
                                           <label for="price">Price</label>
                                        </div>
                                    <?php } ?>

                                    <div class="input-field col s4">
                                       <a href="javascript:void(0);"  ><img src="add-icon.png" onclick="addInput('dynamicInput');" /></a>
                                    </div>
                                    <div id="dynamicInput" class="input-field col s12"></div>
                                

                                <div class="input-field col s12">
                                    <span for="keyfet" class="col-lg-3 col-sm-3 control-label">Key Features</span> <br /><br />
                                    <div class="col-lg-9">
                                        <textarea id="key_features" name="key_features" required value="<?php echo $getAllProductsData['key_features']; ?>"><?php echo $getAllProductsData['key_features']; ?></textarea>                                        
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <span for="keyfet" class="col-lg-3 col-sm-3 control-label">Product Info</span> <br /><br />
                                    <div class="col-lg-9">
                                        <textarea name="product_info"required id="product_info"><?php echo $getAllProductsData['product_info']; ?></textarea>                                        
                                    </div>
                                </div>  

                                <div class="input-field col s12">
                                    <span for="keyfet" class="col-lg-3 col-sm-3 control-label">About</span> <br /><br />
                                    <div class="col-lg-9">
                                        <textarea name="about" required id="about"><?php echo $getAllProductsData['about']; ?></textarea>
                                    </div>
                                </div>

                                <div class="input-field col s12">
                                    <select name="availability_id" required>
                                        <option value="" disabled selected>Avalability</option>
                                        <option value="0" <?php if($getAllProductsData['availability_id'] == 0) { echo "Selected=Selected"; }?>>In Stock</option>
                                        <option value="1" <?php if($getAllProductsData['availability_id'] == 1) { echo "Selected=Selected"; }?>>Out Of Stock</option>                                        
                                    </select> 
                                </div>

                                 <div class="input-field col s12">
                                    <?php                                                                 
                                    $sql = "SELECT id,product_image FROM product_images where product_id = $id";
                                    $getImages= $conn->query($sql);                                                             
                                    while($row=$getImages->fetch_assoc()) {
                                        echo "<img src= '../uploads/product_images/".$row['product_image']."' width=80px; height=80px;/> <a style='cursor:pointer' class='ajax_img_del' id=".$row['id'].">Delete</a> <br />";
                                    }                               
                                   ?>
                                   <!--<a href="#"><i class="small material-icons">delete</i></a>-->
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
                                        <option value="0" <?php if($getAllProductsData['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getAllProductsData['status'] == 1) { echo "Selected"; }?>>In Active</option>                                        
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
    selectHTML="<div class='input-field col s4'><select name='weight_type_id[]' style='display:block !important'><option value=''>Select Weighy Type</option>";
    var newTextBox = "<div class='input-field col s4'><input type='text' name='price[]' ><label for='price'>Price</label></div>";
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
});

</script>

<script type="text/javascript">
$(function(){
    $(document).on('click','.ajax_img_del',function(){
        var del_id= $(this).attr('id');
        var $ele = $(this).parent().parent();
        $.ajax({
            type:'POST',
            url:'delete_image.php',
            data:{'del_id':del_id},
            success: function(data){               
                 if(data=="YES"){
                    alert("Deleted Scuccesfully");
                    location.reload();
                 }else{
                    alert("Deleted Failed");  
                 }
             }

            });
        });
});
</script>
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