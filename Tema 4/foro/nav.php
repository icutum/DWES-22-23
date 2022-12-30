<?php
    session_start();

    @$user = $_SESSION["user"];
    $url = $_SERVER["REQUEST_URI"];
?>

<nav>
    <ul>
        <li><a href="./index.php">Página principal</a></li>
        <?php
            if (isset($user)) : ?>
                <li><a href="./logout.php">Cerrar sesión</a></li>
            <?php else : ?>
                <li><a href="./login.php?redirect=<?= $url ?>">Iniciar sesión</a></li>
            <?php endif;
        ?>
    </ul>
    <?= isset($user) ? "<p>Bienvenido, $user</p>" : "" ?></p>
</nav>