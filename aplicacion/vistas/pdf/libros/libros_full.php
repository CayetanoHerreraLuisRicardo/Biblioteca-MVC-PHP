<?php 

/* Librería: http://www.fpdf.org
 * Es una librería muy anticuada, del 2011, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/pdf/fpdf.php";

$documento_pdf = new FPDF;
$documento_pdf->SetFont('Arial', '', 10);
$documento_pdf->AddPage();

$documento_pdf->Cell(0, 8, 'Ejemplares', 0, 0, 'C');

$documento_pdf->Ln();

$titulos_columnas = array(
	'Titulo del libro'
);

$titulos_columnas2 = array(
    'Editorial',
    'Año de publicacion'
);

foreach($titulos_columnas as $columna) {
    $documento_pdf->Cell(126, 7, utf8_decode($columna), 1);
}

foreach($titulos_columnas2 as $columna2) {
    $documento_pdf->Cell(32, 7, utf8_decode($columna2), 1);
}

$documento_pdf->Ln();

foreach ($datos['libros'] as $libro) {
    $columnas = array(
    	$libro['titulo_libro']
    );

    $columnas2 = array(
        $libro['editorial_libro'],
        $libro['anio_publicacion_libro']
    );

    foreach ($columnas as $columna) {
        $documento_pdf->Cell(126, 7, utf8_decode($columna), 1);
    }
    foreach ($columnas2 as $columna) {
        $documento_pdf->Cell(32, 7, utf8_decode($columna), 1);
    }

    $documento_pdf->Ln();
}
$documento_pdf->Output('libros.pdf', 'D');