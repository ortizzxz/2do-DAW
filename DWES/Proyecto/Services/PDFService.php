<?php

namespace Services;

use FPDF;

class PDFService
{
    public function generarPDFReservas($butacas, $usuario)
    {
        // Crear una instancia de FPDF
        $pdf = new FPDF();
        $pdf->AddPage();
        
        // Establecer el título del documento
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(200, 10, "Reserva de Entradas", 0, 1, 'C');

        // Comprobar si los datos del usuario están definidos antes de mostrarlos
        $pdf->Ln(10); // Salto de línea
        $pdf->SetFont('Arial', '', 12);
        if (isset($usuario['nombre'], $usuario['apellido'])) {
            $pdf->Cell(100, 10, "Usuario: " . $usuario['nombre'] . " " . $usuario['apellido']);
        } else {
            $pdf->Cell(100, 10, "Usuario: Información no disponible");
        }
        $pdf->Ln(10); 
        if (isset($usuario['email'])) {
            $pdf->Cell(100, 10, "Correo: " . $usuario['email']);
        } else {
            $pdf->Cell(100, 10, "Correo: Información no disponible");
        }
        $pdf->Ln(10); 
        if (isset($usuario['id'])) {
            $pdf->Cell(100, 10, "ID de Usuario: " . $usuario['id']);
        } else {
            $pdf->Cell(100, 10, "ID de Usuario: Información no disponible");
        }
        $pdf->Ln(10);

        // Mostrar las reservas
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(50, 10, 'Fila Butaca', 1);
        $pdf->Cell(50, 10, 'Numero Butaca', 1);
        $pdf->Cell(50, 10, 'Fecha Reserva', 1);
        $pdf->Ln();

        // Comprobar si las claves de las reservas están definidas antes de mostrarlas
        $pdf->SetFont('Arial', '', 12);
        foreach ($butacas as $butaca) {
            if (isset($butaca['fila'], $butaca['numero'], $butaca['fecha_reserva'])) {
                $pdf->Cell(50, 10, $butaca['fila'], 1);
                $pdf->Cell(50, 10, $butaca['numero'], 1);
                $pdf->Cell(50, 10, $butaca['fecha_reserva'], 1);
                $pdf->Ln();
            } else {
                $pdf->Cell(50, 10, 'No disponible', 1);
                $pdf->Cell(50, 10, 'No disponible', 1);
                $pdf->Ln();
            }
        }

        // Salida del PDF al navegador
        $pdf->Output('D', 'reserva_butacas_' . (isset($usuario['id']) ? $usuario['id'] : 'desconocido') . '.pdf');
    }
}
