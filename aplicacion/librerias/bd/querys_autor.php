<?php
require_once "aplicacion/librerias/bd/base_datos.php";

function select_autor($id_autor)
{
    $bd = obtener_conexion_base_datos();
 
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "
        select
            id_autor,
            nombre_autor,
            nacionalidad_autor
        from
            autores
        where
            id_autor = $1";

    $consulta = pg_query_params($bd['conexion'], $query, array($id_autor));
    
    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se ha podido obtener información del autor.'
            )
        );
    }
    
    if (pg_num_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No existe el autor con id ' . $id_autor
            )
        );
    }
    
    return array(
        'error' => false,
        'datos' => pg_fetch_all($consulta)
    );
}

function insert_autor($autor)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "insert into autores (nombre_autor, nacionalidad_autor) values ($1, $2) returning id_autor";
    
    $datos_nuevo_autor = array(
        $autor['nombre_autor'],
        $autor['nacionalidad_autor'],
    );
    
    $consulta = pg_query_params($bd['conexion'], $query, $datos_nuevo_autor);

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido guardar los datos del autor.'
            ),
            'autor' => $autor
        );
    }
    
    $nuevo_autor = pg_fetch_assoc($consulta);
    $autor['id_autor'] = $nuevo_autor['id_autor'];
    
    return array(
        'error' => false,
        'datos' => $autor
    );
}

function update_autor($id_autor, $autor)
{
    $bd = obtener_conexion_base_datos();
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "update autores set nombre_autor=$2 , nacionalidad_autor =$3 where id_autor=$1";
    

    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_autor,
        $autor['nombre_autor'],
        $autor['nacionalidad_autor']
    ));

    cerrar_conexion_base_datos($bd['conexion']);
    
    if ($consulta == false || pg_affected_rows($consulta) != 1) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido modificar los datos del autor.'
            ),
            'autor' => $autor
        );
    }
}

function delete_autor($id_autor)
{
    $bd = obtener_conexion_base_datos();
 
    if ($bd['error'] == true) 
    {
        return $bd;
    }
    
    $query = "delete from libros_autores where autor=$1;
    delete from autores where id_autor = $1;";
    
    $consulta = pg_query_params($bd['conexion'], $query, array(
        $id_autor
    ));
    
    cerrar_conexion_base_datos($bd['conexion']);

   if ($consulta == false || pg_affected_rows($consulta) != 1) 
   {
        return array(
            'error' => true,
            'mensajes_error' => array(
                'No se han podido eliminar al autor.'
            ),
            'autor' => $autor
        );
    }
}