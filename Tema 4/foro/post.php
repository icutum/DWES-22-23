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

            header("Location: post.php?id=$id&page=$page");

            exit();
        }
    }

    $id = $_GET["id"];
    $page = isset($_GET["page"])
        ? $_GET["page"]
        : 1;

    $posts = $dbh->selectPost($id);
    $replies = $dbh->selectReplies($id, $page);
    $pagesPerPost = $dbh->getReplyPages($id);

    function printPost($post) { ?>
        <article class="post">
            <section class="post__profile-info">
                <img class="post__profile-image" src="./images/profile.png" alt="Foto de perfil">
                <div>
                    <p><?= $post["user"] ?></p>
                    <p><?= date("d/m/Y H:i", $post['timestamp']) ?></p>
                </div>
            </section>
            <section class="post__content">
                <h2 class="post__title"><?= $post["title"] ?></h2>
                <p class="post__subject"><?= $post["subject"] ?></p>
            </section>
        </article>
    <?php }

    function printReplies($replies, $repliesPerPage) {
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
        <?php endforeach; ?>

        <div class="post__pages">
            <?php for ($i = 1; $i <= $repliesPerPage; $i++) : ?>
                <a class="post__page" href="post.php?id=<?= $_GET["id"] ?>&page=<?= $i ?>"><?= $i ?></a>
            <?php endfor; ?>
        </div>
    <?php }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/post.css">
</head>
<body>
    <?php require_once("./header.php") ?>
    <main class="main">
        <?= printPost($posts) ?>
        <?= $form->printForm("Responder") ?>
        <?= printReplies($replies, $pagesPerPost) ?>
    </main>
</body>
</html>