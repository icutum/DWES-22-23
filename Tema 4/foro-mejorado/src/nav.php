<?php
    const ANON = "Anónimo";

    $NOMBRE_USUARIO = $_SESSION["nombre"] ?? ANON;

    $ID_USUARIO = $_SESSION["id"];

    // Arrays clave-valor que contienen las páginas
    // url => texto
    $PAGINAS_ANON = [
        "registro.php" => "Registrarse",
        "login.php" => "Iniciar sesión",
    ];

    $PAGINAS_USUARIO = [
        "detalle.php" => "Mi perfil",
        "edit.php" => "Editar perfil",
        "logout.php" => "Cerrar sesión"
    ];
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark ps-5 p-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="listado.php"><?= $title ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link mx-5 active" aria-current="page" href="listado.php">Listado</a>
                </li>
                <?php
                    if ($NOMBRE_USUARIO == ANON) :
                        foreach ($PAGINAS_ANON as $url => $texto) : ?>
                            <li class="nav-item">
                                <a class="nav-link mx-5" href="<?= $url ?>"><?= $texto ?></a>
                            </li>
                        <?php endforeach;

                    else : ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link mx-5 dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $NOMBRE_USUARIO ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php foreach ($PAGINAS_USUARIO as $url => $texto) : ?>
                                    <li><a class="dropdown-item" href="<?= $url ?>"><?= $texto ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                    <?php endif;
                ?>
            </ul>
        </div>
	</div>
</nav>