
<?php
include ("sesion/seguridad.php");
$aplicacion = array(
  "controlador" => "inicio",
  "accion" => "iniciar",
  "controladores" => "aplicacion/controladores",
  "modelos" => "aplicacion/modelos",
  "vistas" => "aplicacion/vistas"
);

if (!empty($_GET['c'])) {
  $aplicacion['controlador'] = $_GET['c'];
} elseif (!empty($_POST['c'])) {
  $aplicacion['controlador'] = $_POST['c'];
}

if (!empty($_GET['a'])) {
  $aplicacion['accion'] = $_GET['a'];
} elseif (!empty($_POST['a'])) {
  $aplicacion['accion'] = $_POST['a'];
}

$archivo_controlador = $aplicacion['controladores'] . "/" . $aplicacion['controlador'] . ".php";
if (!file_exists($archivo_controlador)) {
  header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
  require $aplicacion['vistas'] . "/404.php";
  die();
}

require $archivo_controlador;

if (!function_exists($aplicacion['accion'])) {
  header($_SERVER['SERVER_PROTOCOL'] . " 404 Not Found");
  require $aplicacion['vistas'] . "/404.php";
  die();
}

call_user_func($aplicacion['accion'], $aplicacion);