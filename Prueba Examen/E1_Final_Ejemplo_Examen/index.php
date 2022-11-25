<?php
  spl_autoload_register(function($class) {
      $path = "./";
      $file = str_replace("\\", "/", $class);
      require("$path${file}.php");
  });
/*
Debes definir una estructura adecuada para este problema
*/
$board = new Classes\Board();
$board->loadTable();

if (isset($_POST["submit"])) {
  $board->placeTurn($_POST["turno"], $_POST["x"], $_POST["y"]);
}

?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
</head>
<body>
  <h1>3 en raya</h1>
  <?= $board->printTable() ?>
  <?= $board->printForm() ?>
  <p>Errores: <?= print_r($board->getErrors()) ?></p>
  <p>Tabla: <?= print_r($board->getBoard()) ?></p>
</body>
</html>
