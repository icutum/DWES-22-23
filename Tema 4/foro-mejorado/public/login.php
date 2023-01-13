<?php
    require_once("../src/init.php");

    print_r($_SESSION);
    print_r($_POST);

    if (isset($_POST["login"])) {
        $nombre = $_POST["nombre"];
        $pass = $_POST["passwd"];
        $recuerdame = $_POST["recuerdame"];

        $db->ejecuta("SELECT id, nombre, passwd FROM usuarios WHERE nombre = ?", $nombre);
        $user = $db->obtenElDato();

        if (password_verify($pass, $user["passwd"])) {
            $_SESSION["id"] = $user["id"];
            $_SESSION["nombre"] = $user["nombre"];

            if (isset($recuerdame) && $recuerdame == "on") {
                $token = bin2hex(openssl_random_pseudo_bytes($_ENV["TOKEN_LENGTH"]));

                $db->ejecuta("INSERT INTO tokens (id_usuario, valor) VALUES (?, ?)", $_SESSION["id"], $token);

                setcookie("recuerdame", $token, [
                    "expires" => time() + 7 * 24 * 60 * 60,
                    // "secure" => true,
                    "httponly" => true
                ]);
            }
        } else {
            echo "<p>Error shurmano</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | <?= $title ?></title>
</head>
<body>
    <form action="" method="post">
        User: <input type="text" name="nombre">
        Password: <input type="password" name="passwd">
        Recuérdame  <input type="checkbox" name="recuerdame">
        <input type="submit" name="login" value="Login">
    </form>
</body>
</html>