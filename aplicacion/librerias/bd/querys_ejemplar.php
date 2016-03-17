<?php
require_once "aplicacion/librerias/bd/base_datos.php";

function select_ejemplar($id_ejemplar)
{
    $bd = obtener_conexion_base_datos();

    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "select id_ejemplar, observaciones_ejemplar, isbn from ejemplares where id_ejemplar = $1";
    
    $consulta = pg_query_params($bd['conexion'], $query, array($id_ejemplar));
    
    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se ha podido obtener información del ejemplar.'
            )
        );
    }
    
    if (pg_num_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No existe el ejemplar con id ' . $id_ejemplar
            )
        );
    }
    
    return array(
        'error' => false,
        'datos' => pg_fetch_all($consulta)
    );
}

function insert_ejemplar($ejemplar)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "insert into ejemplares (observaciones_ejemplar, isbn) values ($1, $2) returning id_ejemplar";
    
    $datos_nuevo_ejemplar = array(
        $ejemplar['observaciones_ejemplar'],
        $ejemplar['isbn'],
    );
    
    $consulta = pg_query_params($bd['conexion'], $query, $datos_nuevo_ejemplar);

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido guardar los datos del ejemplar.'
            ),
            'ejemplar' => $ejemplar
        );
    }
    
    $nuevo_ejemplar = pg_fetch_assoc($consulta);
    $ejemplar['id_ejemplar'] = $nuevo_ejemplar['id_ejemplar'];
    
    return array(
        'error' => false,
        'datos' => $ejemplar
    );
}

function update_ejemplar($id_ejemplar, $ejemplar)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "update ejemplares set observaciones_ejemplar=$2 , isbn =$3 where id_ejemplar=$1";
    

    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_ejemplar,
        $ejemplar['observaciones_ejemplar'],
        $ejemplar['isbn']
    ));

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido modificar los datos del ejemplar.'
            ),
            'ejemplar' => $ejemplar
        );
    }
}

function delete_ejemplar($id_ejemplar)
{
    $bd = obtener_conexion_base_datos();

    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "delete from ejemplares where id_ejemplar = $1";
    
    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_ejemplar
    ));
    
    cerrar_conexion_base_datos($bd['conexion']);
}