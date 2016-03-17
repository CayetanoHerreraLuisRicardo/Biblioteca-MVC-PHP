<?php
require_once "aplicacion/librerias/bd/base_datos.php";

function select_autores()
{
    $bd = obtener_conexion_base_datos();
 
    if ($bd['error'] == true) {
        return $bd;
    }
    
    $query = "
        select
            id_autor,
            nombre_autor,
            nacionalidad_autor
        from
            autores
        order by
            nombre_autor";
    
    $consulta = pg_query_params($bd['conexion'], $query, array());

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false) {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se ha podido obtener información de los autores.'
            )
        );
    }
    
    return array(
        'error' => false,
        'datos' => pg_fetch_all($consulta)
    );
}