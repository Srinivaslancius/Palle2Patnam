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
                                            <td><a href="edit_banners.php?bid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a href="#"><i class="material-icons dp48">pageview</i></a><a href="#"><i class="material-icons dp48">delete</i></a></td>
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