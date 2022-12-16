<?php
    session_start();

    const MIN_NUM = 0;
    const MAX_NUM = 10;
    const MIN_ATTEMPTS = 0;
    const MAX_ATTEMPTS = 3;

    $_SESSION["rand"] = isset($_SESSION["rand"]) ? $_SESSION["rand"] : rand(MIN_NUM, MAX_NUM);
    $_SESSION["attempts"] = isset($_SESSION["attempts"]) ? $_SESSION["attempts"] : MAX_ATTEMPTS;
    $_SESSION["result"] = isset($_SESSION["result"]) ? $_SESSION["result"] : "Introduce un número, tienes " . MAX_ATTEMPTS . " intentos";

    $rand = &$_SESSION["rand"];
    $attempts = &$_SESSION["attempts"];
    $result = &$_SESSION["result"];

    if ($attempts == MIN_ATTEMPTS) {
        $result = "Has agotado todos tus intentos, el número era $rand";

    } else if (isset($_POST["submit"])) {
        $guess = $_POST["guess"];

        switch (true) {
            case $rand < $guess:
                $attempts--;
                $result = "El número es menor, te quedan " . $attempts + 1 . " intentos";
                break;

            case $rand > $guess:
                $attempts--;
                $result = "El número es mayor, te quedan " . $attempts + 1 . " intentos";
                break;

            default:
                $result = "¡Felicidades! Lo adivinaste";
                break;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Número aleatorio</title>
</head>
<body>
    <b>Psst, no deberías poder ver esto, pero el número es <?= $rand ?></b>
    <h1>Lotería pocha</h1>
    <p><?= $result ?></p>
    <form action="" method="POST">
        <input type="number" name="guess" min="<?= MIN_NUM ?>" max="<?= MAX_NUM ?>" value="<?= $guess ?>">
        <input type="submit" name="submit" value="Adivinar">
    </form>
</body>
</html>