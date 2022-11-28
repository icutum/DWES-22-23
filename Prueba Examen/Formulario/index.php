<?php
    require("./Utils/Autoload.php");

    use Controller\Form as Form;
    use Controller\FileHandle as File;
    use Controller\DBHandle as DB;

    $form = Form::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
            // Guardar a .csv
            $fh = File::singleton();
            $fh->saveToCSV($form);

            // Guardar en BBDD
            $dsn = "mysql:host=localhost;dbname=dwes";
            $user = $password = "dwes";
            $options = [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            $dbh = new DB($dsn, $user, $password, $options);
            $dbh->insertValues($form);

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
    <title>Formulario</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <h1>Ultra formulario</h1>
    <?= $form->printForm() ?>
    <a href="./listFile.php">Ver archivo</a>
    <a href="./listDB.php">Ver BBDD</a>
</body>
</html>