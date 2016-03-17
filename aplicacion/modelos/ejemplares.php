<?php
function obtener_ejemplares($aplicacion)
{
    require_once "aplicacion/librerias/bd/querys_ejemplares.php";
    return select_ejemplares();
}

function obtener_ejemplar($aplicacion, $id_ejemplar)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_ejemplar) || strlen($id_ejemplar) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El ejemplar no existe.';
    }
    
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_ejemplar.php";
    return select_ejemplar($id_ejemplar);
}

function eliminar_ejemplar($aplicacion, $id_ejemplar)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_ejemplar) || strlen($id_ejemplar) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El ejemplar no existe.';
    }
    
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_ejemplar.php";
    return delete_ejemplar($id_ejemplar);
}

function guardar_datos_ejemplar($aplicacion, $ejemplar)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (empty($ejemplar['observaciones_ejemplar'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el nombre del ejemplar.';
    }
    
    if (empty($ejemplar['isbn'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado la nacionalidad del ejemplar.';
    }
    
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_ejemplar.php";
    return insert_ejemplar($ejemplar);
}

function modificar_datos_ejemplar($aplicacion, $id_ejemplar, $ejemplar)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_ejemplar) || strlen($id_ejemplar) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El ejemplar no existe.';
    }
    
    if (empty($ejemplar['observaciones_ejemplar'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el nombre del ejemplar.';
    }

    if (empty($ejemplar['isbn'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado la nacionalidad del ejemplar.';
    }

    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_ejemplar.php";
    return update_ejemplar($id_ejemplar, $ejemplar);
}