<?php
    require_once("../src/init.php");

    if (isset($_SESSION["id"])) {
        header("Location: listado.php");
        exit();
    }

    if (isset($_POST["submit-correo"])) {
        $token = bin2hex(openssl_random_pseudo_bytes($_ENV["TOKEN_LENGTH"]));
        $db->ejecuta(
            "SELECT id FROM usuarios WHERE correo = ?",
            $_POST["correo"]
        );

        $usuario = $db->obtenElDato();

        if (isset($usuario)) {
            $db->ejecuta(
                "INSERT INTO tokens (id_usuario, valor) VALUES (?, ?)",
                $usuario["id"], $token
            );

            $url = "http://localhost:8080/recuperar.php?token=$token";
            Mailer::sendEmail(
                $_POST["correo"],
                "$title | Recuperación de contraseña",
                "<a href='" . "$url" . "'>Pulse aquí para cambiar la contraseña</a>"
            );
        }

        header("Location: recuperar.php?sent-mail");
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
            header("Location: recuperar.php?token=" . $_GET["token"] . "&error");
        }
    }

    function formularioCorreo() { ?>
        <form action="" method="post" class="container mt-5 w-25">
            <?php if (isset($_GET["sent-mail"])) : ?>
                <p class="alert alert-info">Se ha enviado el correo de recuperación de contraseña</p>
            <?php endif; ?>
            <h2 class="mb-3">Recuperar contraseña</h2>
            <div class="form-floating is-invalid mb-3">
                <input type="mail" class="form-control" name="correo" placeholder="">
                <label class="form-label">Correo electrónico:</label>
            </div>
            <input type="submit" class="w-100 btn btn-primary" name="submit-correo" value="Enviar correo">
        </form>
    <?php }

    $db->ejecuta("SELECT * FROM tokens WHERE valor = ?", $_GET["token"]);
    $t = $db->obtenElDato();

    function formularioContra($t) {

        if (isset($t)) : ?>
            <form action="" method="post" class="container mt-5 w-25">
                <?php if (isset($_GET["error"])) : ?>
                    <p class="alert alert-danger">Las contraseñas no coinciden</p>
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
        <?php else :
            header("Location: recuperar.php");
        endif;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Recuperar contraseña | <?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <?php if (!isset($_GET["token"])) {
        formularioCorreo();
    } else {
        formularioContra($t);
    } ?>
</body>
</html>