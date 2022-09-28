<?php
    $radio = 0;
    $error = false;

    if (isset($_GET['radio'])) {
        $radio = $_GET['radio'];

        if ($radio == "") {
            $radio = 0;
            $error = true;
        }
    } else {
        $radio = 0;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Circunferencia</h1>
    <?php if ($error) { ?>
        <h2>Te falta calle</h2>
    <?php } ?>
    <form action="formulario.php" method="get">
        <label for="radio">Introduce el radio:</label>
        <input type="number" name="radio" min="1" value="<?= $radio ?>">
        <input type="submit" value="Enviar">
    </form>
    <p>Área: <?= round(M_PI * pow($radio, 2), 2) ?></p>
    <p>Perímetro: <?= round(2 * M_PI * $radio, 2) ?></p>
</body>
</html>