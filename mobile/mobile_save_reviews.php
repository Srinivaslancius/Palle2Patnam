<?php 
include "../admin/includes/config.php";
include "../admin/includes/functions.php";
//Set Array for list
$lists = array();
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){
	//Save Ratings in database
	if (isset($_REQUEST['product_id']) && !empty($_REQUEST['product_id']) && isset($_REQUEST['user_id']) && !empty($_REQUEST['user_id']) && isset($_REQUEST['rating']) && !empty($_REQUEST['rating']) && isset($_REQUEST['description']) && !empty($_REQUEST['description'])) {

		$product_id = $_REQUEST['product_id'];
		$user_id = $_REQUEST['user_id'];
		$rating = $_REQUEST['rating'];
		$description = $_REQUEST['description'];
		$status = 0;		

		$result = "INSERT INTO save_reviews (product_id, rating, description, user_id, status) VALUES ('$product_id', '$rating', '$description', '$user_id', '0')";
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