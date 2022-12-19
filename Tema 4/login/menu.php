<?php
    require_once("./session-vars.php");

    $url = "." . $_SERVER["REQUEST_URI"];
?>

<div class="menu">
    <a href="index.php">publica</a>
    <a href="privado1.php">privada1</a>
    <a href="privado2.php">privada2</a>
    <a href="privado3.php">privada3</a>
    <a href="login.php?url=<?= $url ?>">login</a>
    <a href="logout.php?url=<?= $url ?>">logout</a>
    <p>Usuario: <?= $usermail ?></p>
</div>