<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {


            $category_name = $_POST['category_name'];
            $category_image = $_FILES['category_image']["name"];
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
                     $sql = "INSERT INTO categories (`category_name`, `category_image`, `status`) VALUES ('$category_name', '$category_image','$status')";
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
                                    <input id="title" type="text" class="validate" name="category_name" required>
                                    <label for="title">Category Name</label>
                                </div>
                                
                                <div class="input-field col s6">
                                   Image : <input type="file" name="category_image" id="category_image" required>                                     
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