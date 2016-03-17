<!DOCTYPE html>
<html>
  <head>
    <title>Error 404</title>
    <meta charset="UTF-8" />
  </head>
  <body>
    <h1>Error 404</h1>
    <p>El recurso solicitado no ha sido encontrado.</p>
    <p>Solicitud:<br />
      <ul>
        <li><strong>Método HTTP de solicitud:</strong> <?php echo $_SERVER['REQUEST_METHOD']; ?></li>
        <li><strong>Recurso solicitado:</strong> <?php echo $_SERVER['REQUEST_URI']; ?></li>
        <li><strong>Controlador:</strong> <?php echo $aplicacion['controlador']; ?></li>
        <li><strong>Acción:</strong> <?php echo $aplicacion['accion']; ?></li>
      </ul>
    <p>Este error puede deberse a que no has creado al <strong>Controlador</strong>
    o bien que no has definido la función que corresponde a la <strong>Acción</strong>,
    dentro del <strong>Controlador</strong>.
    </p>
  </body>
</html>