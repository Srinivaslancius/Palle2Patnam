<?php
error_reporting(1);
//============================================================+
// File name   : example_048.php
// Begin       : 2009-03-20
// Last Update : 2013-05-14
//
// Description : Example 048 for TCPDF class
//               HTML tables and table headers
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: HTML tables and table headers
 * @author Nicola Asuni
 * @since 2009-03-20
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Srinivas');
$pdf->SetTitle('Palle2Patnam - Invoice');
$pdf->SetSubject('Palle2Patnam');
$pdf->SetKeywords('Palle2Patnam, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.'', PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "palle2patnam";

$price = 0;
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

include_once('../../includes/functions.php');
$uid = $_GET['uid'];

$sql = "SELECT milk_orders.id,milk_orders.total_ltr as total_ltrs,milk_orders.user_id, extra_milk_orders.extra_ltr, extra_milk_orders.order_date, milk_orders.start_date, milk_orders.end_date,users.user_name,users.id FROM milk_orders LEFT JOIN extra_milk_orders ON milk_orders.user_id=extra_milk_orders.user_id LEFT JOIN users ON users.id=milk_orders.user_id WHERE milk_orders.user_id = $uid AND DATE_FORMAT(order_date,'%Y-%m-%d') between milk_orders.start_date AND milk_orders.end_date ";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));

$sql1 = "SELECT milk_orders.id,milk_orders.total_ltr as total_ltrs,milk_orders.user_id, cancel_milk_orders.cancel_ltr, cancel_milk_orders.cancel_date, milk_orders.start_date, milk_orders.end_date,users.user_name,users.id FROM milk_orders LEFT JOIN cancel_milk_orders ON milk_orders.user_id=cancel_milk_orders.user_id LEFT JOIN users ON users.id=milk_orders.user_id WHERE milk_orders.user_id = $uid AND DATE_FORMAT(cancel_date,'%Y-%m-%d') between milk_orders.start_date AND milk_orders.end_date ";
$resultset1 = mysqli_query($conn, $sql1) or die("database error:". mysqli_error($conn));

$getTotalLtrs = "SELECT total_ltr,price_ltr from milk_orders WHERE milk_orders.user_id = $uid AND DATE_FORMAT(start_date,'%Y-%m-%d') between milk_orders.start_date AND milk_orders.end_date";
$totalltr = mysqli_query($conn, $getTotalLtrs);
$gettotal = mysqli_fetch_array($totalltr);
$TotalLtrs = $gettotal[0];
$priceinLtr = $gettotal[1];

$getUserNameName = getIndividualDetails($uid,'users','id'); 
$getGetDate = getIndividualDetails($uid,'milk_orders','id'); 

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();
//Set variables for User data
$pdf->Write(0, "Order Invoice \n ".date('M')."", '', 0, 'C', true, 0, false, false, 0); 

$pdf->SetFont('helvetica', 'B', 8);
$pdf->Write(0, "Bill To \n", '', 0, 'L', true, 0, false, false, 0); 
$pdf->SetFont('helvetica', '', 8);
$pdf->Write(0, "".$getUserNameName['street_name']. " , " . $getUserNameName['street_no']."", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "".$getUserNameName['flat_name']." , ".$getUserNameName['flat_no']."", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "".$getUserNameName['location']." , ".$getUserNameName['landmark']."", '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, "".$getUserNameName['user_mobile']." , ".$getUserNameName['user_email']."", '', 0, 'L', true, 0, false, false, 0);

$pdf->SetFont('helvetica', 'B', 9);
$pdf->Write(0, " ".$getUserNameName['user_name']."", '', 0, 'C', true, 0, false, false, 0);

$pdf->SetFont('helvetica', 'B', 8);
$pdf->Write(0, "Start Date  ".$getGetDate['start_date']."", '', 0, 'R', true, 0, false, false, 0);
$pdf->Write(0, "End Date  ".$getGetDate['end_date']."", '', 0, 'R', true, 0, false, false, 0); 


$pdf->SetFont('helvetica', '', 8);

// -----------------------------------------------------------------------------


   $tbl = '<table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:#FFFF00;color:#0000FF;">
        <td align="center"><strong>Package Name</strong></td>
        <td align="center"><strong>Total Ltrs</strong></td>    
    </tr>';
    
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center">Monthly -  Milk </td><td align="center"> '.$TotalLtrs.' </td></tr>';
    $tbl .= '</table>';

$cntExtraLtrs = mysqli_num_rows($resultset);
$cntCancelLtrs = mysqli_num_rows($resultset1);

if($cntExtraLtrs!=0) {
    $tbl .= '<table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:#FFFF00;color:#0000FF;">        
        <td align="center"><strong>Extra Ordered Milk Date</strong></td>        
        <td align="center"><strong>Ltrs</strong></td>
    </tr>';
    $total = 0;
    
    while ($milkOrderData= mysqli_fetch_array($resultset)){
      $total += $milkOrderData['extra_ltr'];
      $tbl .='<tr>                
                <td  align="center">'.$milkOrderData['order_date'].'</td>
                <td  align="center" >'.$milkOrderData['extra_ltr'].'</td>
              </tr>';
    }
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center"><b>Total Extra Lts</b></td><td align="center"><b>'.$total.'</b></td></tr>';
    $tbl .= '</table>';
}

if($cntCancelLtrs!=0) {
    $tbl .= '<table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:#FFFF00;color:#0000FF;">        
        <td align="center"><strong>Milk Cancelled Date</strong></td>        
        <td align="center"><strong>Ltrs</strong></td>
    </tr>';
    $total1 = 0;
    
    while ($milkCancelData= mysqli_fetch_array($resultset1)){
      $total1 += $milkCancelData['cancel_ltr'];
      $tbl .='<tr>                
                <td  align="center">'.$milkCancelData['cancel_date'].'</td>
                <td  align="center" >'.$milkCancelData['cancel_ltr'].'</td>
              </tr>';
    }
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center"><b>Total Cancelled Lts</b></td><td align="center"><b>'.$total1.'</b></td></tr>';
    //$tbl .= '<span style="text-align:right; font-weight:bold; font-size:13px;">Total Ltrs : '.$total.'</span>';
    $tbl .= '</table>';
}

$tbl .= '<table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:#FFFF00;color:#0000FF;">        
        
        <td align="center"><strong>Grand Total</strong></td>
    </tr>';
    $grnadTotal =  $TotalLtrs+$total-$total1;
    $grnadTotalPrice =  $grnadTotal*$priceinLtr;
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center"><b>Total <span style="text-align:right">'.$grnadTotal.'</span></b></td></tr>';
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center"><b>Price <span style="text-align:right">'.$grnadTotalPrice.'</span></b></td></tr>';
    //$tbl .= '<span style="text-align:right; font-weight:bold; font-size:13px;">Total Ltrs : '.$total.'</span>';
    $tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
