<?php

require_once("./init.php");
require_once("./comprobar-grupo.php");

?>

<div class="menu">
    <a href="index.php">Inicio</a>

    <?php if (isset($_SESSION["user"])): ?>

        <?php if($nombreGrupo == GRUPO_ADMIN): ?>
            <a href="admin.php">Admin</a>
        <?php endif; ?>

        <a href="privado.php">Privado</a>
        <a href="logout.php">Logout</a>

    <?php else: ?>
        <a href="login.php">Login</a>
    <?php endif; ?>

    <p>Bienvenido, <?= $user ?> (Grupo <?= $nombreGrupo ?>)</p>
</div>
