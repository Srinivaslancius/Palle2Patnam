<?php include_once 'main_header.php'; ?>
           
<?php include_once 'side_navigation.php';?>

            <main class="mn-inner">
                <?php 
                $result = $conn->query("SELECT count(*) AS total FROM `orders` WHERE `order_date` > DATE_SUB(CURDATE(), INTERVAL 1 WEEK)");
                $row = $result->fetch_assoc();
                $sum = $row['total'];
                $result1 = $conn->query("SELECT count(*) AS total1 FROM `orders` WHERE `order_date` > DATE_SUB(CURDATE(), INTERVAL 1 MONTH)");
                $row1 = $result1->fetch_assoc();
                $sum1 = $row1['total1'];
                $result2 = $conn->query("SELECT count(*) AS total2 FROM `orders` WHERE `order_date` > DATE_SUB(CURDATE(), INTERVAL 12 MONTH)");
                $row2 = $result2->fetch_assoc();
                $sum2 = $row2['total2'];
                $result3 = $conn->query("SELECT count(*) AS total3 FROM `orders`");
                $row3 = $result3->fetch_assoc();
                $sum3 = $row3['total3'];
                ?>

                <div>
                    <div class="row no-m-t no-m-b">
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    
                                </div>
                                <span class="card-title">Orders</span>
                                <span class="stats-counter"><span class="counter"><?php echo $sum;?></span><small>This week</small></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                </div>
                                <span class="card-title">Orders</span>
                                <span class="stats-counter"><span class="counter"><?php echo $sum1;?></span><small>This month</small></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    
                                </div>
                                <span class="card-title">Orders</span>
                                <span class="stats-counter"><span class="counter"><?php echo $sum2;?></span><small>This Year</small></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    
                                </div>
                                <span class="card-title">Orders</span>
                                <span class="stats-counter"><span class="counter"><?php echo $sum3;?></span><small>Total</small></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                   
                                </div>
                                <span class="card-title">Admin Users</span>
                                <span class="stats-counter"><span class="counter"><?php echo getRowsCount('admin_users');?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">                                
                                <span class="card-title">Customers</span>
                                <span class="stats-counter"><span class="counter"><?php echo getRowsCount('users');?></span></span>
                            </div>
                            <div id="sparkline-bar"></div>
                        </div>
                    </div>
                    <div class="col s12 m12 l3">
                        <div class="card stats-card">
                            <div class="card-content">
                                <div class="card-options">
                                    
                                </div>
                                <span class="card-title">Products</span>
                                <span class="stats-counter"><span class="counter"><?php echo getRowsCount('products');?></span></span>
                            </div>
                            <div id="sparkline-line"></div>
                        </div>
                    </div>
                
                   
                </div>
                    
                </div>
               
                <div class="row">                    
                    <div class="col s12 m6 l6">                        
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title">Chart For Orders</span>
                                <div id="flot3"></div>
                            </div>
                        </div>
                    </div>                 
                </div>
                
            </main>
        

        <?php
            $status1 = 'Completed';
            $status2 = 'InProgress';
            $status3 = 'Failure';
            $sql4= "SELECT COUNT(*) AS total FROM orders WHERE `order_status` = '".$status1."'";
            $result4 = $conn->query($sql4);
            $row = $result4->fetch_assoc();
            $CompalteCount = $row['total'];
            $sql6= "SELECT COUNT(*) AS total FROM orders WHERE `order_status` = '".$status2."'";
            $result5 = $conn->query($sql6);
            $row2 = $result5->fetch_assoc();
            $progressCount = $row2['total'];
            $sql7= "SELECT COUNT(*) AS total FROM orders WHERE `order_status` = '".$status3."'";
            $result7 = $conn->query($sql7);
            $row4 = $result7->fetch_assoc();
            $fasil = $row4['total'];
            //$row = $result->fetch_assoc();
            //echo "<pre>"; print_r($row);     die;
        ?>
        <?php include_once 'footer.php'; ?>

        <script type="text/javascript">
            $(document).ready(function() {
                
                var flot3 = function () {
                    var data = [{
                        label: "Completed Orders",
                        data: <?php echo $CompalteCount;?>,
                        color: "#3366CC",
                    }, {
                        label: "In Progress Orders",
                        data: <?php echo $progressCount;?>,
                        color: "#ff9800",
                    }, {
                        label: "Pending Orders",
                        data: <?php echo $fasil;?>,
                        color: "#82b1ff",
                    }];
                    var options = {
                        series: {
                            pie: {
                                show: true
                            }
                        },
                        legend: {
                            labelFormatter: function(label, series){
                                return '<span class="pie-chart-legend">'+label+'</span>';
                            }
                        },
                        grid: {
                            hoverable: true
                        },
                        tooltip: true,
                        tooltipOpts: {
                            content: "%p.0%, %s",
                            shifts: {
                                x: 20,
                                y: 0
                            },
                            defaultTheme: false
                        }
                    };
                    $.plot($("#flot3"), data, options);
                };

                flot3();
               
            });
        </script>
        
        <!-- Javascripts -->        
        <script src="assets/plugins/nvd3/nv.d3.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.time.min.js"></script>             
        <script src="assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="assets/plugins/flot/jquery.flot.pie.min.js"></script>      
        
  