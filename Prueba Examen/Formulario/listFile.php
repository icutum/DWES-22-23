<?php
    require("./Utils/Autoload.php");

    use Controller\Form as Form;
    use Controller\FileHandle as File;

    $form = Form::singleton();
    $form->createInputs($_POST);
    $keys = $form->getKeys();

    $fh = File::singleton();
    $csv = $fh->getCSV();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php if (!empty($csv)) : ?>
        <table>
            <caption>Lista Archivo</caption>
            <tr>
                <?php foreach ($keys as $key) : ?>
                    <th><?= $key ?></th>
                <?php endforeach; ?>
            </tr>
            <?php foreach (explode("\n", $csv) as $line) : ?>
                <tr>
                    <?php if (!empty($line)) : foreach (explode(",", $line) as $value) : ?>
                        <td><?= $value ?></td>
                    <?php endforeach; endif; ?>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>El archivo está vacío</p>
    <?php endif; ?>
    <a href="./index.php">Volver</a>
</body>
</html>