<?php
function obtener_autores($aplicacion)
{
    require_once "aplicacion/librerias/bd/querys_autores.php";
    return select_autores();
}

function obtener_autor($aplicacion, $id_autor)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_autor) || strlen($id_autor) > 20) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El autor no existe.';
    }
    
    if ($resultado['error'] == true) 
    {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_autor.php";
    return select_autor($id_autor);
}

function eliminar_autor($aplicacion, $id_autor)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_autor) || strlen($id_autor) > 20) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El autor no existe.';
    }
    
    if ($resultado['error'] == true) 
    {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_autor.php";
    return delete_autor($id_autor);
}

function guardar_datos_autor($aplicacion, $autor)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (empty($autor['nombre_autor'])) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el nombre del autor.';
    }
    
    /* ¡¡¡Observa el schema de la base de datos!!! */
    if (empty($autor['nacionalidad_autor'])) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado la nacionalidad del autor.';
    }
    
    if ($resultado['error'] == true) 
    {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_autor.php";
    return insert_autor($autor);
}

function modificar_datos_autor($aplicacion, $id_autor, $autor)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_autor) || strlen($id_autor) > 20) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El autor no existe.';
    }
    
    if (empty($autor['nombre_autor'])) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el nombre del autor.';
    }
    
    /* ¡¡¡Observa el schema de la base de datos!!! */
    if (empty($autor['nacionalidad_autor'])) 
    {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado la nacionalidad del autor.';
    }

    if ($resultado['error'] == true) 
    {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_autor.php";
    return update_autor($id_autor, $autor);
}