            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_weight.php" style="float:right">Add Weight</a>
                                <span class="card-title">Weight</span>
                                <?php $getData = getAllData('product_weights'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>weight_type</th>
                                            <th>Actions</th>                                                                  
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['weight_type'];?></td>
                                            <td><a href="edit_weight.php?wid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a href="#"><i class="material-icons dp48">pageview</i></a><a href="#"><i class="material-icons dp48">delete</i></a></td>
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