<?php
    require("./Utils/Autoload.php");

    use Controller\SigninForm as SigninForm;

    session_start();

    $form = SigninForm::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
            require_once("./dbh.php");

            if ($dbh->isUserAvailable($form)) {
                $dbh->insertUser($form);

                $_SESSION["user"] = $form->getUser()->getValue();

                $url = $form->getRedirect()->getValue();

                header("Location: $url");

                exit();
            } else {
                $form->getRedirect()->setError("El usuario y/o correo ya existen");
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
</head>
<body>
    <?php $form->printForm("Registrarse") ?>
</body>
</html>