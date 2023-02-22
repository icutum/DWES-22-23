<?php
    require_once("../src/init.php");
    require_once("../src/redirigir-login.php");

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
            $nombreImagen = basename($_FILES["imagen"]["name"]);
            $tipoImagen = str_replace("image/", "", $_FILES["imagen"]["type"]);

            if (($tipoImagen == "png" || $tipoImagen == "jpeg") && $_FILES["imagen"]["error"] == 0) {
                $imagenAnterior = glob($_ENV["IMAGE_PATH"] . "" . $_SESSION['id'] . ".*")[0];

                if (isset($imagenAnterior)) {
                    unlink($imagenAnterior);
                }

                move_uploaded_file(
                    $rutaTmpImagen,
                    $_ENV["IMAGE_PATH"] . $_SESSION["id"] . ".$tipoImagen"
                );

                $db->ejecuta(
                    "UPDATE usuarios
                        SET img = ?
                        WHERE id = ?",

                        $_ENV["IMAGE_PATH"] . $_SESSION["id"] . ".$tipoImagen",
                        $_SESSION["id"]
                );
            }
        }

        header("Location: edit.php?success");
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

    <form action="" method="post" enctype="multipart/form-data" class="container mt-5 w-50">
        <?php if (isset($_GET["success"])) : ?>
            <p class="alert alert-success">Se han aplicado los cambios correctamente</p>
        <?php endif; ?>

        <h2 class="mb-5">Editar perfil</h2>
        <div class="row">
            <div class="col-xl">
                <div class="form is-invalid mb-3 d-flex flex-column">
                    <label class="form-label rounded-circle overflow-hidden shadow-lg" for="imagen" style="width: 125px; height: 125px;">
                        <img role="button" src="<?= $usuario["img"] ?>" alt="Imagen de perfil" width="125px" height="125px">
                        <div class="overlay d-flex justify-contents-center align-items-center">
                            <span>Editar</span>
                        </div>
                    </label>
                    <input type="file" class="form-control invisible" name="imagen" id="imagen">
                </div>
            </div>
            <div class="col-xl-10">
                <div class="form-floating is-invalid mb-3">
                    <input type="text" class="form-control" placeholder="" value="<?= $usuario["nombre"] ?>" disabled>
                    <label class="form-label">Nombre:</label>
                </div>
                <div class="form-floating is-invalid mb-3">
                    <input type="mail" class="form-control" placeholder="" value="<?= $usuario["correo"] ?>" disabled>
                    <label class="form-label">Correo:</label>
                </div>
            </div>
        </div>

        <div class="form-floating is-invalid mb-3">
            <input type="password" class="form-control" name="passwd" placeholder="" value="<?= $_POST["passwd"] ?>">
            <label class="form-label">Contraseña:</label>
        </div>
        <div class="form-floating is-invalid mb-3">
            <textarea class="form-control" name="descripcion" placeholder=""><?= $usuario["descripcion"] ?></textarea>
            <label class="form-label">Descripción:</label>
        </div>
        <input type="submit" class="w-100 btn btn-primary" name="actualizar" value="Actualizar">
    </form>
</body>
</html>