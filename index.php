<?php
/**
 * La cookies se asignan antes de la etiqueta html.
 *
 * $cookie_nombre: Variable que contendrá el valor "nombre" del formulario.
 * $cookie_color: Variable que contendrá el valor "color" del formulario.
 * $_POST[]: Array asociativo con el que se obtienen los valores del formulario.
 *    Utilizado para el método "post" (method="post").
 */
$cookie_nombre = $_POST['nombre'] ?? Null;
$cookie_color = $_POST['color'] ?? Null;

//Definir las cookies.
setcookie('nombre', $cookie_nombre, time() + 365 * 24 * 60 * 60); //86400 = 1 año
setcookie('color', $cookie_color, time() + 365 * 24 * 60 * 60); //86400 = 1 año
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cookies</title>

  <?php if (isset($_COOKIE['color'])): ?>
    <style media="screen">
      body {
        background-color: <?= $_COOKIE['color'] ?>;
        text-align: center;
      }
      p {
        font-size: 22px;
      }
    </style>
  <?php endif ?>
</head>
<body>
  <?php
  /**
   * Si el array asociativo $_COOKIE[] tiene un valor diferente a Null se
   * mostrará el contenido. En caso contrario se mostrará el formulario.
   *
   * isset(): Determina si una variable está defenida y no es Null.
   */
  if (isset($_COOKIE['nombre'])) {
    include_once("includes/contenido.php");

  } else {
    include_once("includes/formulario.php");
  }
  ?>
</body>
</html>
