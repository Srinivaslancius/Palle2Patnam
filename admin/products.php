            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <a href="add_products.php" style="float:right">Add Product</a>
                                <span class="card-title">Products</span>
                                <?php $getData = getAllData('products'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['product_name'];?></td>
                                            <td><?php echo $row['price'];?></td>
                                            <td><?php if($row['status'] == 0){ echo "Active";}else{ echo "In Active";}?></td>
                                            <td><a href="edit_products.php?pid=<?php echo $row['id']; ?>"><i class="small material-icons">edit</i></a>&nbsp;<a href="#"><i class="small material-icons">pageview</i></a>&nbsp;<a href="#"><i class="small material-icons">delete</i></a></td>
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