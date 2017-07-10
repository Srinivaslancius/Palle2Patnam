   
<div class="mn-content fixed-sidebar">
<header class="mn-header navbar-fixed">
<?php include_once'header.php';?>
</header>
<link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<main class="mn-inner">
<div class="row">
<div class="col s12">
    <div class="page-title">Users</div>
</div>
<?php $getData = getAllData('users'); ?>
<div class="col s12 m12 l12">
    <div class="card">
        <div class="card-content">                               
           <a href="add_users.php" style="float:right">Add User</a>
            <table id="example" class="display responsive-table datatable-example">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>User Email </th>
                        <th>User Mobile </th>
                        <th>User Address </th>
                        <th>Created Date</th>                                            
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php while ($row = $getData->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['user_email'];?></td>
                        <td><?php echo $row['user_mobile'];?></td>
                        <td><?php echo $row['user_address'];?></td>
                        <td><?php echo $row['created_at'];?></td>
                        <td><a href="edit_users.php?uid=<?php echo $row['id']; ?>">Edit</a></td>
                    </tr>               
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>
</div>
</main>

</div>


<?php include_once 'footer.php'; ?>
