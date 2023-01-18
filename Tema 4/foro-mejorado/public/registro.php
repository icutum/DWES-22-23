<?php
    require_once("../src/init.php");

    if (isset($_POST["registrar"])) {
        $db->ejecuta(
            "INSERT INTO usuarios (nombre, passwd, correo) VALUES (?, ?, ?)",
            $_POST["nombre"],
            password_hash($_POST["passwd"], PASSWORD_DEFAULT),
            $_POST["correo"]
        );

        $insertado = $db->getExecuted();

        if ($insertado) {
            Mailer::sendEmail(
                $_POST["correo"],
                "¡Gracias por registrarte, " . $_POST["nombre"] . "!",
                "Bienvenido a linkenin y todas esas movidas"
            );

            header("Location: listado.php");
        }

    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Regístrate | <?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <form action="registro.php" method="post">
        Nombre: <input type="text" name="nombre" id="nombre">
        Password: <input type="password" name="passwd" id="passwd">
        Email: <input type="mail" name="correo" id="correo">
        <input type="submit" name="registrar" value="Registrar">
    </form>
</body>
</html>