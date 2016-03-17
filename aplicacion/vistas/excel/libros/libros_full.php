<?php 

/* Librería: https://code.google.com/p/php-excel/
 * Es una librería muy anticuada, del 2009, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/excel/php-excel.class.php";

$xls = new Excel_XML;

$titulos_columnas = array(
	'Titulo del libro',
	'Editorial',
	'Año de publicacion'
);

$xls->addArray(array($titulos_columnas));

foreach ($datos['libros'] as $libros) {
    $aux = array(
    	$libros['titulo_libro'],
    	$libros['editorial_libro'],
    	$libros['anio_publicacion_libro']
    );
    $xls->addArray(array($aux));
}

$xls->generateXML("libros");