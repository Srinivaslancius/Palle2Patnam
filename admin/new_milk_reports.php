<?php include_once "includes/config.php"; 
	  include_once('includes/functions.php');
?>

<?php 
if(isset($_POST['search']) && $_POST['search']!='' ) {

  //Date format changes
  $table = "milk_orders";
  $user_id = $_POST['user_id'];
  $start_date = $_POST['start_date'];
  $end_date = $_POST['end_date'];

  //Set From and To dates depends on databse search results
  $from_change_format =  date("Y-m-d", strtotime($start_date));                        
  $to_change_format   =  date("Y-m-d", strtotime($end_date));  

  if(isset($user_id) && $user_id!='' && isset($start_date) && $start_date!='' && isset($end_date) && $end_date!='' ) { 
    $statement = "`$table` WHERE `user_id` = '$user_id' AND DATE_FORMAT(start_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' ORDER BY `start_date` desc";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT * FROM {$statement} ");
  } elseif(isset($start_date) && $start_date!='' && isset($end_date) && $end_date!='' ) { 
    $statement = "`$table` WHERE DATE_FORMAT(start_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' ORDER BY `start_date` desc";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT * FROM {$statement} ");
  } elseif(isset($start_date) && $start_date!='' && isset($user_id) && $user_id!='' ) { 
    $statement = "`$table` WHERE `user_id` = '$user_id' AND DATE_FORMAT(start_date,'%Y-%m-%d') = '$from_change_format' ORDER BY `start_date` desc";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT * FROM {$statement} ");
  } elseif(isset($user_id) && $user_id!='') {

    $statement = "`$table` WHERE `user_id` = '$user_id' ORDER BY `id` desc";
    $getData = $conn->query("SELECT * FROM {$statement} ");      

  } elseif(isset($start_date) && $start_date!='' ) {
    $statement = "`$table` WHERE DATE_FORMAT(start_date,'%Y-%m-%d') = '$from_change_format' ORDER BY `start_date` desc";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT * FROM {$statement} ");   
  } elseif(isset($end_date) && $end_date!='' ) {
    $statement = "`$table` WHERE DATE_FORMAT(start_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' ORDER BY `start_date` desc";
    //echo "SELECT * FROM {$statement} "; 
    $getData = $conn->query("SELECT * FROM {$statement} ");   
  } else {
    $getData = getAllData('milk_orders');
  }
} else {
    $getData = getAllData('milk_orders');
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
<?php $sql = "SELECT users.id,users.user_name FROM users LEFT JOIN milk_orders ON milk_orders.user_id=users.id GROUP BY milk_orders.user_id";
      $result = $conn->query($sql);
?>

<div class="col s12 m12 l12">
    <div class="col s4 m4 l4">
    <form name="search" method="post" autocomplete="off">
        <select id="select-users" name="user_id">
          <option value="">Select Users</option>
          <?php while ($getAllUsers = $result->fetch_assoc()) { ?>
            <option <?php if(isset($_REQUEST['user_id']) && $_REQUEST['user_id']==$getAllUsers['id']) { echo "selected='selected'"; } ?> value="<?php echo $getAllUsers['id']; ?>"><?php echo $getAllUsers['user_name']; ?></option>
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
    <th>User Name</th>
    <!-- <th>Total Ltrs</th> -->
    <th>Start Date</th>
    <th>End Date</th>
    <th>Print</th>
  </tr>
  <?php $user_id = array(); 
        while ($row = $getData->fetch_assoc()) { 
        $user_id[] = serialize($row['user_id']);
  ?>
  <tr id="example">
    <td><?php $getUserName = getIndividualDetails($row['user_id'],'users','id'); echo $getUserName['user_name']; ?></td>
    <!-- <td><?php echo $row['total_ltr']; ?></td> -->
    <td><?php echo $row['start_date']; ?></td>
    <td><?php echo $row['end_date']; ?></td>
    <td><a href="TCPDF/examples/example_048.php?uid=<?php echo $row['user_id']; ?>" target="_blank">Print</a></td>
  </tr>
 <?php } ?>
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
<a href="TCPDF/examples/monthly_pdf_reports.php?start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>" target="_blank">Generate Reports</a>
</body>
</html>
  <script>
  $( function() {
    $( "#end_date , #start_date" ).datepicker();
  } );
  </script>
  