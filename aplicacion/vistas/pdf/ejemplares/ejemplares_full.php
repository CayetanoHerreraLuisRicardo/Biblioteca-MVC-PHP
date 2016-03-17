<?php 

/* Librería: http://www.fpdf.org
 * Es una librería muy anticuada, del 2011, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/pdf/fpdf.php";

$documento_pdf = new FPDF;
$documento_pdf->SetFont('Arial', '', 9);
$documento_pdf->AddPage();

$documento_pdf->Cell(0, 9, 'Ejemplares', 0, 0, 'C');

$documento_pdf->Ln();

$titulos_columnas = array(
	'Ejemplar'
);

$titulos_columnas2 = array(
    'ISBN'
);

foreach($titulos_columnas as $columna) {
    $documento_pdf->Cell(140, 7, utf8_decode($columna), 1);
}

foreach($titulos_columnas2 as $columna) {
    $documento_pdf->Cell(50, 7, utf8_decode($columna), 1);
}

$documento_pdf->Ln();

foreach ($datos['ejemplares'] as $ejemplar) {
    $columnas = array(
    	$ejemplar['observaciones_ejemplar']
    );
    $columnas2 = array(
        $ejemplar['isbn']
    );

    foreach ($columnas as $columna) {
        $documento_pdf->Cell(140, 7, utf8_decode($columna), 1);
    }
    foreach ($columnas2 as $columna) {
        $documento_pdf->Cell(50, 7, utf8_decode($columna), 1);
    }
    $documento_pdf->Ln();
}
$documento_pdf->Output('ejemplares.pdf', 'D');