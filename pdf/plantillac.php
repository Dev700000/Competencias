<?php	
require 'fpdf/fpdf.php';


	class PDF extends FPDF
	{
		/*function Header()
		{
			
	error_reporting(1);
			$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get('America/Mexico_City');
$fecha = date("d-m-y ");
			$this->Image('../img/Logo.png', 5, 5, 30 );
			$this->SetFont('Arial','B',15);
			$this->Cell(40);
			$this->Cell(120,10, utf8_decode('Reporte de evaluación'),0,0,'C');
			$this->Ln(20);
			$this->SetFont('Arial','B',10);
			$this->SetXY(170,10);
			$this->Cell(30,6,'Fecha',0,0,'C');
			$this->SetXY(175,20);
            $this->SetFont('Arial','',10);
			$this->Cell(20,6,$fecha,0,0,'C');
		}
		*/
		function Footer()
		{
			$this->SetY(-11);
			$this->Cell(0,10, utf8_decode(''),0,0,'C' );
			$this->SetY(-15);
			$this->SetFont('Arial','I', 8);
			$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
		}		
	}
?>