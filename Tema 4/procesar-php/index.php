<?php
    foreach ($_SERVER as $key => $value) {
        echo "[$key] => $value <br>";
    }

    function imprimirInfo() {
        $language = explode(",", $_SERVER["HTTP_ACCEPT_LANGUAGE"])[0];
        $texts = [];

        switch ($language) {
            case "en-US":
                $texts[0] = "Your information";
                $texts[1] = "IP Address: ";
                $texts[2] = "Operative System: ";
                break;
            case "es-ES":
                $texts[0] = "Tu información";
                $texts[1] = "Dirección IP: ";
                $texts[2] = "Sistema Operativo: ";
                break;
            default:
                $texts[0] = "Dale";
                $texts[1] = "Dale Don dale: ";
                $texts[2] = "Pa' que se muevan las yales: ";
                break;
        }
        $ip = $_SERVER["REMOTE_ADDR"];
        $os = explode(";", $_SERVER["HTTP_USER_AGENT"])[1]; ?>

        <h2><?= $texts[0] ?></h2>
        <p><?= $texts[1] ?><?= $ip ?></p>
        <p><?= $texts[2] ?><?= $os ?></p>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info</title>
</head>
<body>
    <?= imprimirInfo() ?>
</body>
</html>