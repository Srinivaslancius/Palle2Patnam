<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  if (!isset($_POST['submit']))  {
            echo "";
        } else  {


            $title = $_POST['title'];                                    
            $fileToUpload = $_FILES["fileToUpload"]["name"];
            $status = $_POST['status'];                                                    
            
            if($fileToUpload!='') {

                $target_dir = "../uploads/banner_images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO banners (`title`, `banner`, `status`) VALUES ('$title', '$fileToUpload','$status')";
                    if($conn->query($sql) === TRUE){
                       echo "<script>alert('Data Updated Successfully');window.location.href='banners.php';</script>";
                    } else {
                       echo "<script>alert('Data Updation Failed');window.location.href='banners.php';</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
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
                                    <input id="title" type="text" class="validate" name="title" required>
                                    <label for="title">Title</label>
                                </div>
                                
                                <div class="input-field col s6">
                                   Image : <input type="file" name="fileToUpload" id="fileToUpload" required>                                     
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