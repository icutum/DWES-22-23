<?php
    require_once("../src/init.php");

    if (isset($_SESSION["id"])) {
        header("Location: listado.php");
        exit();
    }

    // Enviar correo
    if (isset($_POST["submit-correo"])) {
        $token = bin2hex(openssl_random_pseudo_bytes($_ENV["TOKEN_LENGTH"]));
        $db->ejecuta(
            "SELECT * FROM usuarios WHERE correo = ?",
            $_POST["correo"]
        );
        $usuario = $db->obtenElDato();

        if (isset($usuario)) {
            $db->ejecuta(
                "INSERT INTO tokens (id_usuario, valor, expiracion) VALUES (?, ?, (NOW() + INTERVAL 5 MINUTE))",
                $usuario["id"], $token
            );

            $url = "http://localhost:8080/recuperar.php?token=$token";
            Mailer::sendEmail(
                $_POST["correo"],
                "$title | Recuperación de contraseña",
                "<a target='_blank' href='" . "$url" . "'>Pulse aquí para cambiar la contraseña</a>"
            );
        }

        header("Location: recuperar.php?info=Se ha enviado el correo de recuperación de contraseña");
    }

    // Cambiar contraseña
    if (isset($_GET["token"])) {
        $db->ejecuta(
            "SELECT * FROM tokens WHERE valor = ? AND expiracion > NOW()",
            $_GET["token"]
        );
        $tokenValido = $db->obtenElDato();
        $tokenValido = !empty($tokenValido);

        if (!$tokenValido) {
            $db->ejecuta(
                "DELETE FROM tokens WHERE valor = ?",
                $_GET["token"]
            );

            header("Location: recuperar.php?info=El token ha expirado");
        }
    }

    if (isset($_POST["submit-contra"])) {
        $contraValida = $_POST["passwd"] == $_POST["reescribe-passwd"];

        if ($contraValida) {
            $db->ejecuta(
                "UPDATE usuarios SET passwd = ? WHERE id =
                (SELECT id_usuario FROM tokens WHERE valor = ?)",

                password_hash($_POST["passwd"], PASSWORD_DEFAULT), $_GET["token"]
            );

            $db->ejecuta(
                "DELETE FROM tokens WHERE valor = ?",
                $_GET["token"]
            );

            header("Location: login.php");
        } else {
            header("Location: recuperar.php?token=" . $_GET["token"] . "&error=Las contraseñas no coinciden");
        }
    }

    function formularioCorreo() { ?>
        <form action="" method="post" class="container mt-5 w-25">
            <?php if (isset($_GET["info"])) : ?>
                <p class="alert alert-info"><?= $_GET["info"] ?></p>
            <?php endif; ?>

            <h2 class="mb-3">Recuperar contraseña</h2>
            <div class="form-floating is-invalid mb-3">
                <input type="mail" class="form-control" name="correo" placeholder="">
                <label class="form-label">Correo electrónico:</label>
            </div>
            <input type="submit" class="w-100 btn btn-primary" name="submit-correo" value="Enviar correo">
        </form>
    <?php }

    function formularioContra() { ?>
        <form action="" method="post" class="container mt-5 w-25">
            <?php if (isset($_GET["error"])) : ?>
                <p class="alert alert-danger"><?= $_GET["error"] ?></p>
            <?php endif; ?>

            <h2 class="mb-3">Recuperar contraseña</h2>
            <div class="form-floating is-invalid mb-3">
                <input type="password" class="form-control" name="passwd" placeholder="">
                <label class="form-label">Nueva contraseña:</label>
            </div>
            <div class="form-floating is-invalid mb-3">
                <input type="password" class="form-control" name="reescribe-passwd" placeholder="">
                <label class="form-label">Vuelva a escribir la nueva contraseña:</label>
            </div>
            <input type="submit" class="w-100 btn btn-primary" name="submit-contra" value="Cambiar contraseña">
        </form>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Recuperar contraseña | <?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <?php if (isset($_GET["token"])) {
        formularioContra();
    } else {
        formularioCorreo();
    } ?>
</body>
</html>