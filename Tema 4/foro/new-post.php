<?php
    require_once("./Utils/Autoload.php");
    require_once("./check-login.php");

    use Controller\PostForm as PostForm;

    session_start();

    $form = PostForm::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
            require_once("./dbh.php");

            $dbh->insertPost($form);

            $postID = $dbh->selectLastUserPost($_SESSION["userID"]);
            header("Location: post.php?id=$postID");

            exit();
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
    <?php require_once("./header.php") ?>
    <?= $form->printForm("Crear publicación") ?>
</body>
</html>