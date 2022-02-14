<?php
session_start(); 
$id_company=$_SESSION['id_company'];
 
	include 'plantillac.php';
	require 'conexion.php';
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();

			$hora = new DateTime("now", new DateTimeZone('America/Mexico_City'));
date_default_timezone_get();
$fecha = date("d-m-y ");
			$pdf->Image('../img/Logo.png', 5, 5, 30 );
			$pdf->SetFont('Arial','B',15);
			$pdf->Cell(40);
			$pdf->Cell(120,10, utf8_decode('Universidad Tecnológica de Acapulco'),0,1,'C');
	$pdf->SetX(50);
	$pdf->Cell(120,10, utf8_decode('Departamento Recursos Humanos'),0,1,'C');
	$pdf->SetX(50);
	$pdf->Cell(120,10, utf8_decode('Resultados de la evaluación'),0,0,'C');
			$pdf->Ln(20);
			$pdf->SetFont('Arial','B',10);
			$pdf->SetXY(170,10);
			$pdf->Cell(30,6,'Fecha',0,0,'C');
			$pdf->SetXY(175,20);
            $pdf->SetFont('Arial','',10);
			$pdf->Cell(20,6,$fecha,0,0,'C');


$fn = date("20y-m-d ");
	if (isset($_POST['fi']) AND isset($_POST['fn'])){
		$fi =$_POST['fi'];
		$fn = $_POST['fn'];
		$query = "SELECT * FROM respuestas_generales WHERE id_company ='$id_company' AND fecha BETWEEN '$fi'AND '$fn'  order by promedio";
	    $resultado = $mysqli->query($query);
	}
	else {
     $fi = '1998-03-02';
     $query = "SELECT * FROM respuestas_generales WHERE id_company ='$id_company' AND fecha BETWEEN '$fi'AND '$fn' order by promedio";
	    $resultado = $mysqli->query($query);
	}
	

	$pdf->SetFillColor(0,150,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->SetY(45);
	$pdf->Cell(105,8,utf8_decode('ÁREA'),1,0,'C',1);
	$pdf->Cell(40,8,'PROMEDIO',1,0,'C',1);
	$pdf->Cell(50,8,utf8_decode('VALORACIÓN'),1,1,'C',1);
    
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_array())

	{
		$pdf->Cell(105,8,utf8_decode($row['area']),1,0,'C',0);
		
		$pdf->Cell(40,8,round($row['promedio'],1),1,0,'C',0);
		$pdf->Cell(50,8,utf8_decode($row['valoracion']),1,1,'C',0);
	}
	 $consulta = mysqli_query ($mysqli,"SELECT id_company FROM respuestas_generales WHERE id_company ='$id_company'")
or die ("error al actualizar los datos");
$sql="SELECT area,promedio FROM respuestas_generales WHERE id_company ='$id_company'";
$sql1="SELECT SUM(promedio) as total FROM respuestas_generales WHERE id_company ='$id_company'";
$result1 = mysqli_query($mysqli,$sql1);


$sumar =mysqli_fetch_assoc($result1);
$row_cnt = $consulta->num_rows;
/*echo "nummero de resultados ".$row_cnt;
echo "<br>";
echo $sumar['total'];*/

	//echo "el promedio es: ".$promedio;
	$res = $sumar['total'] / $row_cnt;
	//echo "el promedio es: ".$promedio;
	 if ($res <=20){
            $resultado1 = 'Nada productivo';
          
          }
          else if (($res > 21.0 ) and ($res <= 35.9)){
            $resultado1 = "Nada productivo";
           
          }
          else if (($res > 36 )and ($res<= 51.9)){
            $resultado1 ='Poco productivo';
          }
          else if (($res >52 )and ($res<=67.9)){
             $resultado1 = "Regular";
            
          }
          else if (($res >68 )and ($res <= 83.9)){
            $resultado1 = "Productivo";
          
          }
          else if (($res>84 )and ($res <= 100)){
             $resultado1 = "Muy productivo";
           
          }
          $pdf->SetFillColor(0,150,255);
        
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,8," ",0,1,'C',0);
	  $pdf->SetX(115);
$pdf->Cell(40,8,utf8_decode('Promedio general'),1,0,'C',1);
$pdf->SetFont('Arial','',10);

	$pdf->Cell(50,8,round($res,1)." ".$resultado1,1,0,'C',0);
	
	

	$pdf->Output();
?>