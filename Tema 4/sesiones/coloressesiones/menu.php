<?php
    require_once("./user-data.php");

    $pages = [
        // Name => Link
        "Página 1" => "./pagina1.php",
        "Página 2" => "./pagina2.php",
        "Configuración" => "./config.php",
    ];

    $activePage = "." . $_SERVER["REQUEST_URI"];
?>

<nav>
    <ul>
        <?php foreach ($pages as $pageName => $pageLink) :
            $isActive = $activePage == $pageLink;
            ?>

            <li>
                <a class="<?= $isActive ? "active-page" : "" ?>" href="<?= $pageLink ?>">
                    <?= $pageName ?>
                </a>
            </li>
        <?php endforeach ?>
        <li>Usuario: <?= $username ?></li>
    </ul>
</nav>