<?php
    // Cambiar la zona horaria
    date_default_timezone_set("Europe/Madrid");

    // Variables del formulario
    $theme = "";
    $date = date("H:i");

    $actualDate = date("H:i");

    // Ver si el usuario envía la información
    $errores = [];

    if (isset($_POST["submit"])) {
        // Verificar errores
        
        if (!empty($_POST["theme"])) {
            $theme = $_POST["theme"];
        } else {
            $errores["theme"] = ["No puede estar vacío"];
        }

        if (!empty($_POST["date"])) {
            $date = $_POST["date"];
        } else {
            $errores["date"] = ["No puede estar vacío"];
        }

        if (count($errores) == 0) {
            // Guardar
            file_put_contents(
                "temazos.csv",
                "$theme,$date;",
                FILE_APPEND
            );

            // Redirigir
            header("Location: listado.php");

            // Salir
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica guiada</title>
    <style>
        label {
            display: block;
            margin: 10px 0;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <h1>Pero qué buena rola (en .mp3)</h1>
    <h2>Hago este llamado para que tú vuelvas</h2>
    <h3>Tu no ves que estoy sufriendo, es muy dura esta prueba</h3>
    <form action="" method="post">
        <label for="theme">
            Tema de música:
            <input type="text" name="theme" placeholder="Pon tu canción" value="<?= $theme ?>">
        </label>
        <?php
            if (isset($errores["theme"])) : ?>
                <div class="error">
                    <?php foreach ($errores["theme"] as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif;
        ?>
        <label for="date">
            Hora:
            <input type="time" name="date" value="<?= $date ?>">
        </label>
        <?php
            if (isset($errores["date"])) : ?>
                <div class="error">
                    <?php foreach ($errores["date"] as $error) : ?>
                        <p><?= $error ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif;
        ?>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>