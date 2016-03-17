<?php
function ver_lista($aplicacion)
{
    $datos = array();

    $tipo_vista = @$_GET['v'];
    
    if (empty($tipo_vista) || ($tipo_vista != "panel" && $tipo_vista != "tabla" && $tipo_vista != "excel" && $tipo_vista != "pdf")) 
    {
        $datos['mensajes_error'][] = 'El tipo de vista solicitada no es reconocido.';
        $datos['vista']['titulo'] = 'ejemplares - Lista de ejemplares - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    require "aplicacion/modelos/ejemplares.php";
    $resultado = obtener_ejemplares($aplicacion);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'ejemplares - Lista de ejemplares - Error';

        $datos['vista']['cuerpo'] = 'html/base/errores.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    
    $datos['ejemplares'] = $resultado['datos'];
    $datos['vista']['titulo'] = 'ejemplares - Lista de ejemplares';
    
    if ($tipo_vista == "panel") 
    {
        $datos['vista']['cuerpo'] = 'html/ejemplares/panel_ejemplares.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "tabla") 
    {
        $datos['vista']['cuerpo'] = 'html/ejemplares/tabla_ejemplares.php';
        require "aplicacion/vistas/html/base/base.php";
        return true;
    }
    
    if ($tipo_vista == "excel") 
    {
        require "aplicacion/vistas/excel/ejemplares/ejemplares_full.php";
        return true;
    }
    
    if ($tipo_vista == "pdf") 
    {
        require "aplicacion/vistas/pdf/ejemplares/ejemplares_full.php";
        return true;
    }
}

function ver_ejemplar($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/ejemplares.php";

    $id_ejemplar = @$_GET['id_ejemplar'];
    
    $resultado = obtener_ejemplar($aplicacion, $id_ejemplar);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'ejemplares - Ver ejemplar - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['ejemplares'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'ejemplares - Información de ejemplar';
        $datos['vista']['cuerpo'] = 'html/ejemplares/panel_ejemplar.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function borrar_ejemplar($aplicacion)
{
    $datos = array();
    $id_ejemplar = @$_GET['id_ejemplar'];
    require "aplicacion/modelos/ejemplares.php";
    
    $resultado = eliminar_ejemplar($aplicacion, $id_ejemplar);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'ejemplares - Eliminar ejemplar - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['vista']['titulo'] = "Ejemplares - Eliminado";
        $datos['vista']['cuerpo'] = 'html/ejemplares/exito_eliminado_ejemplar.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}

function nuevo_ejemplar($aplicacion)
{
    $datos = array();
    $datos['vista']['titulo'] = "ejemplares - Nuevo ejemplar";
    $datos['vista']['cuerpo'] = 'html/ejemplares/nuevo_ejemplar.php';
    require "aplicacion/vistas/html/base/base.php";
}

function guardar_ejemplar($aplicacion)
{
    $ejemplar = @$_POST['ejemplar'];
    require "aplicacion/modelos/ejemplares.php";
    
    $resultado = guardar_datos_ejemplar($aplicacion, $ejemplar);
    
    if ($resultado['error'] == true) 
    {
        $datos = $resultado;
        $datos['vista']['titulo'] = "ejemplares - Nuevo ejemplar";
        $datos['vista']['cuerpo'] = 'html/ejemplares/nuevo_ejemplar.php';
        require "aplicacion/vistas/html/base/base.php";
        return false;
    }
    $datos['ejemplar'] = $resultado['datos'];
    $datos['vista']['titulo'] = "ejemplares - Nuevo ejemplar";
    $datos['vista']['cuerpo'] = 'html/ejemplares/exito_nuevo_ejemplar.php';
    require "aplicacion/vistas/html/base/base.php";
}

function editar_ejemplar($aplicacion)
{
    $datos = array();
    
    require "aplicacion/modelos/ejemplares.php";
    
    $id_ejemplar = @$_GET['id_ejemplar'];
    
    $resultado = obtener_ejemplar($aplicacion, $id_ejemplar);
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'ejemplares - Editar ejemplar - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['ejemplares'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'ejemplares - Editar de ejemplar';
        $datos['vista']['cuerpo'] = 'html/ejemplares/modificar_ejemplar.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}
function modificar_ejemplar($aplicacion)
{
    $datos = array();
    $ejemplar = @$_POST['ejemplar'];
    $id_ejemplar = @$_GET['id_ejemplar'];
    require "aplicacion/modelos/ejemplares.php";
    
    $resultado = modificar_datos_ejemplar($aplicacion, $id_ejemplar, $ejemplar );
    
    if ($resultado['error'] == true) 
    {
        $datos['mensajes_error'] = $resultado['mensajes_error'];
        $datos['vista']['titulo'] = 'ejemplares - Editar ejemplar - Error';
        $datos['vista']['cuerpo'] = 'html/base/errores.php';
    } 
    else 
    {
        $datos['ejemplares'] = $resultado['datos'];
        $datos['vista']['titulo'] = 'ejemplares - Editar de ejemplar';
        $datos['vista']['cuerpo'] = 'html/ejemplares/exito_modificado_ejemplar.php';
    }
    require "aplicacion/vistas/html/base/base.php";
}