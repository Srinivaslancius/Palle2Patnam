            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_admin_users.php" style="float:right">Add Admin User</a>
                                <span class="card-title">Admin Users</span>
                                <?php $getData = getAllData('admin_users'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Admin Name</th>
                                            <th>Admin Email </th>
                                            <th>Created Date</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['admin_name'];?></td>
                                            <td><?php echo $row['admin_email'];?></td>
                                            <td><?php echo $row['created_at'];?></td>
                                            <td>Edit</td>
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