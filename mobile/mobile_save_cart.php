<?php 
include "../admin/includes/config.php";
include "../admin/includes/functions.php";
//Set Array for list
$lists = array();
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
	//Save Ratings in database
	if (isset($_REQUEST['product_id']) && !empty($_REQUEST['product_id']) && isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id']) && isset($_REQUEST['price']) && !empty($_REQUEST['price']) && isset($_REQUEST['weight_type_id']) && !empty($_REQUEST['weight_type_id']) && !empty($_REQUEST['product_quantity'])) {

		$product_id = $_REQUEST['product_id'];
		$user_id = $_REQUEST['user_id'];
		$price = $_REQUEST['price'];
		$weight_type_id = $_REQUEST['weight_type_id'];		
		$product_quantity = $_REQUEST['product_quantity'];			
		$total_price = $_REQUEST['total_price'];

		if($product_id == 1) {
			$extra_milk_date = $_REQUEST['extra_milk_date'];
		} else {
			$extra_milk_date = date("Y-m-d h:i:s");
		}

		$result = "INSERT INTO cart (product_id, user_id, price, weight_type_id,product_quantity, total_price, cart_added_date) VALUES ('$product_id', '$user_id', '$price', '$weight_type_id', '$product_quantity','$total_price', '$extra_milk_date')";
		if ($conn->query($result) === TRUE) {
            // check the conditions for query success or not
            $response["success"] = 0;            
            $response["message"] = "Save Successfully";            
        } else {
            // fail query insert problem
            $response["success"] = 2;
            $response["message"] = "Oops! An error occurred.";                      
        }

	} else {
		//If post params empty return below error
		$response["success"] = 3;
	    $response["message"] = "Required field(s) is missing";	    
	}
	
} else {

	$response["success"] = 3;
	$response["message"] = "Invalid request";
}
echo json_encode($response);

?>