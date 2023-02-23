<?php

require_once("./init.php");
require_once("./redirigir-login.php");
require_once("./comprobar-grupo.php");

if ($nombreGrupo != GRUPO_ADMIN) {
    header("Location: index.php");
}

?>

<html>
<head>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
    <h1>Bienvenido!!</h1>
    <?php include('menu.php')?>
    <p>Información solo para admin</p>
</body>
</html>
