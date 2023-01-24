<?php
    require_once("../src/init.php");

    if (isset($_SESSION["id"])) {
        header("Location: listado.php");
        exit();
    }

    const CHECKBOX_ON = "on";

    if (isset($_POST["login"])) {
        $nombre = $_POST["nombre"];
        $pass = $_POST["passwd"];
        $recuerdame = $_POST["recuerdame"];

        $db->ejecuta("SELECT id, nombre, passwd FROM usuarios WHERE nombre = ?", $nombre);
        $user = $db->obtenElDato();

        if (password_verify($pass, $user["passwd"])) {
            $_SESSION["id"] = $user["id"];
            $_SESSION["nombre"] = $user["nombre"];

            if (isset($recuerdame) && $recuerdame == CHECKBOX_ON) {
                $token = bin2hex(openssl_random_pseudo_bytes($_ENV["TOKEN_LENGTH"]));

                $db->ejecuta("INSERT INTO tokens (id_usuario, valor) VALUES (?, ?)", $_SESSION["id"], $token);

                setcookie("recuerdame", $token, [
                    "expires" => time() + ($_ENV["TOKEN_EXPIRACY"] * 24 * 60 * 60),
                    "httponly" => true
                ]);
            }

            if (isset($_GET["redireccion"])) {
                header("Location: " . $_GET["redireccion"]);
                exit();

            } else {
                header("Location: listado.php");
                exit();
            }
        } else {
            echo "<p>Error shurmano</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Iniciar sesión | <?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <form action="" method="post" class="container mt-5 w-25">
        <h2 class="mb-3">Iniciar sesión en <?= $title ?></h2>
        <div class="form-floating is-invalid mb-3">
            <input type="text" class="form-control" name="nombre" placeholder="">
            <label class="form-label">Usuario:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <input type="password" class="form-control" name="passwd" placeholder="">
            <label class="form-label">Contraseña:</label>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-label" name="recuerdame">
            <label class="form-check-label">Recuérdame</label>
        </div>
        <p><a href="recuperar.php">He olvidado mi contraseña</a></p>
        <input type="submit" class="w-100 btn btn-primary" name="login" value="Iniciar sesión">
    </form>
</body>
</html>