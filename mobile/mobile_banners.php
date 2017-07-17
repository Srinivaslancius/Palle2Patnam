<?php 
include "../admin/includes/config.php";
include "../admin/includes/functions.php";
//Set Array for list
$lists = array();
$response = array();
if($_SERVER['REQUEST_METHOD']=='POST'){

	$result = getAllDataCheckWithOurOrder('banners','0');
	if ($result->num_rows > 0) {
			$response["lists"] = array();
			while($row = $result->fetch_assoc()) {
				//Chedck the condioton for emptty or not		
				$lists = array();
		    	$lists["id"] = $row["id"];
		    	$lists["title"] = $row["title"];		    	
		    	$lists["image"] = $base_url."uploads/banner_images/".$row["banner"];
				array_push($response["lists"], $lists);		 
			}
			$response["success"] = 0;
			$response["message"] = "Success";				
	} else {
	    $response["success"] = 1;
	    $response["message"] = "No Records found";	   
	}
} else {
	$response["success"] = 3;
	$response["message"] = "Invalid request";
}
echo json_encode($response);

?>