<?php
    require_once("./Utils/Autoload.php");

    use Controller\LoginForm as LoginForm;

    session_start();

    $form = LoginForm::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
            require_once("./dbh.php");

            if ($dbh->isUserValid($form)) {
                $username = $form->getUser()->getValue();
                $_SESSION["userID"] = $dbh->getUserID($username);

                $url = $form->getRedirect()->getValue();
                header("Location: $url");

                exit();
            } else {
                $form->getRedirect()->setError("Usuario o contraseña incorrectos");
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php $form->printForm("Iniciar sesión") ?>
    <a href="./signin.php">Registrarse</a>
</body>
</html>