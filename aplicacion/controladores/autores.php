<?php
function ver_lista($aplicacion)
{
    $datos = array();
    $tipo_vista = @$_GET['v'];

    if (empty($tipo_vista) || ($tipo_vista != "panel" && $tipo_vista != "tabla" && $tipo_vista != "excel" && $tipo_vista != "pdf")) 
    {
        $datos['mensajes_error'][] = 'El tipo de vista solicitada no es reconocido.';
        $datos['vista']['titulo'] = 'Autores - Lista de autores - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    require "aplicacion/modelos/autores.php";
    $resultado = obtener_autores($aplicacion);

    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Autores - Lista de autores - Error';

        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    $datos['autores'] = $resultado['datos'];
    $datos['vista']['titulo'] = 'Autores - Lista de autores';
    
    if ($tipo_vista == "panel") 
    {
        $datos['vista']['cuerpo'] = 'html/autores/panel_autores.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "tabla") 
    {
        $datos['vista']['cuerpo'] = 'html/autores/tabla_autores.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "excel") 
    {
        require "aplicacion/vistas/excel/autores/autores_full.php";
        return true;
    }
    
    if ($tipo_vista == "pdf") 
    {
        require "aplicacion/vistas/pdf/autores/autores_full.php";
        return true;
    }
}

function ver_autor($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/autores.php";
    
    $id_autor = @$_GET['id_autor'];
    
    $resultado = obtener_autor($aplicacion, $id_autor);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Autores - Ver autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['autores'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'Autores - Información de autor';
        $datos['vista']['cuerpo'] = 'html/autores/panel_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function editar_autor($aplicacion)
{
    $datos = array();
    require "aplicacion/modelos/autores.php";
    $id_autor = @$_GET['id_autor'];

    $resultado = obtener_autor($aplicacion, $id_autor);
    

    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Autores - Editar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['autores'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'Autores - Editar de autor';
        $datos['vista']['cuerpo'] = 'html/autores/modificar_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function borrar_autor($aplicacion)
{
    $datos = array();
    $id_autor = @$_GET['id_autor'];
    require "aplicacion/modelos/autores.php";
    
    $resultado = eliminar_autor($aplicacion, $id_autor);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Autores - Eliminar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } else {
    $datos['vista']['titulo'] = "Autores - Eliminado";
    $datos['vista']['cuerpo'] = 'html/autores/exito_eliminado_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function nuevo_autor($aplicacion)
{
    $datos = array();
    $datos['vista']['titulo'] = "Autores - Nuevo autor";
    $datos['vista']['cuerpo'] = 'html/autores/nuevo_autor.php';
    require "aplicacion/vistas/html/base/base.php";
}

function guardar_autor($aplicacion)
{
    $autor = @$_POST['autor'];
    require "aplicacion/modelos/autores.php";
    
    $resultado = guardar_datos_autor($aplicacion, $autor);
    
    if ($resultado['error'] == true) 
    {
        $datos = $resultado;
        $datos['vista']['titulo'] = "Autores - Nuevo autor";
        $datos['vista']['cuerpo'] = 'html/autores/nuevo_autor.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    $datos['autor'] = $resultado['datos'];
    $datos['vista']['titulo'] = "Autores - Nuevo autor";
    $datos['vista']['cuerpo'] = 'html/autores/exito_nuevo_autor.php';
    require "aplicacion/vistas/html/base/base.php";
}

function modificar_autor($aplicacion)
{
    $datos = array();
    $autor = @$_POST['autor'];
    $id_autor = @$_GET['id_autor'];
    require "aplicacion/modelos/autores.php";
    
    $resultado = modificar_datos_autor($aplicacion, $id_autor, $autor );
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'Autores - Editar autor - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['autores'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'Autores - Editar de autor';
        $datos['vista']['cuerpo'] = 'html/autores/exito_modificado_autor.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}