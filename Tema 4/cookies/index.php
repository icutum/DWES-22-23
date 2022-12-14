<?php
    if (isset($_POST["accept"])) {
        setcookie("policy", "true");
        header("Location: ./index.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <h1>Bienvenido</h1>
        <a href="./configurado.php">Acceso</a>
    </main>
    <?php require_once("./cookiepolicy.php") ?>
</body>
</html>