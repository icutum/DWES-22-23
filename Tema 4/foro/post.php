<?php
    require_once("./check-login.php");
    require_once("./Utils/Autoload.php");
    require_once("./dbh.php");

    use Controller\ReplyForm as ReplyForm;

    $form = ReplyForm::singleton();
    $form->createInputs($_POST);

    if (isset($_POST["submit"])) {
        if ($form->isValid()) {
            require_once("./dbh.php");

            $dbh->insertReply($form);

            header("Location: post.php?id=" . $_GET["id"]);

            exit();
        }
    }

    $id = $dbh->selectPost($_GET["id"]);
    $replies = $dbh->selectReplies($_GET["id"]);

    function printPost($table) { ?>
        <article class="post">
            <section class="post__profile-info">
                <img class="post__profile-image" src="./images/profile.png" alt="Foto de perfil">
                <div>
                    <p><?= $table["user"] ?></p>
                    <p><?= date("d/m/Y H:i",$table['timestamp']) ?></p>
                </div>
            </section>
            <section class="post__content">
                <h2 class="post__title"><?= $table["title"] ?></h2>
                <p class="post__subject"><?= $table["subject"] ?></p>
            </section>
        </article>
    <?php }

    function printReplies($replies) {
        foreach ($replies as $reply) : ?>
            <article class="reply">
                <section class="reply__profile-info">
                    <img class="reply__profile-image" src="./images/profile.png" alt="Foto de perfil">
                    <div>
                        <p><?= $reply["user"] ?></p>
                        <p><?= date("d/m/Y H:i",$reply['timestamp']) ?></p>
                    </div>
                </section>
                <section class="reply__content">
                    <p class="reply__subject"><?= $reply["subject"] ?></p>
                </section>
            </article>
        <?php endforeach;
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
    <main class="main">
        <?= printPost($id) ?>
        <?= printReplies($replies) ?>
        <?= $form->printForm("Responder") ?>
    </main>
</body>
</html>