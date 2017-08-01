            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                <a href="add_milk_vendors.php" style="float:right">Add Milk Vendor</a>
                                <span class="card-title">Milk Vendors</span>
                                
                                <?php $getData = getAllData('vendor_milk_assign'); ?>
                                <?php $sql = "SELECT vendors.id, vendors.vendor_name FROM vendors LEFT JOIN vendor_milk_assign ON vendors.id=vendor_milk_assign.vendor_id GROUP BY vendors.id";
                                    $result = $conn->query($sql);
                                ?>
                                <div class="col s12 m12 l12">
                                    <div class="col s4 m4 l4">
                                        <select id="select-vendor">
                                          <option value="">Select Vendor</option>
                                          <?php while ($getAllVendorsList = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $getAllVendorsList['vendor_name']; ?>"><?php echo $getAllVendorsList['vendor_name']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Vendor Name</th>
                                           <th>Created Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php $getVendorName = getIndividualDetails($row['vendor_id'],'vendors','id'); echo $getVendorName['vendor_name']; ?></td>
                                            <td><?php echo $row['created_date'];?></td>
                                            <td><a href="edit_milk_venodrs.php?id=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a></td>
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
         