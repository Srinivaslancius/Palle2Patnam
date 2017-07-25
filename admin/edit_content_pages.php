<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>
<?php  
$id = $_GET['uid'];
 if (!isset($_POST['submit']))  {
            echo "";
    } else  {            

    $title = $_POST['title'];  
    $description = $_POST['description'];  
    $status = $_POST['status'];
    
        $sql = "UPDATE `content_pages` SET title = '$title', description = '$description', status='$status' WHERE id = '$id' ";
        if($conn->query($sql) === TRUE){
           echo "<script>alert('Data Updated Successfully');window.location.href='content_pages.php';</script>";
        } else {
           echo "<script>alert('Data Updation Failed');window.location.href='content_pages.php';</script>";
        }
    }   
    
?>
<main class="mn-inner">
    <div class="row">
        <div class="col s12">
            <div class="page-title">Content Pages</div>
        </div>
        <div class="col s12 m12 l2"></div>
        <div class="col s12 m12 l8">
            <div class="card">
                <div class="card-content">                                
                    <div class="row">
                        <form class="col s12" method="post" enctype="multipart/form-data">
                            <div class="row">
<?php $getContents = getAllDataWhere('content_pages', 'id', $_GET['uid']); $getContents1 = $getContents->fetch_assoc(); ?>
                                <div class="input-field col s12">
                                    <input id="title" type="text" class="validate" name="title" required value="<?php echo $getContents1['title'];?>">
                                    <label for="title">Title </label>
                                </div>
                                
                                <div class="input-field col s12">
                                    <textarea name="description" required id="description"><?php echo $getContents1['description'];?></textarea>
                                </div>

                                <div class="input-field col s12">
                                    <select name="status" required>
                                        <option value="" disabled selected>Choose your status</option>
                                        <option value="0" <?php if($getContents1['status'] == 0) { echo "Selected"; }?>>Active</option>
                                        <option value="1" <?php if($getContents1['status'] == 1) { echo "Selected"; }?>>In Active</option>                                       
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