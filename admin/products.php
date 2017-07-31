            <?php include_once 'main_header.php'; ?>
           
            <?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <div class="row">
                    
                    <div class="col s12 m12 l12">
                        <div class="card">
                            <div class="card-content">
                                 <a href="add_products.php" style="float:right">Add Product</a>
                                <span class="card-title">Products</span>

                                <?php $sql = "SELECT products.category_id, categories.category_name FROM products LEFT JOIN categories ON products.category_id=categories.id GROUP BY products.category_id";
                                      $result = $conn->query($sql);
                                ?>

                                <div class="col s12 m12 l12">
                                    <div class="col s4 m4 l4">
                                        <select id="select-category">
                                          <option value="">Select Category</option>
                                          <?php while ($getAllCategories = $result->fetch_assoc()) { ?>
                                            <option value="<?php echo $getAllCategories['category_name']; ?>"><?php echo $getAllCategories['category_name']; ?></option>
                                          <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <?php $getData = getAllDataWithActiveRecent('products'); $i=1; ?>
                                <table id="example" class="display responsive-table datatable-example">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Product Name</th>
                                            <th>Category Name</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>                                    
                                    <tbody>
                                        <?php while ($row = $getData->fetch_assoc()) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $row['product_name'];?></td>
                                            <td><?php $getCategoryName = getIndividualDetails($row['category_id'],'categories','id'); echo $getCategoryName['category_name']; ?></td>
                                            <td><?php if($row['status'] == 0){ echo "Active";}else{ echo "In Active";}?></td>
                                            <td><a href="edit_products.php?pid=<?php echo $row['id']; ?>"><i class="material-icons dp48">edit</i></a><a class="click_view" data-modalId="<?php echo $row['id']?>" href="#"><i class="material-icons dp48">pageview</i></a>
                                            
                                            <div id="myModal_<?php echo $row['id']; ?>" class="modal fade" >
                                                <div class="modal-dialog" Style="margin-top:10%;">
                                                    <div class="modal-content">
                                                        <div class="modal-header">                                                            
                                                            <h3 class="modal-title"><b>Product Information</b> </h3>
                                                        </div>
                                                        <div class="modal-body" >
                                                            <h5 class="modal-title-set"><b>Name: </b><?php echo $row['product_name'];?></h5>
                                                            <h5 class="modal-title-set"><b>Features: </b><?php echo strip_tags($row['key_features']);?></h5>
                                                            <h5 class="modal-title-set"><b>Info: </b><?php echo strip_tags($row['product_info']);?></h5>
                                                            <h5 class="modal-title-set"><b>About: </b><?php echo strip_tags($row['about']);?></h5>
                                                            
                                                            <h5 class="modal-title-set"><b>Category Type: </b><?php $getCategoryName = getIndividualDetails($row['category_id'],'categories','id'); echo $getCategoryName['category_name']; ?></h5>

                                                            <h5 class="modal-title-set"><b>Weight: </b><?php $getProductWeight = getIndividualDetails($row['weight_type_id'],'product_weights','id'); echo $getProductWeight['weight_type']; ?></h5>

                                                            <h5 class="modal-title-set"><b>Avalabilty: </b><?php $getAvalability = getIndividualDetails($row['availability_id'],'products','id'); echo $getAvalability['availability_id']; ?></h5>

                                                            <h5 class="modal-title-set"><b>Status :</b><?php if($row['status'] == 0){ echo "Active";}else{ echo "In Active";}?></h5>
                                                        </div>
                                                        <div class="modal-footer" >
                                                              <button type="button" class="btn" data-dismiss="modal" style="background-color:#f00; color:#fff">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div> 

                                        </tr>               
                                        <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
         <?php include_once 'footer.php'; ?>         
        <!-- model pop-up Script for all pages with bootstrap js -->        
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".click_view").click(function(){
                    var modalId = $(this).attr('data-modalId');
                    $("#myModal_"+modalId).modal('show');  
                });                  
            });
        </script>