<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['id'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

            $product_name = $_POST['product_name'];
            $price = $_POST['price'];
            $status = $_POST['status'];
            
            $sql = "UPDATE `products` SET product_name='$product_name', price='$price', status = '$status' WHERE id = '$id' ";
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
            <div class="page-title">Products</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post">
                                <div class="row">
                                    <?php $getProducts = getAllDataWhere('products', 'id', $id); $getProducts1 = $getProducts->fetch_assoc(); ?>
                                    <div class="input-field col s6">
                                        <input id="product_name" type="text" class="validate" name="product_name" required>
                                        <label for="product_name">Product Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input id="price" type="text" class="validate" name="price" required>
                                        <label for="price">Price</label>
                                    </div>
                                    
                                    <div class="input-field col s12">
                                        <select name="status" required>
                                            <option value="" disabled selected>Choose your status</option>
                                            <option value="0" <?php if($getProducts1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                            <option value="1" <?php if($getProducts1['status'] == 1) { echo "Selected"; }?>>In Active</option>
                                            <option value="2" <?php if($getProducts1['status'] == 2) { echo "Selected"; }?>>Member</option>                                       
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