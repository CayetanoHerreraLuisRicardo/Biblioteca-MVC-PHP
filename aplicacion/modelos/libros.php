<?php

/* Modelo */
function obtener_libros($aplicacion)
{
    /* Requerimos de acceso a la base de datos */
    require_once "aplicacion/librerias/bd/querys_libros.php";
    /* Y ejecutar algún query en ella */
    return select_libros();
}

function obtener_libro($aplicacion, $id_libro)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    /*
     * VALIDACIONES QUE NO REQUIEREN DE ACCESO A LA BASE DE DATOS Si el id del libro que el controlador nos está solicitando no es númerico o excede una longitud de 20 caracteres no debemos perder nuestro tiempo ejecutando una consulta en la base de datos.
     */
    if (! is_numeric($id_libro) || strlen($id_libro) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El libro no existe.';
    }
    
    /*
     * En otras "acciones" del modelo (distintas a las "acciones" del controlador) las validaciones que no requieren acceso a la base de datos serán más.
     */
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    /* Finalmente, realizamos la "consulta" a la base de datos */
    require_once "aplicacion/librerias/bd/querys_libro.php";
    return select_libro($id_libro);
}

function eliminar_libro($aplicacion, $id_libro)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    /*
     * VALIDACIONES QUE NO REQUIEREN DE ACCESO A LA BASE DE DATOS Si el id del libro que el controlador nos está solicitando no es númerico o excede una longitud de 20 caracteres no debemos perder nuestro tiempo ejecutando una consulta en la base de datos.
     */
    if (! is_numeric($id_libro) || strlen($id_libro) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El libro no existe.';
    }
    
    /*
     * En otras "acciones" del modelo (distintas a las "acciones" del controlador) las validaciones que no requieren acceso a la base de datos serán más.
     */
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    /* Finalmente, realizamos la "consulta" a la base de datos */
    require_once "aplicacion/librerias/bd/querys_libro.php";
    return delete_libro($id_libro);
}

function guardar_datos_libro($aplicacion, $libro)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    /* ¡¡¡Observa el schema de la base de datos!!! */
    if (empty($libro['isbn_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el isbn del libro.';
    }

    if (empty($libro['titulo_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el titulo del libro.';
    }

    if (empty($libro['editorial_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el editorial del libro.';
    }

    if (empty($libro['anio_publicacion_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el anio de publicacion del libro.';
    }
    
    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_libro.php";
    return insert_libro($libro);
}

function modificar_datos_libro($aplicacion, $id_libro, $libro)
{
    $resultado = array(
        'error' => false,
        'mensajes_error' => array()
    );
    
    if (! is_numeric($id_libro) || strlen($id_libro) > 20) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'El libro no existe.';
    }
    
    if (empty($libro['titulo_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el titulo del libro.';
    }
    
    /* ¡¡¡Observa el schema de la base de datos!!! */
    if (empty($libro['editorial_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado la editorial del libro.';
    }

    if (empty($libro['anio_publicacion_libro'])) {
        $resultado['error'] = true;
        $resultado['mensajes_error'][] = 'No se ha indicado el anio de publicacion del libro.';
    }

    if ($resultado['error'] == true) {
        return $resultado;
    }
    
    require_once "aplicacion/librerias/bd/querys_libro.php";
    return update_libro($id_libro, $libro);
}