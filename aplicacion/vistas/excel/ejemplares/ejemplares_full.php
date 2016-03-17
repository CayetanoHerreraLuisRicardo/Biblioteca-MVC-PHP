<?php 

/* Librería: https://code.google.com/p/php-excel/
 * Es una librería muy anticuada, del 2009, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/excel/php-excel.class.php";

$xls = new Excel_XML;

$titulos_columnas = array(
	'Ejemplar',
	'ISBN'
);

$xls->addArray(array($titulos_columnas));

foreach ($datos['ejemplares'] as $ejemplar) {
    $aux = array(
    	$ejemplar['observaciones_ejemplar'],
    	$ejemplar['isbn']
    );
    $xls->addArray(array($aux));
}

$xls->generateXML("ejemplares");