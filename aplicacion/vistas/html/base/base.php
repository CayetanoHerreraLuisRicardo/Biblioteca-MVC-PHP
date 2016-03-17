<?php
require "aplicacion/vistas/html/base/cabecera.php";
require "aplicacion/vistas/html/base/menu.php";
?>
<div class="container">


<?php
if (! empty($datos['vista']['cuerpo'])) {
    require "aplicacion/vistas/" . $datos['vista']['cuerpo'];
}
?>


</div>
<?php
require "aplicacion/vistas/html/base/pie_pagina.php";
?>