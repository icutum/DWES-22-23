<?php
    require_once("../src/init.php");

    if (isset($_POST["registrar"])) {
        $db->ejecuta(
            "INSERT INTO usuarios (nombre, passwd, correo) VALUES (?, ?, ?)",
            $_POST["nombre"],
            password_hash($_POST["passwd"], PASSWORD_DEFAULT),
            $_POST["correo"]
        );

        header("Location: listado.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
</head>
<body>
    <form action="registro.php" method="post">
        Nombre: <input type="text" name="nombre" id="nombre">
        Password: <input type="password" name="passwd" id="passwd">
        Email: <input type="mail" name="correo" id="correo">
        <input type="submit" name="registrar" value="Registrar">
    </form>
</body>
</html>