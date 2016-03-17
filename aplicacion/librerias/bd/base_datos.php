<?php

function obtener_conexion_base_datos()
{
    $servidor = '127.0.0.1';
    $puerto = 5432;
    $usuario = 'pw_usuario';
    $password = '12345';
    $base_datos = 'pw_biblioteca';
    
    $conexion = pg_connect("
        host=$servidor
        port=$puerto
        user=$usuario
        password=$password
        dbname=$base_datos");
    
    if ($conexion == false) 
    {
        return array(
            'error' => true,
            'mensajes_error' => array('No se tiene acceso a la base de datos.')
        );
    }
    
    return array(
        'error' => false,
        'conexion' => $conexion
    );
}

function cerrar_conexion_base_datos($conexion)
{
    pg_close($conexion);
}