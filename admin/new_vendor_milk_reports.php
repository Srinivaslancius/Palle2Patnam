<?php include_once "includes/config.php"; 
	  include_once('includes/functions.php');
?>

<?php 
if(isset($_POST['search']) && $_POST['search']!='' ) {

  //Date format changes
  $table = "vendor_milk_assign";
  $user_id = $_POST['vendor_id'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];
  //echo "<pre>"; print_r($_REQUEST); die;
  //Set From and To dates depends on databse search results
  $from_change_format =  date("Y-m-d", strtotime($start_date));                        
  $to_change_format   =  date("Y-m-d", strtotime($end_date));  

  if(isset($user_id) && $user_id!='' && isset($start_date) && $start_date!='' && isset($end_date) && $end_date!='' ) {
    $statement = "`$table` WHERE `vendor_id` = '$user_id' AND DATE_FORMAT(created_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' GROUP BY `vendor_id` ";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");
  } elseif(isset($start_date) && $start_date!='' && isset($end_date) && $end_date!='' ) {
    $statement = "`$table` WHERE DATE_FORMAT(created_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' GROUP BY `vendor_id` ";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");
  } elseif(isset($start_date) && $start_date!='' && isset($user_id) && $user_id!='' ) {
    $statement = "`$table` WHERE `vendor_id` = '$user_id' AND DATE_FORMAT(created_date,'%Y-%m-%d') = '$from_change_format' GROUP BY `vendor_id` ";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");
  } elseif(isset($user_id) && $user_id!='') {
    $statement = "`$table` WHERE `vendor_id` = '$user_id' GROUP BY `vendor_id` ";
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");
  } elseif(isset($start_date) && $start_date!='' ) {
    $statement = "`$table` WHERE DATE_FORMAT(created_date,'%Y-%m-%d') = '$from_change_format' GROUP BY `vendor_id` ";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");   
  } elseif(isset($end_date) && $end_date!='' ) {
    $statement = "`$table` WHERE DATE_FORMAT(created_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' GROUP BY `vendor_id` ";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs FROM {$statement} ");   
  } else {
    $sql="select *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs from `vendor_milk_assign` GROUP BY vendor_id ";
    $getData = $conn->query($sql);
  }
} else {
    $sql="select *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs from `vendor_milk_assign` GROUP BY vendor_id ";
    $getData = $conn->query($sql);
}
?>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!DOCTYPE html>
<html>
<head>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
</head>
<body>
<?php $sql = "SELECT vendors.id,vendors.vendor_name FROM vendors LEFT JOIN vendor_milk_assign ON vendor_milk_assign.vendor_id=vendors.id GROUP BY vendor_milk_assign.vendor_id";
      $result = $conn->query($sql);
?>

<div class="col s12 m12 l12">
    <div class="col s4 m4 l4">
    <form name="search" method="post" autocomplete="off">
        <select id="select-users" name="vendor_id">
          <option value="">Select Vendor</option>
          <?php while ($getAllUsers = $result->fetch_assoc()) { ?>
            <option <?php if(isset($_REQUEST['vendor_id']) && $_REQUEST['vendor_id']==$getAllUsers['id']) { echo "selected='selected'"; } ?> value="<?php echo $getAllUsers['id']; ?>"><?php echo $getAllUsers['vendor_name']; ?></option>
          <?php } ?>
        </select>
        <input type="text" id="start_date" name="start_date" placeholder="Start Date" value="<?php if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='') { echo $_REQUEST['start_date'];  } ?>"> 
        <input type="text" id="end_date" name="end_date" placeholder="End Date" value="<?php if(isset($_REQUEST['end_date']) && $_REQUEST['end_date']!='') { echo $_REQUEST['end_date'];  } ?>"> 

        <input type="submit" name="search" value="Search">
        <input type="submit" name="reset" value="Reset" id="reset">

        
    </form>
    </div>

</div>
<div></div><br />
<table>
  <tr>
    <th>Id</th>
    <th>Vendor Name</th>    
    <th>Total Ltrs</th>    
    <th>Print</th>
  </tr>
  <?php 
        
        $i=1; 
        $vendor_id = array(); 
        $total_ltrs = 0;
        while ($row = $getData->fetch_assoc()) {           
        $vendor_id[] = serialize($row['vendor_id']);        

  ?>
  <tr id="example">
    <td><?php echo $i; ?></td>
    <td><?php $getVendorName = getIndividualDetails($row['vendor_id'],'vendors','id'); echo $getVendorName['vendor_name']; ?></td>    
    <td><?php echo $row['total_milk_vendor_ltrs']; ?></td>    
    <td> <a href="TCPDF/examples/view_vendor_milk_pdf.php?uid=<?php echo $row['vendor_id']; ?>" target="_blank">Print</a></td>
  </tr>
 <?php $i++;  } ?>
</table>
<?php 
if(isset($_REQUEST['start_date']) && $_REQUEST['start_date']!='' && isset($_REQUEST['end_date']) && $_REQUEST['end_date']!='') {
  $start_date = $_REQUEST['start_date'];
  $end_date = $_REQUEST['end_date'];
} else {
  $start_date = '';
  $end_date = '';
}

?>

<a href="TCPDF/examples/monthly_vendor_pdf_reports.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" target="_blank">Generate Reports</a>
</body>
</html>
  <script>
  $( function() {
    $( "#end_date , #start_date" ).datepicker();
  } );
  </script>
  