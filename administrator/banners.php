   
<div class="mn-content fixed-sidebar">
<header class="mn-header navbar-fixed">
<?php include_once'header.php';?>
</header>
<link href="assets/plugins/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<main class="mn-inner">
<div class="row">
<div class="col s12">
    <div class="page-title">Banners</div>
</div>
<?php $getData = getAllData('banners'); ?>
<div class="col s12 m12 l12">
    <div class="card">  
        <div class="card-content">                               
           <a href="add_banners.php" style="float:right">Add Banners</a>
            <table id="example" class="display responsive-table datatable-example">
                <thead>
                    <tr>
                        <th>Banner Title</th>
                        <th>Banner </th>                                                                  
                        <th>Actions</th>
                    </tr>
                </thead>
                
                <tbody>
                    <?php while ($row = $getData->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $row['title'];?></td>
                        <td><img src="<?php echo $base_url . 'uploads/banner_images/'.$row['banner'] ?>" height="100" width="100"/></td>                        
                        <td><a href="edit_banners.php?bid=<?php echo $row['id']; ?>">Edit</a></td>
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
