<?php
    session_start();

    const CAPTCHA_LENGTH = 4;
    $captcha = &$_SESSION["captcha"];
    $captcha = isset($captcha) ? $captcha : generateCaptcha(CAPTCHA_LENGTH);

    function generateCaptcha($length) {
        $str = "";

        for ($i = 0; $i < CAPTCHA_LENGTH; $i++) {
            $rand = rand(0, 1);

            $rand > 0
                ? $str .= rand(0, 9)
                : $str .= chr(rand(65, 90));
        }

        return $str;
    }

    if (isset($_POST["submit"])) {
        $guess = $_POST["captchaGuess"];

        $captcha == $guess
            ? header("Location: index.php?success")
            : header("Location: index.php?failure");
    }

    function showMessage() {
        switch (true) {
            case isset($_GET["success"]) : ?>
                <p>Has acertado el captcha</p>
                <?php break;

            case isset($_GET["failure"]): ?>
                <p>Has fallado el captcha</p>
                <?php break;
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Captcha</title>
</head>
<body>
    <h2>Captcha</h2>
    <p><?= $captcha ?></p>
    <p><?= showMessage() ?></p>
    <form action="" method="post">
        <input type="text" name="captchaGuess" value="">
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>
</html>