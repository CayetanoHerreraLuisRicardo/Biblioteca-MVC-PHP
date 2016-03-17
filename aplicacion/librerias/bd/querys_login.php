<?php
require_once "aplicacion/librerias/bd/base_datos.php";

function consulta($usuario,$contra)
{
    $bd = obtener_conexion_base_datos();
    
    $query = "select *from tusuarios where nombre_usuario = $1 and contrasenia_usuario = $2" ;
    
    $consulta = pg_query_params($bd['conexion'], $query, array($usuario, $contra));
    
    cerrar_conexion_base_datos($bd['conexion']);
}