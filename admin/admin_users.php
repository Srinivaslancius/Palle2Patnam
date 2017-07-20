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
                                            <td><a href="#"><i class="material-icons dp48">edit</i></a><a href="#"><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">pageview</i></a></td>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                                <div class="modal-dialog" Style="margin-top:10%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                           <h3 class="modal-title"><b>Admin User Information</b></h3>
                                                        </div>
                                                        <div class="modal-body" >
                                                            <h5><b>Name</b></h5><?php echo $row['admin_name']."<br>";?>
                                                            <h5><b>Email</b></h5><?php echo $row['admin_email']."<br>";?>
                                                            <h5><b>Date</b></h5><?php echo $row['created_at']."<br>"; ?>
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
         <!-- model pop-up Script for all pages with bootstrap js -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".click_view").click(function(){
                    var modalId = $(this).attr('data-modalId');
                    $("#myModal_"+modalId).modal('show');  
                });                  
            });
        </script>