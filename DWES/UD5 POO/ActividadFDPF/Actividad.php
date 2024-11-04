<?php
require('./fpdf186/fpdf.php');

$pdf = new FPDF('P','mm','A4');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Image('IESAyala.jpeg', 10, 10, 30); 
$pdf->Ln(20);
$pdf->Cell(0, 10, "Lista de Estudiantes", 0, 1, "C");
$pdf->Ln(10);

$pdf->SetFont('Arial','B',12);

$nombres = [
    'Juan',
    'Pepe',
    'Miguel',
    'Carlos',
    'Jesus',
    'Maria'
];

$apellidos = [
    'Ortiz',
    'Reyes',
    'Peregrina',
    'Aurelio',
    'Chavez',
    'Castro'
];

//tabla pdf
$pdf->Cell(60, 10, "Numero Estudiante", 1, 0, "C");
$pdf->Cell(130, 10, "Estudiante", 1, 1, "C");

$pdf->SetFont('Arial','',12);


for ($i=0; $i < 20; $i++) { 
    $pdf->Cell(60, 10, ($i+1), 1, 0, "C");
    $pdf->Cell(130, 10, ($apellidos[rand(0,5)] . " " . $nombres[rand(0,5)]), 1, 1, "C");
}

$pdf->Output(); 