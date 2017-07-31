            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                
                                <span class="card-title">Milk Order Reports</span>
                                <?php $getData = getAllData('milk_orders'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>Total Ltrs</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <!-- <th>Actions</th> -->
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php $getUserName = getIndividualDetails($row['user_id'],'users','id'); echo $getUserName['user_name']; ?></td>
                                            <td><?php echo $row['total_ltr'];?></td>
                                            <td><?php echo $row['start_date'];?></td>
                                            <td><?php echo $row['end_date'];?></td>
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