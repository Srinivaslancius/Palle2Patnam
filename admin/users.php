            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <a href="add_users.php" style="float:right">Add User</a>
                                <span class="card-title">Users</span>
                                <?php $getData = getAllData('users'); ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>User Name</th>
                                            <th>User Email </th>
                                            <th>User Mobile </th>
                                            <th>Location</th>                                            
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                                                        
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $row['user_name'];?></td>
                                            <td><?php echo $row['user_email'];?></td>
                                            <td><?php echo $row['user_mobile'];?></td>
                                            <td><?php echo $row['location'];?></td>
                                            <td><a href="edit_users.php?uid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a href="#"><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">visibility</i></a></td>
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                                <div class="modal-dialog" Style="margin-top:10%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                           <h3 class="modal-title"><b>User Information</b></h3>
                                                        </div>
                                                        <div class="modal-body" >
                                                            
                                                            <h5 class="modal-title-set"><b>Name: </b><?php echo $row['user_name'];?></h5>
                                                            <h5 class="modal-title-set"><b>Email: </b><?php echo $row['user_email'];?></h5>
                                                            <h5 class="modal-title-set"><b>Mobile: </b><?php echo $row['user_mobile'];?></h5>
                                                            <h5 class="modal-title-set"><b>Street Name: </b><?php echo $row['street_name'];?></h5>
                                                            <h5 class="modal-title-set"><b>Street Number: </b><?php echo $row['street_no'];?></h5>
                                                            <h5 class="modal-title-set"><b>Flat Name: </b><?php echo $row['flat_name'];?></h5>
                                                            <h5 class="modal-title-set"><b>Flat Number: </b><?php echo $row['flat_no'];?></h5>
                                                            <h5 class="modal-title-set"><b>Location: </b><?php echo $row['location'];?></h5>
                                                            <h5 class="modal-title-set"><b>Landmark: </b><?php echo $row['landmark'];?></h5>
                                                            <h5 class="modal-title-set"><b>Pincode: </b><?php echo $row['pincode'];?></h5>
                                                            
                                                            <h5 class="modal-title-set"><b>Date : </b><?php echo $row['created_at'];?></h5>
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
         