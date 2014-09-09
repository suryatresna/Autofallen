
<?php
include "../../config/modul/fpdf17/fpdf.php";
$pdf = new FPDF();


class PDF extends FPDF {

var $title;	

function set_title($string){
	return $this->title = $string;		
}
function get_title(){
	return $this->title;	
}

	
// Page header
function TitleLaporan($string)
{
    // Logo
    //$this->Image('',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,$string,0,0,'C');
    // Line break
    $this->Ln(20);
}

function Header()
{
    // Logo
    //$this->Image('',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,$this->title,0,0,'C');
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

// Simple table
function headerTable($header){
	foreach($header as $col=>$w){
        $this->Cell($w,7,$col,1);
	}
    $this->Ln();	
}
function dataTable($data){
	foreach($data as $col){
            $this->Cell(40,6,$col,1);
	}
        $this->Ln();
}
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

function match($match,$field,$table){
	$qry=mysql_query("SELECT ".$match."(".$field.") FROM ".$table."");
	$data=mysql_fetch_array($qry);
	return $data[0];	
}
	
}

?>