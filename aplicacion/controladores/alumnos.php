<?php
function ver_lista($aplicacion)
{
    $datos = array();
    $tipo_vista = @$_GET['v'];

    if (empty($tipo_vista) || ($tipo_vista != "panel" && $tipo_vista != "tabla" && $tipo_vista != "excel" && $tipo_vista != "pdf")) 
    {
        $datos['mensajes_error'][] = 'El tipo de vista solicitada no es reconocido.';
        $datos['vista']['titulo'] = 'alumnos - Lista de alumnos - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    require "aplicacion/modelos/alumnos.php";
    $resultado = obtener_alumnos($aplicacion);

    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'alumnos - Lista de alumnos - Error';

        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    $datos['alumnos'] = $resultado['datos'];
    $datos['vista']['titulo'] = 'alumnos - Lista de alumnos';
    
    if ($tipo_vista == "panel") 
    {
        $datos['vista']['cuerpo'] = 'html/alumnos/panel_alumnos.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "tabla") 
    {
        $datos['vista']['cuerpo'] = 'html/alumnos/tabla_alumnos.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "excel") 
    {
        require "aplicacion/vistas/excel/alumnos/alumnos_full.php";
        return true;
    }
    
    if ($tipo_vista == "pdf") 
    {
        require "aplicacion/vistas/pdf/alumnos/alumnos_full.php";
        return true;
    }
}

function ver_autor($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/alumnos.php";
    
    $id_usuario = @$_GET['id_usuario'];
    
    $resultado = obtener_autor($aplicacion, $id_usuario);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'alumnos - Ver autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['alumnos'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'alumnos - Información de autor';
        $datos['vista']['cuerpo'] = 'html/alumnos/panel_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function editar_autor($aplicacion)
{
    $datos = array();
    require "aplicacion/modelos/alumnos.php";
    $id_usuario = @$_GET['id_usuario'];

    $resultado = obtener_autor($aplicacion, $id_usuario);
    

    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'alumnos - Editar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['alumnos'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'alumnos - Editar de autor';
        $datos['vista']['cuerpo'] = 'html/alumnos/modificar_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function borrar_autor($aplicacion)
{
    $datos = array();
    $id_usuario = @$_GET['id_usuario'];
    require "aplicacion/modelos/alumnos.php";
    
    $resultado = eliminar_autor($aplicacion, $id_usuario);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'alumnos - Eliminar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } else {
    $datos['vista']['titulo'] = "alumnos - Eliminado";
    $datos['vista']['cuerpo'] = 'html/alumnos/exito_eliminado_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function nuevo_autor($aplicacion)
{
    $datos = array();
    $datos['vista']['titulo'] = "alumnos - Nuevo autor";
    $datos['vista']['cuerpo'] = 'html/alumnos/nuevo_autor.php';
    require "aplicacion/vistas/html/base/base.php";
}

function guardar_autor($aplicacion)
{
    $autor = @$_POST['autor'];
    require "aplicacion/modelos/alumnos.php";
    
    $resultado = guardar_datos_autor($aplicacion, $autor);
    
    if ($resultado['error'] == true) 
    {
        $datos = $resultado;
        $datos['vista']['titulo'] = "alumnos - Nuevo autor";
        $datos['vista']['cuerpo'] = 'html/alumnos/nuevo_autor.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    $datos['autor'] = $resultado['datos'];
    $datos['vista']['titulo'] = "alumnos - Nuevo autor";
    $datos['vista']['cuerpo'] = 'html/alumnos/exito_nuevo_autor.php';
    require "aplicacion/vistas/html/base/base.php";
}

function modificar_autor($aplicacion)
{
    $datos = array();
    $autor = @$_POST['autor'];
    $id_usuario = @$_GET['id_usuario'];
    require "aplicacion/modelos/alumnos.php";
    
    $resultado = modificar_datos_autor($aplicacion, $id_usuario, $autor );
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'alumnos - Editar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['alumnos'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'alumnos - Editar de autor';
        $datos['vista']['cuerpo'] = 'html/alumnos/exito_modificado_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}