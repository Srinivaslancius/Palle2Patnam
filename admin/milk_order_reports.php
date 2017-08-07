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
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php $getUserName = getIndividualDetails($row['user_id'],'users','id'); echo $getUserName['user_name']; ?></td>
                                            <td><?php echo $row['total_ltr'];?></td>
                                            <td><?php echo $row['start_date'];?></td>
                                            <td><?php echo $row['end_date'];?></td>
                                            <td><a href="#" class="click_view" data-modalId="<?php echo $row['id']?>" > <i class="material-icons dp48">visibility</i> <a/></td>
                                            <!-- <td><a href="edit_weight.php?wid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a></td> -->

                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                                <div class="modal-dialog" Style="margin-top:10%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">                                                            
                                                            <h3 class="modal-title"><b>Product Information</b> </h3>
                                                        </div>
                                                        <div class="modal-body" >
                                                           <p>  Name : <?php echo $getUserName['user_name']; ?> </p>
                                                           <p>  Mobile : <?php echo $getUserName['user_mobile']; ?> </p>
                                                           <p>  Email : <?php echo $getUserName['user_email']; ?> </p>
                                                           <p>  Address : <?php echo $getUserName['street_name'] . "," . $getUserName['street_no'] . "," . $getUserName['flat_name'] . "," . $getUserName['flat_no'] . "," . $getUserName['location'] . "," . $getUserName['landmark']; ?> </p>

                                                           <?php $total=0; $sqlqu = "SELECT total_ltr,price_ltr,total_ltr_price FROM milk_orders WHERE user_id =  ". $row['user_id']." AND MONTH(`start_date`) = MONTH(CURDATE()) AND YEAR(`start_date`) = YEAR(CURDATE())"; 
                                                                $result = $conn->query($sqlqu);
                                                                $val=  $result->fetch_assoc();
                                                           ?>
                                                           <?php $sqlqu2 = "SELECT total_ltr,extra_ltr,order_date FROM extra_milk_orders WHERE user_id =  ". $row['user_id']." AND MONTH(`order_date`) = MONTH(CURDATE()) AND YEAR(`order_date`) = YEAR(CURDATE())"; 
                                                                $result2 = $conn->query($sqlqu2);                                   
                                                           ?>
                                                           <?php $sqlqu3 = "SELECT total_ltr,cancel_ltr,cancel_date FROM cancel_milk_orders WHERE user_id =  ". $row['user_id']." AND MONTH(`cancel_date`) = MONTH(CURDATE()) AND YEAR(`cancel_date`) = YEAR(CURDATE())"; 
                                                                $result3 = $conn->query($sqlqu3);                                   
                                                           ?>
                                                            <p style="font-weight:bold; text-align:center"> Extra Ltrs in this Month  </p>

                                                            <div class="mytable">
                                                                <div>
                                                                    <div>Order Date</div>
                                                                    <div>Ltrs</div>                                                        
                                                                </div>   
                                                                <div>
                                                                <?php while($val2=  $result2->fetch_assoc()) { 
                                                                      $total += $val2['extra_ltr'];
                                                                 ?>
                                                                    <div><?php echo $val2['order_date']; ?></div>
                                                                    <div><?php echo $val2['extra_ltr']; ?></div>                       
                                                                <?php } ?>
                                                                </div>
                                                            </div>
                                                            <div class="clear_fix"></div>
                                                            <p style="font-weight:bold; text-align:center"> Cancelled Ltrs in this Month  </p>

                                                            <div class="mytable">
                                                                <div>
                                                                    <div>Cancelled Date</div>
                                                                    <div>Ltrs</div>                                                        
                                                                </div>   
                                                                <div>
                                                                <?php while($val3=  $result3->fetch_assoc()) { ?>
                                                                    <div><?php echo $val3['cancel_date']; ?></div> 
                                                                    <div><?php echo $val3['cancel_ltr']; ?></div>                   
                                                                <?php } ?>
                                                                </div>
                                                            </div>

                                                            <p style="font-weight:bold; text-align:center"> Total Ltrs in this Month  </p>
                                                            <?php echo $total += $val2['extra_ltr']+$row['total_ltr']; ?>

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
<style type="text/css">
div.mytable {
    display: table;
    width: 100%;
}

div.mytable > div {
    display: table-row;
    width: 100%;
}
div.mytable > div > div {
    display: table-cell;
    width: 20%;
    padding:1em;
}
</style>