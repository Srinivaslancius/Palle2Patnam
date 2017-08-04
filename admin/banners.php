<?php include_once 'main_header.php'; ?>

<?php include_once 'side_navigation.php';?>

<main class="mn-inner">
    <div class="row">
        
        <div class="col s12 m12 l12">
            <div class="card">
                <div class="card-content">
                    <a href="add_banners.php" style="float:right">Add Banners</a>
                    <span class="card-title">Banners</span>
                    <?php $getData = getAllData('banners'); ?>
                    <table id="example" class="display responsive-table datatable-example">
                        <thead>
                            <tr>
                                <th>Banner Title</th>
                                <th>Banner</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = $getData->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['title'];?></td>
                                <td><img src="<?php echo $base_url . 'uploads/banner_images/'.$row['banner'] ?>" height="100" width="100"/></td>                        
                                <td><a href="edit_banners.php?bid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a><a href="delete_banners.php?bid=<?php echo $row['id']; ?>"><i class="material-icons dp48" onclick="return confirm('Are you absolutely sure you want to delete?')">delete</i></a></td>
                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                <div class="modal-dialog" Style="margin-top:10%;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                        <h3 class="modal-title"><b>Banner Information</b> </h3>
                                        </div>
                                        <div class="modal-body" >
                                            <h5 class="modal-title-set"><b>Title: </b><?php echo $row['title']."<br><br>"; ?></h5>
                                            <h5 class="modal-title-set"><b>Image: </b><img src="<?php echo $base_url . 'uploads/banner_images/'.$row['banner'] ?>" height="100" width="100"/></h5> 
                                        </div>
                                        <div class="modal-footer" >
                                              <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include_once 'footer.php'; ?>
