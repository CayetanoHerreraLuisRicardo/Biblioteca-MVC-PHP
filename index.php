<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #f5f5f5;
  background-image: url(img/bg.jpg);
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #F2F2F2;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px; color: #848484; text-align:center;;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }

    </style>
	<link href="img/ico.jpg" type="image/jpg" rel="shortcut icon" />
  </head>

  <body>

    <div class="container">
      <form name="form1" method="post" action="sesion/control.php" class="form-signin">
        <h2 class="form-signin-heading">Iniciar Sesion</h2>
    <center><img src="img/login2.png" width=140 height=140/><br></center>
        <input type="text" name="usuario" class="input-block-level" placeholder="Usuario: bibliotecario" autocomplete="off">
        <input type="password" name="contra" class="input-block-level" placeholder="Contraseña: 12345" autocomplete="off"><br>
        <h5 class="form-signin-heading">Ingresa con los siguientes datos:</h5>
        <h5 class="form-signin-heading">Usuario: bibliotecario | Contraseña: 12345</h5>
        <button class="btn btn-large btn-primary" type="submit">Acceder</button>
        <p>&nbsp;</p>

      </form>
        </script>
    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

<script src="js/vendor/jquery-1.11.0.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>
  </body>
</html>