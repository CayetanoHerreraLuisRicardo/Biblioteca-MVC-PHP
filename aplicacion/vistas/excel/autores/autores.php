<?php 

/* Librería: https://code.google.com/p/php-excel/
 * Es una librería muy anticuada, del 2009, sin embargo
 * para demostrar de forma básica la integración de otra
 * librería nos es más que suficiente.
 */
require "aplicacion/librerias/excel/php-excel.class.php";

$xls = new Excel_XML;

$titulos_columnas = array(
	'Autor'
);

$xls->addArray(array($titulos_columnas));

foreach ($datos['autores'] as $autor) {
    $aux = array(
    	$autor['nombre_autor']
    );
    $xls->addArray(array($aux));
}

$xls->generateXML("autores");