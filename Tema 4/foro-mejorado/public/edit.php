<?php
    require_once("../src/init.php");

    if (!isset($_SESSION["id"]) || $_SESSION["id"] == "") {
        header("Location: login.php?redireccion=" . $_SERVER["REQUEST_URI"]);
        die();
    }

    $db->ejecuta(
        "SELECT * FROM usuarios
            WHERE id = ?",

        $_SESSION["id"]
    );

    $usuario = $db->obtenElDato();

    if (isset($_POST["actualizar"])) {
        $db->ejecuta(
            "UPDATE usuarios
                SET descripcion = ?
                WHERE id = ?",

            $_POST["descripcion"], $_SESSION["id"]
        );

        if (isset($_FILES["imagen"])) {
            $rutaTmpImagen = $_FILES["imagen"]["tmp_name"];
            $nombreImagen = $_FILES["imagen"]["name"];
            $tipoImagen = str_replace("image/", "", $_FILES["imagen"]["type"]);

            if ($tipoImagen == "image/png" || $tipoImagen == "image/jpeg" && $_FILES["imagen"]["error"] == 0) {
                move_uploaded_file(
                    $rutaTmpImagen,
                    $_ENV["IMAGE_PATH"] . $_SESSION["id"] . ".$tipoImagen");

                    $db->ejecuta(
                        "UPDATE usuarios
                            SET img = ?
                            WHERE id = ?",

                            $_ENV["IMAGE_PATH"] . $_SESSION["id"] . ".$tipoImagen",
                            $_SESSION["id"]
                    );
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once("../src/etiquetas-cabecera.php"); ?>
    <title>Editar perfil | <?= $title ?></title>
</head>
<body>
    <?php require_once("../src/nav.php"); ?>
    <form action="" method="post" enctype="" class="container mt-5 w-25">
        <h2 class="mb-3">Editar perfil</h2>
        <div class="form-floating is-invalid mb-3">
            <input type="password" class="form-control" name="passwd" placeholder="" value="<?= $_POST["passwd"] ?>">
            <label class="form-label">Contraseña:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <textarea class="form-control" name="descripcion" value="<?= $usuario["descripcion"] ?>"></textarea>
            <label class="form-label">Descripción:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <input type="file" class="form-control" name="imagen" placeholder="">
            <label class="form-label">Imagen:</label>
        </div>
        <input type="submit" class="w-100 btn btn-primary" name="actualizar" value="Actualizar">
    </form>
</body>
</html>