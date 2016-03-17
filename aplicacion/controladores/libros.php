<?php
function ver_lista($aplicacion)
{
    $datos = array();
    
    $tipo_vista = @$_GET['v'];
    
    if (empty($tipo_vista) || ($tipo_vista != "panel" && $tipo_vista != "tabla" && $tipo_vista != "excel" && $tipo_vista != "pdf")) 
    {
        $datos['mensajes_error'][] = 'El tipo de vista solicitada no es reconocido.';
        $datos['vista']['titulo'] = 'libros - Lista de libros - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    require "aplicacion/modelos/libros.php";
    $resultado = obtener_libros($aplicacion);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'libros - Lista de libros - Error';

        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    $datos['libros'] = $resultado['datos'];
    $datos['vista']['titulo'] = 'libros - Lista de libros';
    
    if ($tipo_vista == "panel") 
    {
        $datos['vista']['cuerpo'] = 'html/libros/panel_libros.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "tabla") 
    {
        $datos['vista']['cuerpo'] = 'html/libros/tabla_libros.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "excel") 
    {
        require "aplicacion/vistas/excel/libros/libros_full.php";
        return true;
    }
    
    if ($tipo_vista == "pdf") 
    {
        require "aplicacion/vistas/pdf/libros/libros_full.php";
        return true;
    }
}

function ver_libro($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/libros.php";
    $id_libro = @$_GET['id_libro'];
    
    $resultado = obtener_libro($aplicacion, $id_libro);
    

    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'libros - Ver libro - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['libros'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'libros - Información de libro';
        $datos['vista']['cuerpo'] = 'html/libros/panel_libro.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function borrar_libro($aplicacion)
{
    $datos = array();
    $id_libro = @$_GET['id_libro'];
    require "aplicacion/modelos/libros.php";
    
    $resultado = eliminar_libro($aplicacion, $id_libro);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Libros - Eliminar libro - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } else {
    $datos['vista']['titulo'] = "Libros - Eliminado";
    $datos['vista']['cuerpo'] = 'html/libros/exito_eliminado_libro.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function nuevo_libro($aplicacion)
{
    $datos = array();
    $datos['vista']['titulo'] = "libros - Nuevo libro";
    $datos['vista']['cuerpo'] = 'html/libros/nuevo_libro.php';
    require "aplicacion/vistas/html/base/base.php";
}

function guardar_libro($aplicacion)
{
    $libro = @$_POST['libro'];
    require "aplicacion/modelos/libros.php";
    
    $resultado = guardar_datos_libro($aplicacion, $libro);
    
    if ($resultado['error'] == true) 
    {
        $datos = $resultado;
        $datos['vista']['titulo'] = "libros - Nuevo libro";
        $datos['vista']['cuerpo'] = 'html/libros/nuevo_libro.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    $datos['libro'] = $resultado['datos'];
    $datos['vista']['titulo'] = "libros - Nuevo libro";
    $datos['vista']['cuerpo'] = 'html/libros/exito_nuevo_libro.php';
    require "aplicacion/vistas/html/base/base.php";
}

function editar_libro($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/libros.php";
    
    $id_libro = @$_GET['id_libro'];
    
    $resultado = obtener_libro($aplicacion, $id_libro);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Libros - Editar libro - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['libros'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'Libros - Editar de libro';
        $datos['vista']['cuerpo'] = 'html/libros/modificar_libro.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function modificar_libro($aplicacion)
{
    $datos = array();
    $libro = @$_POST['libro'];
    $id_libro = @$_GET['id_libro'];
    require "aplicacion/modelos/libros.php";
    
    $resultado = modificar_datos_libro($aplicacion, $id_libro, $libro );
    
    if ($resultado['error'] == true) {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Libro - Editar libro - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['libro'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'Libro - Editar de libro';
        $datos['vista']['cuerpo'] = 'html/libros/exito_modificado_libro.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}