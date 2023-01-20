<?php
    require_once("../src/init.php");

    if (isset($_SESSION["id"])) {
        header("Location: listado.php");
        exit();
    }

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
            exit();
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
    <form action="" method="post" class="container mt-5 w-25">
        <h2 class="mb-3">Registrarse en <?= $title ?></h2>
        <div class="form-floating is-invalid mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="">
            <label class="form-label">Usuario:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <input type="password" class="form-control" name="passwd" placeholder="">
            <label class="form-label">Contraseña:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <input type="mail" class="form-control" name="correo" placeholder="">
            <label class="form-label">E-mail:</label>
        </div>
        <input type="submit" class="w-100 btn btn-primary" name="registrar" value="Registrarse">
    </form>
</body>
</html>