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

$sql = "select *,SUM(milk_in_ltrs) AS total_milk_vendor_ltrs from `vendor_milk_assign` WHERE vendor_id = '$uid' ";
$resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
$row = $resultset->fetch_assoc();
$getUserNameName = getIndividualDetails($uid,'vendors','id'); 

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', 'B', 12);

// add a page
$pdf->AddPage();
//Set variables for User data
$pdf->Write(0, "Vendor Report \n ".date('M')."", '', 0, 'C', true, 0, false, false, 0); 

$pdf->SetFont('helvetica', 'B', 12);
$pdf->Write(0, " ".$getUserNameName['vendor_name']."", '', 0, 'C', true, 0, false, false, 0);   
$pdf->SetFont('helvetica', 'B', 8);
// -----------------------------------------------------------------------------

   $tbl = '<table cellspacing="0" cellpadding="2" border="1">
    <tr style="background-color:#FFFF00;color:#0000FF;">
        <td align="center"><strong>Package Name</strong></td>
        <td align="center"><strong>Total Ltrs</strong></td>    
    </tr>';
    
    $tbl .='<tr style="background-color:#e0e0e0;"><td align="center">Monthly -  Milk </td><td align="center"> '.$row['total_milk_vendor_ltrs'].' </td></tr>';
    $tbl .= '</table>';

$pdf->writeHTML($tbl, true, false, false, false, '');


// -----------------------------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_048.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
