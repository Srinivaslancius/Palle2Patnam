       
<div class="mn-content fixed-sidebar">
 <header class="mn-header navbar-fixed">
    <?php include_once'header.php';?>
</header>

<?php include_once 'side_navigation.php';?>
<?php  $id = $_GET['bid']; if (!isset($_POST['submit']))  {
            echo "";
        } else  {            

            $status = $_POST['status'];
            $title = $_POST['title'];
            if($_FILES["fileToUpload"]["name"]!='') {
                                             
                $fileToUpload = $_FILES["fileToUpload"]["name"];               

                $target_dir = "../uploads/banner_images/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }

                $getImgUnlink = getImageUnlink('banner','banners','id',$id,$target_dir);
                //Send parameters for img val,tablename,clause,id,imgpath for image ubnlink from folder

                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE `banners` SET title = '$title', banner = '$fileToUpload', status='$status' WHERE id = '$id' ";
                    if($conn->query($sql) === TRUE){
                       echo "<script>alert('Data Updated Successfully');window.location.href='banners.php';</script>";
                    } else {
                       echo "<script>alert('Data Updation Failed');window.location.href='banners.php';</script>";
                    }
                    //echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }  else {
                $sql = "UPDATE `banners` SET title = '$title', status='$status' WHERE id = '$id' ";
                if($conn->query($sql) === TRUE){
                   echo "<script>alert('Data Updated Successfully');window.location.href='banners.php';</script>";
                } else {
                   echo "<script>alert('Data Updation Failed');window.location.href='banners.php';</script>";
                }
            }   
            
        }
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Admin Users</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php $getBanners = getAllDataWhere('banners', 'id', $_GET['bid']); $getBanners1 = $getBanners->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="title" required value="<?php echo $getBanners1['title'];?>">
                                    <label for="title">Title</label>
                                </div>

                                <div class="form-group">
                                    <label for="name" class="col-lg-3 col-sm-3 control-label"></label>
                                    <div class="col-lg-9">
                                        <img src="<?php echo $base_url . 'uploads/banner_images/'.$getBanners1['banner'] ?>" height="200" width="200"/>
                                    </div>
                                </div> 
                                
                                <div class="input-field col s6">
                                   Banner : <input type="file" name="fileToUpload" id="fileToUpload">                                     
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getBanners1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getBanners1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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