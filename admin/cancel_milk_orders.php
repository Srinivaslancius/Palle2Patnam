            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_cancel_milk_order.php" style="float:right">Add Cancel Milk Order</a>
                                <span class="card-title">Cancel Milk Order</span>
                                <?php $getData = getAllData('cancel_milk_orders'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Total Ltrs</th>
                                            <th>Cancel Ltrs</th>                                            
                                            <th>Date</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php $getUserName = getIndividualDetails($row['user_id'],'users','id'); echo $getUserName['user_name']; ?></td>
                                            <td><?php echo $row['total_ltr'];?></td>
                                            <td><?php echo $row['cancel_ltr'];?></td>                                            
                                            <td><?php echo $row['cancel_date'];?></td>
                                            <!-- <td><a href="edit_weight.php?wid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a></td> -->
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