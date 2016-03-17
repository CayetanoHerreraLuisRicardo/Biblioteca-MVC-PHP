<?php

require_once "aplicacion/librerias/bd/base_datos.php";

function select_libro($id_libro)
{
    $bd = obtener_conexion_base_datos();
 
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "select id_libro, isbn_libro, titulo_libro, editorial_libro, anio_publicacion_libro from libros where id_libro = $1";
    
    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_libro
    ));
    
    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se ha podido obtener información del libro.'
            )
        );
    }
    
    if (pg_num_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No existe el libro con id ' . $id_libro
            )
        );
    }
    
    return array(
        'error' => false,
        'datos' => pg_fetch_all($consulta)
    );
}

function insert_libro($libro)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "insert into libros (isbn_libro,titulo_libro,editorial_libro,anio_publicacion_libro) values ($1, $2, $3, $4) returning id_libro";
    
    $datos_nuevo_libro = array(
        $libro['isbn_libro'],
        $libro['titulo_libro'],
        $libro['editorial_libro'],
        $libro['anio_publicacion_libro'],
    );
    
    $consulta = pg_query_params($bd['conexion'], $query, $datos_nuevo_libro);

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido guardar los datos del libro.'
            ),
            'libro' => $libro
        );
    }
    
    $nuevo_libro = pg_fetch_assoc($consulta);
    $libro['id_libro'] = $nuevo_libro['id_libro'];
    
    return array(
        'error' => false,
        'datos' => $libro
    );
}

function delete_libro($id_libro)
{
    $bd = obtener_conexion_base_datos();
 
    if ($bd['error'] == true) {
        return $bd;
    }
    
    $query = "delete from libros where id_libro = $1";
    
    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_libro
    ));
    
    cerrar_conexion_base_datos($bd['conexion']);
}

function update_libro($id_libro, $libro)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) {
        return $bd;
    }
    
    $query = "update libros set titulo_libro=$2 , editorial_libro =$3, anio_publicacion_libro=$4 where id_libro=$1";
    

    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_libro,
        $libro['titulo_libro'],
        $libro['editorial_libro'],
        $libro['anio_publicacion_libro']
    ));

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido modificar los datos del libro.'
            ),
            'libro' => $libro
        );
    }
}