<?php
//============================================================+
// File name   : example_011.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 011 for TCPDF class
//               Colored Table (very simple table)
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
 * @abstract TCPDF - Example: Colored Table
 * @author Nicola Asuni
 * @since 2008-03-04
 */

$price = 0;
// Create connection

// Include the main TCPDF library (search for installation path).
include_once('../../includes/config.php');
require_once('tcpdf_include.php');
include_once('../../includes/functions.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData() {
        // Read file lines
        global $conn;
        $from_change_format =  date("Y-m-d", strtotime($_GET['start_date']));
        $to_change_format =  date("Y-m-d", strtotime($_GET['end_date']));
        if($from_change_format!='1970-01-01' && $to_change_format!='1970-01-01') {
            $getSelData = "SELECT vendors.id,vendors.vendor_name, sum(vendor_milk_assign.milk_in_ltrs) FROM vendor_milk_assign LEFT JOIN vendors ON vendor_milk_assign.vendor_id=vendors.id WHERE DATE_FORMAT(vendor_milk_assign.created_date,'%Y-%m-%d') between '$from_change_format' AND '$to_change_format' GROUP BY vendor_milk_assign.vendor_id";
        } else {
             $getSelData = "SELECT vendors.id,vendors.vendor_name, sum(vendor_milk_assign.milk_in_ltrs) FROM vendor_milk_assign LEFT JOIN vendors ON vendor_milk_assign.vendor_id=vendors.id GROUP BY vendor_milk_assign.vendor_id";
        }        

        if($conn->query($getSelData)){
            $resultset = $conn->query($getSelData);
        }else{
            die('There was an error running the query [' . $conn->error . ']');
        }
     
        //$lines = file($resultset);
        //echo "<pre>"; print_r($resultset); die;
        $data = array();
        while ($milkOrderData = $resultset->fetch_array()){
            //echo "<pre>"; print_r($milkOrderData);                
            $data[] = $milkOrderData;
        }       
        return $data;
    }

    // Colored table
    public function ColoredTable($header,$data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(30, 30, 30);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
         
        foreach($data as $row) {
            $getVendorName = getIndividualDetails($row[0],'vendors','id');
            $this->Cell($w[0], 6, $getVendorName['vendor_name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, "Milk", 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row[2], 'LR', 0, 'L', $fill);
           
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Srinivas');
$pdf->SetTitle('Palle2Patnam');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

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

// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 8);

// add a page
$pdf->AddPage();

// column titles
$header = array('Vendor Name', 'Product Name', 'Total Ltrs');

// data loading
$data = $pdf->LoadData();

// print colored table
$pdf->ColoredTable($header, $data);

// ---------------------------------------------------------

// close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+
