<?php
    require_once("./dbh.php");

    session_start();

    @$user = $dbh->getUserName($_SESSION["userID"]);
    $url = $_SERVER["REQUEST_URI"];
?>

<nav class="header__nav">
    <ul class="header__nav-links">
        <li><a href="./index.php">Página principal</a></li>
        <?php
            if (isset($user)) : ?>
                <li><a href="./logout.php">Cerrar sesión</a></li>
                <li><?= $user ?></li>
            <?php else : ?>
                <li><a href="./login.php?redirect=<?= $url ?>">Iniciar sesión</a></li>
            <?php endif;
        ?>
    </ul>
</nav>