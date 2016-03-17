<?php 

/* Librería: http://www.fpdf.org
 * Es una librería muy anticuada, del 2011, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/pdf/fpdf.php";

$documento_pdf = new FPDF;
$documento_pdf->SetFont('Arial', '', 12);
$documento_pdf->AddPage();

$documento_pdf->Cell(0, 10, 'Ejemplares', 0, 0, 'C');

$documento_pdf->Ln();

$titulos_columnas = array(
    'Libro'
);

foreach($titulos_columnas as $columna) {
    $documento_pdf->Cell(150, 7, utf8_decode($columna), 1);
}

$documento_pdf->Ln();

foreach ($datos['libros'] as $libro) {
    $columnas = array(
    	$libro['titulo_libro']
    );
    foreach ($columnas as $columna) {
        $documento_pdf->Cell(150, 7, utf8_decode($columna), 1);
    }
    $documento_pdf->Ln();
}
$documento_pdf->Output('libros.pdf', 'D');