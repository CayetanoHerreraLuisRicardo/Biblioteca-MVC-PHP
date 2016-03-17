<?php

require_once "aplicacion/librerias/bd/base_datos.php";

function select_libros()
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "select id_libro,isbn_libro, titulo_libro, editorial_libro, anio_publicacion_libro from libros order by titulo_libro";
    
    $consulta = pg_query_params($bd['conexion'], $query, array());

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se ha podido obtener información de los libros.'
            )
        );
    }
    
    return array(
        'error' => false,
        'datos' => pg_fetch_all($consulta)
    );
}