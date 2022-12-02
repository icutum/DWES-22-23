<?php
    require("./Utils/Autoload.php");

    use Controller\Form as Form;

    $form = Form::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
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
    <h1>Venta de Quesos Manchegos</h1>
    <?= $form->printForm() ?>
</body>
</html>