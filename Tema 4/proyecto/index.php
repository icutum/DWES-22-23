<?php
    spl_autoload_register(function($class) {
        $path = "./";
        $file = str_replace("\\", "/", $class);
        require("$path${file}.php");
    });

    $config = Form\StudentManager::singleton();
    @$config->createInputs($_POST);

    if (isset($_POST["submit"])) {
        $student = new Form\Student($_POST);
        $student->validateStudent();

        // Recuento de errores
        if ($student->isValid()) {
            // Guardar en el archivo
            $config->saveStudent($student);

            // Redirigir
            header("Location: index.php?success=true");

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
    <title>Tronco</title>
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="./img/favicon.png">
</head>
<body>
    <?php include_once("header.php"); ?>
    
    <main class="main">
        <?php if (count(Form\Input::getErrors()) > 0) :
            foreach (Form\Input::getErrors() as $error) : ?>
                <p class="error"><?= $error ?></p>
            <?php endforeach;
        elseif (@$_GET["success"]) : ?>
            <p class="success">Se ha creado el alumno</p>
        <?php endif; ?>

        <form class="form" action="index.php" method="post">
            <h2 class="form__title">Registrar alumno (pobre de él):</h2>
            <div class="form__flex">
                <?php \Form\Input::printForm() ?>
            </div>
            
            <input class="form__submit" type="submit" value="Enviar" name="submit">
            <a class="form__submit" href="list.php">Ver alumnos</a>
        </form>
    </main>
</body>
</html>