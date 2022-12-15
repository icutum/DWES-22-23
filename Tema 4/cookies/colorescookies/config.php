<?php
    require_once("./user-data.php");

    if (isset($_POST["submit"])) {
        array_pop($_POST);

        foreach ($_POST as $key => $value) {
            setcookie($key, $value);
        }

        header("Location: ./config.php?success=true");

        exit();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuración</title>
    <link rel="stylesheet" href="./css/style.css">
    <?php require_once("./user-colors.php") ?>
</head>
<body>
    <div class="config-wrapper">
        <form action="" method="post" class="config">
            <h2>Configuración</h2>
            <label>
                Color de fondo:
                <input type="color" value="<?= $bgcolor ?>" name="background-color">
            </label>
            <label>
                Color de texto:
                <input type="color" value="<?= $fgcolor ?>" name="color">
            </label>
            <label>
                Usuario:
                <input type="text" value="<?= $username ?>" name="username">
            </label>
            <input type="submit" value="Guardar" name="submit">
        </form>
        <?php if (isset($_GET["success"])) : ?>
            <p class="success">EXITO: Se ha guardado la configuración</p>
        <?php endif; ?>
    </div>
    <?php require_once("./menu.php") ?>
</body>
</html>