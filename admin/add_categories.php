<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {

            $category_type = $_POST['category_type'];
            $category_name = $_POST['category_name'];
            $category_image = $_FILES['category_image']["name"];
            $display_position = $_POST['display_position'];
            $status = $_POST['status'];                                                    
            
            if($category_image!='') {

                $target_dir = "../uploads/category_images/";
                $target_file = $target_dir . basename($_FILES["category_image"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if (move_uploaded_file($_FILES["category_image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO categories (`category_type`, `category_name`, `category_image`, `display_position`,`status`) VALUES ('$category_type', '$category_name', '$category_image', '$display_position', '$status')"; 
                    if($conn->query($sql) === TRUE){
                       echo "<script>alert('Data Updated Successfully');window.location.href='categories.php';</script>";
                    } else {
                       echo "<script>alert('Data Updation Failed');window.location.href='categories.php';</script>";
                    }
                    //echo "The file ". basename( $_FILES["category_image"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }            
            
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Categoreis</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                
                                <div class="input-field col s12">
                                    <p class="p-v-xs col s4">
                                        <input class="with-gap" name="category_type" id="test1" type="radio" value="0" required>
                                        <label for="test1">Category</label>
                                    </p>
                                    <p class="p-v-xs col s4">
                                        <input class="with-gap" name="category_type" id="test2" type="radio" value="1" required>
                                        <label for="test2">Offers</label>
                                    </p>
                                </div>
                                
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="category_name" required>
                                    <label for="title">Category Name</label>
                                </div>
                                
                                <div class="input-field col s6">
                                    <img id="img-preview"/>
                                   Image : <input type="file" name="category_image" id="category_image" accept="image/*" onchange="imgPreview(this);" required>                                     
                                </div>

                                <div class="input-field col s12">
                                    <input id="display_position" type="text" class="validate" name="display_position" required>
                                    <label for="display_position">Disaplay Position</label>
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
<?php include_once 'footer.php'; ?>