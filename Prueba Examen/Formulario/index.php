<?php
    require("./Utils/Autoload.php");

    use Form\FormHandle as FormHandle;
    use Form\DBHandle as DB;

    $form = FormHandle::singleton();
    @$form->createInputs($_POST);

    $db = DB::connect($dsn, $user, $password, $options);
    $sth = $db->query("SELECT * FROM Ciclistas");

    if (isset($_POST["submit"])) {
        if ($form->isValid())
            echo "<b>Valido</b>";
        else
            echo "<b>Mal</b>";

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
</body>
</html>