<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "palle2patnam";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

include_once('includes/functions.php');
$uid = $_GET['uid'];

$sql = "SELECT milk_orders.id,milk_orders.total_ltr as total_ltrs,milk_orders.user_id, extra_milk_orders.extra_ltr, extra_milk_orders.order_date, milk_orders.start_date, milk_orders.end_date,users.user_name,users.id FROM milk_orders LEFT JOIN extra_milk_orders ON milk_orders.user_id=extra_milk_orders.user_id LEFT JOIN users ON users.id=milk_orders.user_id WHERE milk_orders.user_id = $uid AND DATE_FORMAT(order_date,'%Y-%m-%d') between milk_orders.start_date AND milk_orders.end_date ";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
//$row = mysqli_fetch_assoc($resultset);

require('fpdf/fpdf.php');
$test = "dasd";
class PDF extends FPDF
{
	// Page header
	function Header()
	{
	    // Logo
	    $this->Image('mobile-01.png',10,6,30);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Move to the right
	    $this->Cell(80);
	    // Title
	    $this->Cell(60,10,'Invoice ',1,0,'C');
	    // Line break
	    $this->Ln(20);
	}

	// Page footer
	function Footer()
	{
	    // Position at 1.5 cm from bottom
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Page number
	    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	}
}

$pdf = new PDF();
$pdf->AliasNbPages();	
$pdf->SetFont('Times','',12);
$pdf->AddPage();

$getUserNameName = getIndividualDetails($uid,'users','id'); 
$getGetDate = getIndividualDetails($uid,'milk_orders','id'); 
$pdf->Cell(0,10,'Customer Name : '.$getUserNameName['user_name'],0,1);
$pdf->Cell(0,10,'Start Date : '.$getGetDate['start_date'],0,1);
$pdf->Cell(0,10,'End Date : '.$getGetDate['end_date'],0,1);
while ($milkOrderData= mysqli_fetch_array($resultset)){
	//echo "<pre>"; print_r($milkOrderData); 
	// Instanciation of inherited class	
	//Display Data from Db
	
	$pdf->Cell(0,10,'Date : '.$milkOrderData['start_date'],0,1);	
	
}

$pdf->Output();
?>