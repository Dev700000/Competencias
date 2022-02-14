<?php
	include 'plantilla.php';
	require 'conexion.php';

	if (isset($_POST['id_encuesta'])){
	$id_encuesta = $_POST['id_encuesta'];
     }
   
	if (isset($_POST['d'])){
	$d = $_POST['d'];}
	//select Empresas.Nombre,Servicios.Servicio from Empresas inner join Servicios
	
	$query = "SELECT encuestas.titulo,encuestas.descripcion,encuestas.fecha_inicial,preguntas.pregunta FROM encuestas INNER JOIN preguntas on id_encuesta = '$id_encuesta' AND id_enc = '$id_encuesta'";
	$consulta = mysqli_query ($mysqli,"SELECT * FROM preguntas WHERE id_enc ='$id_encuesta'")
or die ("error al actualizar los datos");
	$resultado = $mysqli->query($query);
	$row = $resultado->fetch_assoc();
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetXY(65,35);
	$pdf->SetFillColor(0,150,255);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(80,6,'Titulo',1,0,'C',1);
	$pdf->SetXY(170,35);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(30,6,'Fecha',1,1,'C',1);
	$pdf->SetX(65);
	$pdf->SetFont('Arial','',10);
    $pdf->Cell(80,6,utf8_decode($row['titulo']),1,0,'C');
    $pdf->SetX(170);
	$pdf->SetFont('Arial','',10);
	$pdf->Cell(30,6,utf8_decode($row['fecha_inicial']),1,1,'C');
	$pdf->SetY(55);
    $pdf->SetFont('Arial','B',12);
	$pdf->Cell(190,6,'Descripcion',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	$pdf->MultiCell(190,5,utf8_decode($row['descripcion']),1,'C');
	$pdf->SetY(80);
	$pdf->SetFont('Arial','B',12);
    $pdf->Cell(190,6,'Preguntas',1,1,'C',1);
    $pdf->SetFont('Arial','',10);
    $i = 1;
    while($row1 = mysqli_fetch_assoc($consulta))
    {
    $pdf->Cell(190,6,utf8_decode($i.':'.$row1['pregunta']),1,1,'C');
    $i++;
}
	
	if (isset($d)){
	$pdf->Output('D');}
	else {
		$pdf->Output();
	}
?>