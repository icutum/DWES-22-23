<?php

function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$mail = "";
$pass = "";
$errorList = [];

$redirect = isset($_GET["url"])
    ? $_GET["url"]
    : $_POST["url"];

if (isset($_POST["submit"])) {
    if (isset($_POST["mail"])) {
        $mail = clean_input($_POST["mail"]);
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
        $errorList[] = "Usuario inválido";
    }

    if (isset($_POST["pass"])) {
        $pass = clean_input($_POST["pass"]);
    }

    $dsn = "mysql:host=localhost;dbname=dwes";
    $user = $password = "dwes";
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $dbh = new PDO($dsn, $user, $password, $options);
    $sth = $dbh->prepare("SELECT pass FROM usuarios WHERE mail = :mail");
    $sth->execute([
        ":mail" => $mail,
    ]);

    $hash = $sth->fetchAll()[0]["pass"];

    if (password_verify($pass, $hash)) {
        // Bonus: Semos pogramadores güenos.
        // Haced un reenvío a la página privada que quería visitar.
        session_start();

        $_SESSION["mail"] = $mail;

        header("Location: $redirect");

        exit;

    } else {
        $errorList[] = "Correo o contraseña incorrecto";
    }
}

if (isset($_GET["error"])) {
    $errorList[] = $_GET["error"];
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
</head>
<body>
    <?php require_once("./menu.php"); ?>

    <form action="login.php" method="post" class="login">
        <p>
            <label for="mail">Email:</label>
            <input type="text" name="mail" id="mail" value="<?= $mail ?>">
        </p>

        <p>
            <label for="pass">Password:</label>
            <input type="password" name="pass" id="pass" value="">
        </p>

        <input type="hidden" name="url" value="<?= $redirect ?>">

        <?php if (count($errorList) > 0) { ?>
            <p>
                <?php foreach ($errorList as $error) { ?>
                    <div class="error"><?= $error ?></div>
                <?php } ?>
            </p>
        <?php } ?>

        <p class="login-submit">
            <label for="submit">&nbsp;</label>
            <button type="submit" name="submit" class="login-button">Login</button>
        </p>
    </form>
</body>
</html>